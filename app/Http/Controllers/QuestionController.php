<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function lister($id)
    {
        $category = Category::find($id);
        $questions = $category->question()->orderBy('created_at', 'DESC')->get();
        //потом добавить пагинацию
        //->paginate(10),
        return view('templates.question.list', ['questions' => $questions, 'category' => $category]);
    }

    //создаем новый вопрос
    public function create(Category $category)
    {
        $categories = Category::all();
        if ((session()->get('role')) === 'admin') {
            $user = User::find(session()->get('id'));
            $data = [ 'category' => $category, 'categories' => $categories, 'user' => $user ];
        } else
            $user = null;
            $data = [ 'category' => $category, 'categories' => $categories ];
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
                'route' => 'category.question'
            ];
        } else {
            //пишем вопрос в БД, cnfdbv cnfnec 0 -- "не опубликован"
            Question::create($request->all());
            $data = [
               'class' => 'success',
                'message' => 'Новый вопрос успешно создан!',
                'text' => 'Ok',
                'route' => 'category.question'
            ];
        }
        // Отдаем страницу с сообщением
        return view('templates.message', $data);
    }
    //редактируем вопрос
    public function edit($id)
    {
        $question = Question::findOrFail($id);
        return view('templates.question.edit', ['question' => $question]);
    }

    //обновляем вопрос
    public function update(Request $request, Question $question)
    {
        $question->update($request->all());
        $data = [
            'class' => 'success',
            'message' => 'Вопрос успешно изменен!',
            'text' => 'Ok',
            'route' => 'category.question'
        ];
        return view('templates.message', $data);
    }

    public function destroy(Question $question)
    {
        Category::destroy($question->id);
        $data = [
            'class' => 'success',
            'message' => 'Вопрос успешно удален!',
            'text' => 'Ok',
            'route' => '/category'
        ];
        return view('templates.message', $data);
    }

    public function changeStatusQuestion($id, $status)
    {
        //меняем статус вопроса
        $question = Question::find($id);
        $question->status = $status;
        $question->save();

    }
    //список вопросов по категории и статусу
    public function getStatusQuestion($id, $status)
    {
        $result = Category::find($id)->question()->where('status', '=', $status)->get();
        dd($result);
    }
}
