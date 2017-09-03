<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Category;
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
    public function create()
    {
        return view('templates.question.create');
    }
    //сохраняет вопрос
    public function store(Request $request)
    {
        //есть ли такая категория в БД
        if (Question::where('description', $request->description)->first()) {
            $data = [
                'class' => 'danger',
                'message' => 'Такой вопрос уже существует!',
                'text' => 'Ok',
                'route' => 'category.question'
            ];
        } else {
            //пишем категорию в БД
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

    //удаляем вопрос

    //обновляем вопрос


    public function getStatusQuestion($id, $status)
    {
        //список вопросов по категории и статусу
        $result = Category::find($id)->question()->where('status', '=', $status)->get();
        dd($result);
    }


}
