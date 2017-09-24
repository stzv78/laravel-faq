@extends('index')
@section('content')
    <div class="col-md-9">
        <!-- Список вопросов -->
        <ol class="breadcrumb">
            <li><a href=" {{ route('category.index') }}"> << Назад к списку категорий</a></li>
        </ol>
        <div class="panel panel-success">
            <div class="panel-heading lead">{{ $category->name }}
                <span class="badge">Всего вопросов: {{ count($questions) }}</span>
                <a class="btn btn-sm btn-success pull-right"
                   href="{{ route('question.create', ['category' => $category]) }}">Добавить вопрос </a>
            </div>
            <table class="table table-condensed" style="font-size: 14px;">
                <tbody>
                @if (isset($questions))
                    @foreach($questions as $question)
                        <tr>
                            <td> {{ $question->description }} </td>
                            <td> {{ $question->created_at }} </td>
                            @if (!$question->answer)
                                <td>Ожидает ответа</td>
                                <td><a class="btn btn-default btn-sm" style="width: 100px"
                                       href="{{route('answer.create', ['question' => $question])}}"> Ответить</a></td>
                            @elseif ($question->status === 2)
                                <td>Опубликован</td>
                                <td><a class="btn btn-sm btn-default" style="width: 100px" href=""> Скрыть</a></td>
                            @elseif($question->status === 1)
                                <td>Скрыт</td>
                                <td><a class="btn btn-success btn-sm" style="width: 100px" href=""> Опубликовать</a>
                                </td>
                            @endif
                            <td style="text-align: center">
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
                @else
                    <h2> Нет вопросов в категории</h2>
                @endif
                </tbody>
            </table>

        </div>
        <!-- Конец списка вопросов -->
    </div>

    <!-- Правая часть -->
    <div class="col-md-3">
    @include('templates.question._form', ['categories' => $categories])
    <!-- Конец правой части -->
    </div>
    </div>
    <!--Конец секции вопросов для пользователя-->
@stop