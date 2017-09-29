<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Validator;

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
        $user = ((session()->get('role')) === 'admin') ? User::find(session()->get('id')) : '';
        $category = Category::find($id);
        $categories = Category::all();
        $questions = $category->question()->orderBy('created_at', 'DESC')->get();
        $data = ['questions' => $questions, 'category' => $category, 'categories' => $categories, 'user' => $user];
        return view('templates.question.list', $data);
    }

    //создаем новый вопрос
    public function create(Category $category)
    {
        $categories = Category::all();
        $user = ((session()->get('role')) === 'admin') ? User::find(session()->get('id')) : '';
        $data = ['category' => $category, 'categories' => $categories, 'user' => $user];
        return view('templates.question.create', $data);
    }
    //сохраняем вопрос
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|max:255',
            'email' => 'required|email|max:255',
            'category_id' => 'required|numeric',
            'description' => 'required|unique:questions'
        ], [
            'required' => 'Обязательное поле',
            'unique' => 'Такой вопрос уже существует',
            'max' => 'Не более 255 символов'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        //пишем вопрос в БД со статусом 0 -- "не опубликован"
        Question::create($request->all());
        if ((session()->get('role') === 'admin')) {
            session()->flash('success', 'Новый вопрос успешно создан.');
            return redirect(route('category.question', ['category' => $request->category_id ]));
        } else
            return redirect(route('index'));
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
        $category = Question::findOrFail($request->category_id);
        session()->flash('success', "Вопрос в категории $category->name успешно изменен.");
        return redirect(route('category.question', ['id' => $request->category_id]));
    }

    public function destroy(Question $question)
    {
        Question::destroy($question->id);
        return redirect()->back()->with('success', 'Вопрос удален.');
    }

    public function changeStatusQuestion(Question $question, $status)
    {
        //меняем статус вопроса
        $question->status = $status;
        $question->save();
        return redirect(route('question.index'));
    }

}
