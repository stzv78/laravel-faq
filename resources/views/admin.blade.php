@extends('index')
@section('content')
    <div class="row">
        <!--Секция с вопросами-ответами-->
        <div class="col-md-9">

            <ul class="nav nav-pills">
                <li class="active dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        Вопросы пользователей
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a data-toggle="tab" href="#panel1">Опубликованные</a></li>
                        <li><a data-toggle="tab" href="#panel2">Скрытые</a></li>
                        <li><a data-toggle="tab" href="#panel3">Без ответа</a></li>
                        <li><a data-toggle="tab" href="#panel4">Заблокированные</a></li>
                    </ul>
                </li>
                <li><a data-toggle="tab" href="#panel5">Категории вопросов</a></li>
                <li><a data-toggle="tab" href="#panel6">Администраторы сервиса</a></li>
            </ul>

            <div class="tab-content">
                <div id="panel1" class="tab-pane fade in active">
                    <h4 style="text-align: center">Опубликованные вопросы</h4>
                @foreach ($categories as $category)
                    <!--Если есть опубликованные вопросы с ответами-->
                        @if ($category->question()->where('status', '=', 2)->get()->count())
                            <div class="panel panel-default">
                                <!--Для каждой категории-->
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
                                                        , {{ $question->email }} </span>&emsp;
                                                    <a class="text-warning"
                                                       href="{{ route('question.status', ['question' => $question, 'status'=> '1'])}}">Скрыть>></a>
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

                <div id="panel2" class="tab-pane fade">
                    <h4 style="text-align: center">Скрытые вопросы</h4>
                @foreach ($categories as $category)
                    <!--Для каждой категории, если есть скрытые вопросы с ответами-->
                        @if ($category->question()->where('status', '=', 1)->get()->count())
                            <div class="panel panel-default">
                                <!--Для каждой категории-->
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
                                                    <a data-toggle="collapse" data-parent="#collapse-group"
                                                       href="#{{ $question->id }}">
                                                        {{ $question->description }} </a>&emsp;
                                                    <span class="label label-info">{{ $question->username }}
                                                        , {{ $question->email }} </span>&emsp;
                                                    <a class="text-warning"
                                                       href="{{ route('question.status', ['question' => $question, 'status'=> '2'])}}">Опубликовать>></a>
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
                <div id="panel3" class="tab-pane fade">
                    <h4 style="text-align: center">Вопросы без ответа</h4>
                @foreach ($categories as $category)
                    <!--Для каждой категории, если есть вопросы без ответа-->
                        @if ($category->question()->where('status', '=', 0)->get()->count())
                            <div class="panel panel-default">
                                <!--Для каждой категории-->
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        {{ $category->name }}
                                    </h3>
                                </div>
                                <div class="panel-body">
                                    <div>
                                        @foreach(($category->question()->where('status', '=', 0)->get()) as $question)
                                            <div class="accordion">
                                                <!--Здесь вопрос -->
                                                <div class="accordion-toggle">
                                                    <span class="label label-info">{{ $question->username }} ,
                                                        {{ $question->email }} </span>&emsp;
                                                    <a data-toggle="collapse" data-parent="#collapse-group"
                                                       href="#{{ $question->id }}">
                                                        {{ $question->description }} </a>&emsp;
                                                    <a class="text-warning"
                                                       href="{{ route('answer.create', ['question' => $question]) }}">Ответить</a>
                                                    <span class="glyphicon glyphicon-chevron-right btn-danger"></span>
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
                <div id="panel4" class="tab-pane fade">
                    <h4 style="text-align: center">Заблокированные вопросы</h4>
                    <p>Содержимое 4 панели...</p>
                </div>
                <div id="panel5" class="tab-pane fade">
                    <h4 style="text-align: center">Категории вопросов</h4>
                    <p>Содержимое 5 панели...</p>
                </div>
                <div id="panel6" class="tab-pane fade">
                    <h4 style="text-align: center">Администраторы сервиса</h4>
                    <p>Содержимое 6 панели...</p>
                </div>
            </div>


        </div>

        <!-- Правая часть -->
        <div class="col-md-3">
        @if (isset($user))
            @include('templates.question._form', ['category' => $category, 'categories' => $categories, 'user' => $user])
        @else
            @include('templates.question._form', ['category' => $category, 'categories' => $categories])
        @endif
        <!-- Конец правой части -->
        </div>
    </div>
    <!--Конец секции-->
@stop