@extends('index')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading">Ответить пользователю</div>
                    <div class="panel-body">

                        <form class="form-horizontal" method="POST" action="{{ route('answer.store') }}">

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
                                    <textarea class="form-control" name="answer_text" placeholder="Ваш ответ"
                                              value="{{ old('answer_text') }}" required></textarea>

                                    @if ($errors->has('answer_text'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('answer_text') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-3">
                                    <input type="checkbox" name="status" value="2"> Опубликовать</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-3">
                                    <button type="submit" class="btn btn-primary">Отправить</button>
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <input type="hidden" name="user_id" value="{{$user->id}}">
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