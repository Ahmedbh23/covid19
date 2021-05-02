@extends('layouts.master')

@section('content')

<div class="jumbotron">
    <h1 style="color:green; font-weight:bold">Laborators : {{$state->name}} </h1>
    <div class="well">
        @for($i=0; $i < $length ;$i++)
            <h3><a href="/laboratory/{{$labos[$i]->id}}">{{$labos[$i]->name}}</a></h3>     
            <ul>           
                <li>
                    <p>number of tests : {{$labos[$i]->nbr_test}}</h3>
                </li>
                <li>
                    <p>number of Vaccines : {{$labos[$i]->nbr_vaccin}}</h3>
                </li>
            </ul>
        @endfor
    </div>

</div>

@endsection