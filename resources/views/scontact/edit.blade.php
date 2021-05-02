@extends('layouts.master')

@section('content')
    <div class="jumbotron">
        <h1>Edit Post :</h1>
        {!! Form::open(['action' => ['App\Http\Controllers\ContactsController@update', $contact->id], 'method' => 'POST']) !!}
            <div class="form-group">
                {{Form::label('title', 'Post Title')}}
                {{Form::text('title', $contact->title, ['class' => 'form-control', 'placeholder' => 'Post Title'])}}
            </div>

            <div class="form-group">
                {{Form::label('body', 'Post Body')}}
                {{Form::textarea('body', $contact->body, ['class' => 'form-control','placeholder' =>'Post Body'])}}
            </div>
            {{Form::hidden('_method', 'PUT')}}
            {{form::submit('Submit', ['class' => 'btn btn-primary'])}}

        {{ Form::close() }}
    </div>
@endsection