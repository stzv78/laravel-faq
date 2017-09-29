<div class="panel panel-primary">
    <div class="panel-heading">{{ $title or 'Задать вопрос' }}</div>
    <div class="panel-body">

        <form method="POST" action="{{ route('question.store') }}">
            <div class="form-group">
                <label for="username">Ваше имя:</label>
                @if (isset($user))
                    <input name="username" type="text" class="form-control" value="{{ $user->name  }}" required>
                @else
                    <input name="username" type="text" class="form-control" placeholder="Имя"
                           value="{{ old('username') }}" required>
                @endif

                @if ($errors->has('username'))
                    <div class="alert alert-danger">
                        {{$errors->first('username') }}
                    </div>
                @endif

            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                @if (isset($user))
                    <input name="email" type="email" class="form-control" value="{{ $user->email }}"
                           required>
                @else
                    <input name="email" type="email" class="form-control" placeholder="E-mail"
                           value="{{ old('email') }}" required>
                @endif
            </div>
            @if ($errors->has('email'))
                <div class="alert alert-danger">
                    {{ $errors->first('email') }}
                </div>
            @endif

            <div class="form-group">
                <label>Категория вопроса:</label>

                @if (isset($user))
                    <select name="category_id" class="form-control">
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    </select>
                @else
                    <select name="category_id" class="form-control">
                        @foreach($categories as $categori)
                            <option value="{{ $categori->id }}">{{ $categori->name }}</option>
                        @endforeach
                    </select>
                @endif
            </div>

            <div class="form-group">
                <textarea class="form-control" name="description" placeholder="Ваш вопрос"
                          value="{{ old('description') }}" required></textarea>
            </div>
            @if ($errors->has('description'))
                <div class="alert alert-danger">
                    {{ $errors->first('description') }}
                </div>
            @endif

            <div class="col-md-offset-2">
                <button type="submit" class="btn btn-primary">Отправить</button>
                <input type="hidden" name="status" value="0">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <a href="{{ route('index')}}" id="cancel" name="cancel" class="btn btn-default">Отмена</a>
            </div>
        </form>
    </div>
</div>