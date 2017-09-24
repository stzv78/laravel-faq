@extends('index')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading">Редактировать вопрос</div>
                    <div class="panel-body">
                        <form method="POST" action="{{ route('question.update', ['id' => $question->id] )}}">
                            <div class="form-group">
                                <label class="col-md-2" for="username">Пользователь:</label>
                                <div class="col-md-offset-4">{{ $question->username  }}</div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2" for="email">Email:</label>
                                <div class="col-md-offset-4">{{ $question->email }}</div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2">Категория:</label>
                                <div class="col-md-offset-4">{{ $category->name }}</div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2">Вопрос:</label>
                                <div class="col-md-offset-4">
                                <textarea class="form-control" name="description"
                                          value="" required>{{ $question->description }}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4">Переместить в категорию:</label>
                                <div class="col-md-offset-4">
                                    <select name="category_id" class="form-control">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-md-offset-4">
                                {{ method_field('PUT') }}
                                <button type="submit" class="btn btn-primary">Изменить</button>
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <a href="{{ route('index')}}" id="cancel" name="cancel"
                                   class="btn btn-default">Отмена</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop