@extends('layouts.master')

@section('content')
<div class="jumbotron">
    <h1 style="color:green; font-weight:bold">{{$state->name}}</h1>
    <div class="well">
        <ul>
            <li>
                <p>{{$state->about}}</a></h3>
            </li>
        </ul>
    </div>

    <div class='text-center'>
        <hr class="my-4">
        <p>You can Show all Laboratories located in {{$state->name}} & Register to make Vaccine or test .</p>
        <p></p>
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="/laboratory?id={{$state->id}}" role="button">Show Laboratories</a>
        </p>
    </div>
</div>
@endsection