<!-- Список категорий -->
<div class="panel panel-success">
    <div class="panel-heading lead">
        Категории вопросов
        <a class="btn btn-sm btn-success pull-right" href="{{ route('category.create') }}">Добавить категорию </a>
    </div>
    <table class="table table-condensed" style="font-size: 13px; ">
        <tbody>
        @if (isset($categories))
            <tr>
                <th class="col-md-3"></th>
                <th class="col-md-2 text-center">Всего вопросов</th>
                <th class="col-md-1 text-center">Опубликовано</th>
                <th class="col-md-1 text-center">Скрыто</th>
                <th class="col-md-1 text-center">Без ответа</th>
                <th></th>
                <th></th>
            </tr>
            @foreach($categories as $category)
                <tr>
                    <td class="col-md-3"> {{ $category->name }} </td>

                    <td class="col-md-2 text-center"><span class="badge">{{ $category->question->count() }}</span></td>
                    <td class="col-md-1 text-center"> {{ $category->question()->where('status', '=', 2)->count() }} </td>
                    <td class="col-md-1 text-center"> {{ $category->question()->where('status', '=', 1)->count() }} </td>
                    <td class="col-md-1 text-center"> {{ $category->getAnswer() }} </td>
                    <td class="col-md-2 text-center">
                        <a href="{{ route('category.question', ['id' => $category->id]) }}">Список вопросов>> </a>
                    </td>
                    <td class="col-md-offset-8 text-center">
                        <form method="POST" action="{{ route('category.destroy', ['category' => $category])}}">
                            <a class="btn btn-info btn-sm"
                               href="{{ route('category.edit', ['category' => $category]) }}"><i
                                        class="glyphicon glyphicon-pencil"></i></a>
                            <input type="hidden" name="_method" value="delete"/>
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <button type="submit" class="btn btn-sm btn-danger " value=""><i
                                        class="glyphicon glyphicon-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @else
            <h2> Нет доступных категорий</h2>
        @endif
        </tbody>
    </table>
    <div class="panel-success panel-footer ">
        <h4>Всего категорий: {{ count($categories) }}</h4>
    </div>
</div>
<!-- Конец списка категорий -->