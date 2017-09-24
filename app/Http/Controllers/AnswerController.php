<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\User;
use App\Models\Answer;
use Illuminate\Http\Request;

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
        if (!Answer::where('question_id', $request->question_id)->first()) {
            $answer = Answer::create($request->all());
            if ($request->status) {
                $answer->question->status = $request->status;
            } else {
                $answer->question->status = 1;
            }
            $answer->question->save();
            return redirect(route('question.index'));
        } else {
            echo "Ответ уже существует!";
            return redirect(route('question.index'));
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
