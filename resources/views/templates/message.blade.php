@extends('index')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-{{ $class }}">
                    <div class="panel-heading">Сообщение</div>
                    <div class="panel-body text-center">
                        <h2 class="alert alert-{{ $class  }}"> {{ $message }} </h2>
                        <a href="{{ url($route) }}" class="btn btn-default"> {{ $text }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop