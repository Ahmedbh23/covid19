@extends('layouts.master')

@section('content')
    <div class="jumbotron text-center">
    <h1 class="display-4">Welcome User</h1>
    <h4 style='color:green; font-weight:bold'>Here you will make a Test appointmentif you have not vaccinated : </h4>    
    <ul class="list-group">
        <li class="list-group-item">Test result?</li>
        <li class="list-group-item">test Date</li>
        <li class="list-group-item">test Prix</li>
        <li class="list-group-item">Your age</li>
    </ul>
    <hr class="my-4">
    <p>Click the button bellow To register your informations that will offre you the posibilité to get Vaccinated </p>
    <p></p>
    <p class="lead">
        <a class="btn btn-primary btn-lg" href="tests/create" role="button">Test you body</a>
    </p>
    </div>
@endsection