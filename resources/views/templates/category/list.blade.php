@extends('index')
@section('content')
    @if(session()->has('success'))
        <div class='alert alert-success fade in alert-dismissable'>
            {{ session()->get('success') }}
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