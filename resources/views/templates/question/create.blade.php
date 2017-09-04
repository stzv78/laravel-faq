@extends('index')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading">Задать вопрос</div>
                    <div class="panel-body">
                        <form method="POST" action="">

                            <div class="form-group">
                                <label>Ваше имя:</label>
                                @if (isset($user))
                                <input type="text" class="form-control" value="{{ $user->name }}">
                                @else
                                <input type="text" class="form-control" placeholder="Имя">
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Email:</label>
                                @if (isset($user))
                                <input type="email" class="form-control" value="{{ $user->email }}">
                                @else
                                <input type="email" class="form-control" placeholder="E-mail">
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Категория вопроса:</label>
                                @if (isset($user))
                                    <h5 class="alert alert-success"> {{$category->name }}</h5>
                                @else
                                <select name="name" class="form-control">
                                    @foreach($categories as $category)
                                        <option value="">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @endif
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="description" placeholder="Ваш вопрос" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Отправить</button>
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <a href="{{ route('index')}}" id="cancel" name="cancel" class="btn btn-default">Отмена</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop