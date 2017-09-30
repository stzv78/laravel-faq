<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Route;

class AnswerController extends Controller
{
    //создаем новый ответ
    public function create(Question $question)
    {
        $user = User::find(session()->get('id'));
        $data = ['question' => $question, 'user' => $user];
        return view('templates.answer.create', $data);
    }

    //сохраняем ответ
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'answer_text' => 'required|max:255|min:3',
        ], [
            'required' => 'Обязательное поле',
            'max' => 'Не более 255 символов',
            'min' => 'Более 2 символов в ответе.'
        ]);

        $question = Question::find($request->question_id);

        if ($validator->fails()) {
            return redirect(route("answer.create", ['question' => $question]))->withErrors($validator)->withInput();
        } else {
            //сохраняем ответ в бд
            $answer = Answer::create($request->all());

            //меняем статус вопроса
            $answer->question->status = $request->status ? $request->status : 1;
            $answer->question->save();

            //переходим в список категорий с вопросами
            session()->flash('success', 'Новый ответ успешно создан. Вопрос перемещен в список отвеченных');
            return redirect(route('category.question', ['id' => $question->category->id]));
        }
    }

    public function edit($id)
    {
        $answer = Answer::findOrFail($id);
        $question = $answer->question;
        $data = ['question' => $question, 'answer' => $answer];
        return view('templates.answer.edit', $data);
    }

    public function update(Request $request, Answer $answer)
    {
        $answer->update($request->all());
        session()->flash('success', 'Ответ успешно изменен.');
        return redirect(route('question.index'));
    }

}
