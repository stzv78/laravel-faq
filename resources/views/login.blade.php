@extends('index')
@section('content')

    @if(session()->has('error'))
        <div class='alert alert-danger fade in alert-dismissable'>
            {{ session()->get('error') }}
        </div>
    @endif

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading">Вход для администратора</div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ action('UserController@check') }}">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Login</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password" class="col-md-4 control-label">Пароль</label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Войти
                                    </button>
                                    <a href="{{ route('index') }}" class="btn btn-default">Отмена</a>

                                    </input>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop