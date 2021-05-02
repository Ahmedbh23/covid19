@extends('layouts.master')

@section('content')
<div class="jumbotron">
    <h1 style="color:green; font-weight:bold">{{$labos->name}}</h1>
    <div class="well">
        <ul>
            <li>
                <p>{{$labos->about}}</a></h3>
            </li>
        </ul>
    </div>

    <div class='text-center'>
        <hr class="my-4">
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="\vaccines\create" role="button">Take Vaccin</a>
            <a class="btn btn-success btn-lg" href="\tests\create" role="button">Take Test</a>
        </p>
    </div>
</div>
@endsection