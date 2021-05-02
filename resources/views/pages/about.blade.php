@extends('layouts.master')

@section('content')
<div class="jumbotron text-center">
    <h1 class="display-4">Welcome in our website</h1><br>
    <a class="btn btn-success btn-lg" href="contact/create" role="button">Create Post</a>
    <a class="btn btn-primary btn-lg" href="contact" role="button">Check Post </a>
    <br>
    <br><br>
    <h2 style='color: purple'>Country</h2>
    @foreach($country as $count)
        <ul class="list-group">
            <li class="list-group-item">County name : <span style='color:red; font-weight:bold'>{{$count->name}}</span></li>
            <li class="list-group-item">Number of tests : <span style='color:red; font-weight:bold'>{{$count->nbr_test}}</span></li>
            <li class="list-group-item">Number of Vaccines : <span style='color:red; font-weight:bold'>{{$count->nbr_vaccin}}</span></li>
            <li class="list-group-item">Number of States : <span style='color:red; font-weight:bold'>{{$count->nbr_states}}</span></li>
            <li class="list-group-item">Number of Laboratories : <span style='color:red; font-weight:bold'>{{$nbr_labos}}</span></li>
            <li class="list-group-item">vaccine Price : <span style='color:red; font-weight:bold'>{{$prix_vac}} $</span></li>
            <li class="list-group-item">Test Price : <span style='color:red; font-weight:bold'>{{$prix_test}} $</span></li>
        </ul>
        <hr class="my-4">
        <p></p>
        <p class="lead">
        </p>
    @endforeach
@endsection