@extends('index')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading">Изменить пароль</div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST"
                              action="{{ route('admin.update', ['id' => $user->id] )}}">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Администратор:</label>

                                <div class="col-md-6">
                                    {{ $user->name }}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-md-4 control-label">Login:</label>

                                <div class="col-md-6">
                                    {{ $user->email }}
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password" class="col-md-4 control-label">Новый пароль:</label>
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
                                    {{ method_field('PUT') }}
                                    <button type="submit" class="btn btn-primary">
                                        Изменить
                                    </button>
                                    <a href="{{ route('admin.list') }}" class="cancel">Отмена</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop