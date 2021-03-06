<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"/>
    <title>FAQ: </title>
    <style>
        .accordion{margin: 0px ;}
        .accordion-toggle {border-bottom: 0px solid #3366bb;cursor: pointer;margin: 2px;padding: 0;position: relative;}
        .accordion-toggle.active:after{content:"";position:absolute;right:0;top:17px;width:0;height:0;border-bottom:none;border-left:5px solid rgba(0,0,0,0);border-right:5px solid rgba(0,0,0,0);}
        .accordion-toggle.active:a:hover{content:"";position:absolute;right:0;top:17px;width:0;height:0;border-bottom:5px solid rgba(0,0,0,0);border-left:5px solid rgba(0,3,6,b);border-right:5px solid rgba(0,0,0,0);}
        .accordion-toggle:before{content:"";position:absolute;right:0;top:17px;width:0;height:0;border-top:5px solid #999;border-left:5px solid rgba(0,0,0,0);border-right:5px solid rgba(0,0,0,0);}
        .accordion-toggle.active:before{display:none;}
        .navbar-default .navbar-text {color: #ff0000;}

        div strong {
            color: red;
        }
        }
    </style>
</head>
<body>
<div class="container-fluid" style="width: 90%">
<nav class="navbar navbar-default navbar-inverse divider-vertical">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand nav navbar-nav" href="{{route('index')}}">Сервис FAQ</a>
        </div>

        <div>
            <ul class="nav navbar-nav pull-right">
            @if (session()->get('role') === 'admin')
                    <div class="pull-left btn-group">
                        <a class="btn btn-success navbar-btn " href="{{ route('category.index') }}"> Управление
                            категориями </a>
                        <a class="btn btn-info navbar-btn " href="{{ route('question.index') }}"> Управление
                            вопросами </a>
                    </div>

                <li><a href="{{  route ('admin.list') }}"> Все администраторы</a></li>

                <p class="active navbar-text "><span class="glyphicon glyphicon-user"></span> Администратор: {{ session()->get('name') }}</p>
                    <a class="btn btn-primary navbar-btn "
                       href="{{  route ('admin.edit', ['id' => session()->get('id')]) }}"> Изменить пароль</a>
                <a class="btn btn-danger navbar-btn" href="{{ route('admin.logout') }}"> Выйти </a>
            @else
                <p class="active navbar-text"><span class="glyphicon glyphicon-user"></span> Гость </p>
                    <li><a href="{{ route ('log') }}"> Вход для администратора</a></li>
            @endif
            </ul>
        </div>
    </div>
</nav>

    <div class = "container-fluid">

        @yield('content')

    </div>
<!-- Футер -->
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="https://github.com/stzv78/laravel-faq">GitHub</a></li>
        </ul>
    </div>
</nav>
<!-- Конец футера -->


    <!-- Конец документа -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</div>
</body>
</html>