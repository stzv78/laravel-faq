@extends('index')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading">Задать вопрос</div>
                    <div class="panel-body">
                        <form method="POST" action="{{ route('question.store') }}">

                            <div class="form-group">
                                <label for="username">Ваше имя:</label>
                                @if (isset($user))
                                    <input name="username" type="text" class="form-control" value="{{ $user->name }}"
                                           required>
                                @else
                                    <input name="username" type="text" class="form-control" placeholder="Имя" required>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="email">Email:</label>
                                @if (isset($user))
                                    <input name="email" type="email" class="form-control" value="{{ $user->email }}"
                                           required>
                                @else
                                    <input name="email" type="email" class="form-control" placeholder="E-mail" required>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Категория вопроса:</label>
                                @if (isset($user))
                                    <h5 class="alert alert-success"> {{$category->name }}</h5>
                                @else
                                    <select name="category_id" class="form-control">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                @endif
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="description" placeholder="Ваш вопрос"
                                          required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Отправить</button>
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="hidden" name="status" value="0">
                            <a href="{{ route('index')}}" id="cancel" name="cancel" class="btn btn-default">Отмена</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop