@extends('layouts.master')

@section('content')
<div class="jumbotron">
    <h1 style="color:green; font-weight:bold">Services:</h1>
    <div class="well">
        <h3>Here you have the choice between make an appointment For test or if you did Take an appointment For Vaccination</h3>
    </div>

    <div class='text-center'>
        <hr class="my-4">
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="/vaccines/create" role="button">appointment for Vaccin</a>
            <a class="btn btn-success btn-lg" href="/tests" role="button">appointment for Test</a>
        </p>
    </div>
</div>
@endsection