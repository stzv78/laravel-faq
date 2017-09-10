@extends('index')
@section('content')
    <a href="{{ route('category.index') }}"> Список категорий </a><br/>

{{session()->get('role')}}
    <div class = "row">
        @include('templates.category.list', ['categories' => $categories])
    </div>

    <!--Секция с вопросами-ответами-->
    <div class = "row">
        <div class = "col-md-12">
                @foreach ($categories as $category)
                    @if ($category->question()->where('status', '=', 1)->get()->count())
                    <div class="panel panel-default">
                    <!--Для каждой категории, если есть вопросы с ответами-->
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            {{ $category->name }}
                        </h3>
                    </div>
                    <div class="panel-body">
                        <div>
                            @foreach(($category->question()->where('status', '=', 1)->get()) as $question)
                            <div class="accordion">
                                <!--Здесь вопрос -->
                                <div class="accordion-toggle">
                                    <span class="label label-info">{{  $question->username }}, {{ $question->email }} </span>&emsp;
                                    <a data-toggle="collapse" data-parent="#collapse-group" href="#{{ $question->id }}">
                                         {{ $question->description }} </a>
                                </div>
                                <!--Здесь ответ-->
                                <div id="{{ $question->id }}" class="panel-collapse collapse">
                                    <div class="panel-body table-responsive">
                                        <p><span class="glyphicon glyphicon-chevron-right btn-danger"> {{ $question->answer->user }}</span><br />
                                            {{ $question->answer->answer_text }}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    </div>
                        @else
                    @endif
                <!-- Конец ряда -->
                @endforeach

        </div>
    </div>
    <!--Конец секции вопросов для пользователя-->
@stop