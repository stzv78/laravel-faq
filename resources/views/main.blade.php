@extends('index')
@section('content')
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <!--Секция с вопросами-ответами-->
    <div class="col-md-9">
        @foreach ($categories as $category)
            @if ($category->question()->where('status', '=', 2)->get()->count())
                <div class="panel panel-default">
                    <!--Для каждой категории, если есть вопросы с ответами-->
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            {{ $category->name }}
                        </h3>
                    </div>
                    <div class="panel-body">
                        <div>
                            @foreach(($category->question()->where('status', '=', 2)->get()) as $question)
                                <div class="accordion">
                                    <!--Здесь вопрос -->
                                    <div class="accordion-toggle">
                                        <a data-toggle="collapse" data-parent="#collapse-group"
                                           href="#{{ $question->id }}">
                                            {{ $question->description }} </a>&emsp;
                                        <span class="label label-info">{{ $question->username }}
                                            , {{ $question->email }} </span>
                                    </div>
                                    <!--Здесь ответ-->
                                    <div id="{{ $question->id }}" class="panel-collapse collapse">
                                        <div class="panel-body table-responsive">
                                            <span class="glyphicon glyphicon-chevron-right btn-danger"></span>
                                            <b>{{ $question->answer->user->name }}</b>
                                            <p>{{ $question->answer->answer_text }}</p>
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

    <!-- Правая часть -->
    <div class="col-md-3">
    @include('templates.question._form', ['categories' => $categories])
    <!-- Конец правой части -->
    </div>
    <!--Конец секции вопросов для пользователя-->
@stop