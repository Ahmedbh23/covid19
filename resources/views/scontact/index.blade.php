@extends('layouts.master')

@section('content')

<div class="jumbotron">
    <h1 style="color:green; font-weight:bold">Your Posts :</h1>
    <div class="well">
        @for($i=0; $i < $length ;$i++)
            <h3><a href="/contact/{{$contact[$i]->id}}">Post {{$i+1}}</a></h3>     
            <p>This is post number {{$i+1}} check the link to show informations about it</p>
        @endfor
    </div>

</div>

@endsection