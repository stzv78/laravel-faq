<div class="panel panel-primary">
    <div class="panel-heading">{{ $title or 'Задать вопрос' }}</div>
    <div class="panel-body">
        <form method="POST" action="{{ route('question.store') }}">
            <div class="form-group">
                <label for="username">Ваше имя:</label>
                @if (isset($user))
                    <input name="username" type="text" class="form-control" value="{{ $user->name }}" required>
                @else
                    <input name="username" type="text" class="form-control" placeholder="Имя" required>
                @endif
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                @if (isset($user))
                    <input name="email" type="email" class="form-control" value="{{ $user->email }}"
                           required>
                @else
                    <input name="email" type="email" class="form-control" placeholder="E-mail" required>
                @endif
            </div>

            <div class="form-group">
                <label>Категория вопроса:</label>

                    <select name="category_id" class="form-control">
                        @foreach($categories as $categori)
                            <option value="{{ $category->id or $categori->id}}">{{ $category->name or $categori->name }}</option>
                        @endforeach
                    </select>

            </div>

            <div class="form-group">
                <textarea class="form-control" name="description" placeholder="Ваш вопрос"
                          required></textarea>
            </div>
            <div class="col-md-offset-2">
                <button type="submit" class="btn btn-primary">Отправить</button>
                <input type="hidden" name="status" value="0">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <a href="{{ route('index')}}" id="cancel" name="cancel" class="btn btn-default">Отмена</a>
            </div>
        </form>
    </div>
</div>