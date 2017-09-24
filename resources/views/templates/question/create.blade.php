@extends('index')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @include('templates.question._form', ['category' => $category, 'categories' => $categories, 'user' => $user])
            </div>
        </div>
    </div>
@stop