@extends('index')
@section('content')
    @if (session('message'))
        <div class="alert alert-info">
            {{ session('message') }}
        </div>
    @endif

    <div class="col-md-12">
        <!-- Список администраторов -->
        <div class="panel panel-success">
            <div class="panel-heading lead">
                Все администраторы
                <a class="btn btn-sm btn-success pull-right" href="{{ route('register') }}">Добавить </a>
            </div>
            <table class="table table-condensed" style="font-size: 14px;">
                <thead>
                <tr>
                    <th>Login(e-mail)</th>
                    <th>Имя</th>
                    <th>Дата регистрации</th>
                    <th>Пароль</th>
                    <th style="text-align: center">Изменить пароль/Удалить</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td class="">{{ $user->email }}</td>
                        <td class="">{{ $user->name }}</td>
                        <td class="">{{ $user->created_at }}</td>
                        <td class="">{{ $user->password }}</td>
                        <td class="" style="text-align: center">
                            <form method="POST" action="{{  route('admin.destroy', ['id' => $user->id]) }}">
                                <a class="btn btn-info btn-sm" href="{{ route('admin.edit', ['id' => $user->id]) }}"><i
                                            class="glyphicon glyphicon-pencil"></i></a>
                                <input type="hidden" name="_method" value="delete"/>
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <button type="submit" class="btn btn-sm btn-danger " value=""><i
                                            class="glyphicon glyphicon-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="panel-success panel-footer ">
                <h4>Всего администраторов: {{ count($users) }}</h4>
            </div>
        </div>
        <!-- Конец списка администраторов -->
    </div>
    <!-- Правая часть -->
@stop