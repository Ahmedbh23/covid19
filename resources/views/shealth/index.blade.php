@extends('layouts.master')

@section('content')
    <div class="jumbotron text-center">
    <h1 class="display-4">Welcome User</h1>
    <h4 style='color:green; font-weight:bold'>informations we need about your Heath: </h4>    
    <ul class="list-group">
        <li class="list-group-item">tested again covid19?</li>
        <li class="list-group-item">Number of Diseases</li>
        <li class="list-group-item">Your Diseases</li>
        <li class="list-group-item">Your age</li>
    </ul>
    <hr class="my-4">
    <p>Click the button bellow To register your informations that will offre you the posibilité to get Vaccinated </p>
    <p></p>
    <p class="lead">
        <a class="btn btn-primary btn-lg" href="info_me/create" role="button">Go to next page</a>
    </p>
    </div>
@endsection