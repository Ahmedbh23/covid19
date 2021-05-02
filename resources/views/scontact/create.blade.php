@extends('layouts.master')

@section('content')
    <div class="jumbotron">
        <h1>Create your own Post :</h1>
        {!! Form::open(['action' => 'App\Http\Controllers\ContactsController@store', 'method' => 'POST']) !!}
            <div class="form-group">
                {{Form::label('title', 'Post Title')}}
                {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Post Title'])}}
            </div>

            <div class="form-group">
                {{Form::label('body', 'Post Body')}}
                {{Form::textarea('body', '', ['class' => 'form-control','placeholder' =>'Post Body'])}}
            </div>

            {{form::submit('Submit', ['class' => 'btn btn-primary'])}}

        {{ Form::close() }}
    </div>
@endsection