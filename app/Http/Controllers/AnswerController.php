<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;
use Validator;

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
            'question_id' => 'required|unique:answers'
        ], [
            'required' => 'Обязательное поле',
            'unique' => 'Ответ на этот вопрос уже существует.'
        ]);

        if ($validator->fails()) {
            return redirect(route('question.index'))->withErrors($validator)->withInput();
        } else {
            $answer = Answer::create($request->all());
            //меняем статус вопроса
            $answer->question->status = $request->status ? $request->status : 1;
            $answer->question->save();
            return redirect(route('question.index'))->with('message', 'Новый ответ успешно создан.');
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
        return redirect(route('question.index'));
    }

}
