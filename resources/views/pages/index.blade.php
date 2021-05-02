@extends('layouts.master')

@section('content')
    <div class="jumbotron text-center">
    <h1 class="display-4">Welcome To our covid-19 center</h1>
    <h4 style='color:green; font-weight:bold'>We offer you </h4>    
        <li>vacination against Covid</li>
        <li>rapid Test against Covid</li>
        <li>match more of services..</li><br>
    <p>In our Platform you can register informations about you ['age', 'Salary', 'diseases',  'virus carrier ?'], After that we examinete you informations we will answer you.</p>
    <hr class="my-4">
    @guest
    <p>You can Login with your account bellow Or create new account with Register button .</p>
    <p class="lead">
        <a class="btn btn-primary btn-lg" href="/login" role="button">Login</a>
        <a class="btn btn-success btn-lg" href="/register" role="button">Register</a>
    </p>
    @endguest
    </div>
@endsection