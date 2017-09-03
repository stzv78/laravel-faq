@extends('index')
@section('content')
    <!-- Список вопросов -->
    <div class="panel panel-success">
        <div class="panel-heading lead">
            {{ $category->name }}
            <a class="btn btn-sm btn-success pull-right" href="{{ route('question.create') }}">Добавить вопрос </a>
        </div>
        <table class="table table-condensed" style="font-size: 14px;">
            <tbody>
            @if (isset($questions))
                @foreach($questions as $question)
                    <tr>
                        <td> {{ $question->description }} </td>
                        <td> {{ $question->created_at }} </td>
                        @if (!($question->answer))
                            <td>Ожидает ответа
                                <a class="btn btn-default btn-sm" style="width: 100px" href=""> Ответить</a>
                            </td>
                        @elseif ($question->status === 1)
                            <td>Опубликован
                                <a class="btn btn-default btn-sm" style="width: 100px" href="">Скрыть</a></td>
                                    @elseif($question->status === 0)
                            <td>Скрыт
                                <a class="btn btn-success btn-sm" style="width: 100px" href="">Опубликовать</a></td>
                        @endif
                        <td style="text-align: center">
                            <form method="POST" action="">

                                <a class="btn btn-info btn-sm" href=""><i class="glyphicon glyphicon-pencil"></i></a>
                                <input type="hidden" name="_method" value="delete"/>
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <button type="submit" class="btn btn-sm btn-danger " value=""><i class="glyphicon glyphicon-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @else
                <h2> Нет вопросов в категории</h2>
            @endif
            </tbody>
        </table>
        <div class="panel-success panel-footer ">
            <h4>Всего вопросов: {{ count($questions) }}</h4>
        </div>
    </div>
    <!-- Конец списка вопросов -->
@stop