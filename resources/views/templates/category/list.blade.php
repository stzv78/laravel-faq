@extends('index')
@section('content')
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <!--Секция с категориями-->
    <div class="col-md-9">
        @include('templates.category._list', ['categories' => $categories ])
    </div>

    <!-- Правая часть -->
    <div class="col-md-3">
    @include('templates.question._form', ['categories' => $categories])
    <!-- Конец правой части -->
    </div>
    </div>
    <!--Конец секции с категориями-->
@stop