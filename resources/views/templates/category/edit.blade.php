@extends('index')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading">Изменить категорию</div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('category.update', ['id' => $category->id] )}}">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Категория:</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ $category->name }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    {{ method_field('PUT') }}
                                    <button type="submit" class="btn btn-primary">
                                        Изменить
                                    </button>
                                    <a href="{{ route('category.index') }}" class="cancel">Отмена</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop