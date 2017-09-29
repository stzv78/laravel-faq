@extends('index')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading">Редактировать ответ</div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST"
                              action="{{ route('answer.update', ['id' => $answer->id]) }}">
                            <div class="form-group">

                                <div class="col-md-8 col-md-offset-3">
                                    <span class="label label-info "> {{ $question->username }}
                                        , {{ $question->email }} </span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="question" class="col-md-2 col-md-offset-1">Вопрос:</label>
                                <div class="col-md-8">
                                    {{ $question->description }}
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="answer_text" class="col-md-2 col-md-offset-1">Ответ:</label>

                                <div class="col-md-8">
                                    <textarea class="form-control" rows="13" name="answer_text" value="">{{ $answer->answer_text }}
                               </textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-3">
                                    {{ method_field('PUT') }}
                                    <button type="submit" class="btn btn-primary">Отправить</button>
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <input type="hidden" name="question_id" value="{{$question->id}}">
                                    <a href="{{ route('question.index') }}" class="cancel"> Отмена</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop