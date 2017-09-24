<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Category;
use App\Models\User;
use function Couchbase\defaultDecoder;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $status = '2';
        $questions = Question::where('status', '=', 0)->orderBy('created_at', 'DESC')->get();
        return view('templates.question.public',
            ['categories' => $categories, 'status' => $status, 'questions' => $questions]);
    }
    public function lister($id)
    {
        $category = Category::find($id);
        $categories = Category::all();
        $questions = $category->question()->orderBy('created_at', 'DESC')->get();
        //потом добавить пагинацию
        //->paginate(10),
        return view('templates.question.list',
            ['questions' => $questions, 'category' => $category, 'categories' => $categories]);
    }

    //создаем новый вопрос
    public function create(Category $category)
    {
        $categories = Category::all();
        if ((session()->get('role')) === 'admin') {
            $user = User::find(session()->get('id'));
        } else {
            $user = null;
        }
        $data = ['category' => $category, 'categories' => $categories, 'user' => $user];
        return view('templates.question.create', $data);
    }
    //сохраняем вопрос
    public function store(Request $request)
    {
        //есть ли такой вопрос в БД
        if (Question::where('description', $request->description)->first()) {
            $data = [
                'class' => 'danger',
                'message' => 'Такой вопрос уже существует!',
                'text' => 'Ok',
                'route' => '/index'
            ];
        } else {
            //пишем вопрос в БД со статусом 0 -- "не опубликован"
            Question::create($request->all());
            $route = (session()->get('role') === 'admin') ? '/question/noanswered' : '/index';
            $data = [
               'class' => 'success',
                'message' => 'Новый вопрос успешно создан!',
                'text' => 'Ok',
                'route' => $route
            ];
        }
        // Отдаем страницу с сообщением
        return view('templates.message', $data);
    }
    //редактируем вопрос
    public function edit($id)
    {
        $question = Question::findOrFail($id);
        $categories = Category::all();
        $data = ['category' => $question->category, 'categories' => $categories, 'question' => $question];
        return view('templates.question.edit', $data);
    }

    //обновляем вопрос
    public function update(Request $request, Question $question)
    {
        $question->update($request->all());
        $data = [
            'class' => 'success',
            'message' => 'Вопрос успешно изменен!',
            'text' => 'Ok',
            'route' => '/category'
        ];
        return view('templates.message', $data);
    }

    public function destroy(Question $question)
    {
        Question::destroy($question->id);
        $data = [
            'class' => 'success',
            'message' => 'Вопрос успешно удален!',
            'text' => 'Ok',
            'route' => '/category'
        ];
        return view('templates.message', $data);
    }

    public function changeStatusQuestion(Question $question, $status)
    {
        //меняем статус вопроса
        $question->status = $status;
        $question->save();
        return redirect(route('question.index'));
    }
}
