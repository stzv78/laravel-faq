@extends('index')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading">Задать вопрос</div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('question.store') }}">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="description" class="col-md-4 control-label">Название</label>

                                <div class="col-md-6">
                                    <input id="description" type="text" class="form-control" name="description" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                       Задать вопрос
                                    </button>
                                    <a href="{{ url('/category') }}" class="cancel">Отмена</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop