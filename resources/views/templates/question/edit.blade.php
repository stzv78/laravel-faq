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
                                <div id="username" class="col-md-offset-4">{{ $question->username  }}</div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2" for="email">Email:</label>
                                <div id="email" class="col-md-offset-4">{{ $question->email }}</div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2" for="category">Категория:</label>
                                <div id="category" class="col-md-offset-4">{{ $category->name }}</div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2" for="description">Вопрос:</label>
                                <div id="description" class="col-md-offset-4">
                                <textarea class="form-control" name="description"
                                          value="" required>{{ $question->description }}</textarea>
                                </div>
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div>
                                <div class="accordion">
                                    <div class="accordion-toggle">
                                        <a class="col-md-offset-4" data-toggle="collapse" data-parent="#collapse-group"
                                           href="#1">Переместить в категорию</a>
                                    </div>

                                    <div id="1" class="panel-collapse collapse">
                                        <div class="form-group">
                                            <div class="col-md-offset-4">
                                                <select name="category_id" class="form-control">
                                                    @foreach($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
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