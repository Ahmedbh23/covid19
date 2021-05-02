@extends('layouts.master')

@section('content')
<div class="jumbotron">
    <h1>Title : <span style="color:green; font-weight:bold">{{$contact->title}}</span></h1>
    <div class="well">
        <ul>
            <li>
                <p>Body: {{$contact->body}}</a></h3>
            </li>
        </ul>
    </div>


        <hr class="my-4">
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="\contact\{{$contact->id}}\edit" role="button">Edit post</a>
            
            {!! Form::open(['action' => ['App\Http\Controllers\ContactsController@destroy', $contact->id], 'method' => 'POST', 'class' => 'pull-right']) !!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {{ Form::close() }}
        </p>
</div>
@endsection