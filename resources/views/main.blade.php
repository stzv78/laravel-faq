@extends('index')
@section('content')
    <a href="{{ route('category.index') }}"> Список категорий </a><br/>

{{session()->get('role')}}
{{session()->get('name')}}
{{session()->get('id')}}


@stop