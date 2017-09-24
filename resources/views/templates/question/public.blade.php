@extends('index')
@section('content')

    <div class="row">
        <div class="col-md-9">

            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#panel1">Опубликованные вопросы</a></li>
                <li><a data-toggle="tab" href="#panel2">Скрытые вопросы</a></li>
                <li><a data-toggle="tab" href="#panel3">Вопросы без ответа</a></li>
            </ul>

            <!--Секция с вопросами-ответами-->
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
                                                        <p><a class="text-info"
                                                              href="{{ route('answer.edit', ['id' => $question->answer->id])}}">Редактировать
                                                                ответ>></a></p>
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
                                                        <b>{{ $question->answer->user->name or 'Автор удален' }}</b>
                                                        <p><a class="text-info"
                                                              href="{{ route('answer.edit', ['id' => $question->answer->id])}}">Редактировать
                                                                ответ>></a></p>
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

                <div id="panel3" class="tab-pane panel-body tab-content">

                    <table class="table table-condensed" style="font-size: 13px; ">
                        <tr>
                            <th class="col-md-5">Вопрос</th>
                            <th class="col-md-4">Категория</th>
                            <th class="col-md-1"></th>
                            <th></th>
                        </tr>
                        <tbody>
                        @foreach ($questions as $question)
                            <tr>
                                <td class="col-md-5"> {{ $question->description }} </td>
                                <td class="col-md-4"> {{ $question->category->name}} </td>
                                <td class="col-md-1 text-center">
                                    <a class="text-warning"
                                       href="{{ route('answer.create', ['question' => $question]) }}">Ответить</a></td>

                                <td>
                                    <form method="POST"
                                          action="{{ route ('question.destroy', ['question' => $question]) }}">
                                        <a class="btn btn-info "
                                           href="{{ route('question.edit', ['id' => $question->id]) }}"><i
                                                    class="glyphicon glyphicon-pencil"></i></a>
                                        <input type="hidden" name="_method" value="delete"/>
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <button type="submit" class="btn  btn-danger"><i
                                                    class="glyphicon glyphicon-trash"></i></button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="panel-success panel-footer ">
                        <h4>Всего вопросов без ответа: {{ count($questions) }}</h4>
                    </div>
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