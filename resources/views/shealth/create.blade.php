@extends('layouts.master')

@section('content')
    <div class="jumbotron">
        <h1>Create Your Personal File :</h1>
        {!! Form::open(['action' => 'App\Http\Controllers\Health_infosController@store', 'method' => 'POST']) !!}

            <div class="form-group">
                {{Form::label('diseases', 'Diseases')}}
                {{Form::textarea('diseases', '', ['class' => 'form-control','placeholder' =>'Diseases'])}}
            </div>

            <div class="form-group">
                {{Form::label('nbr_dis', 'Number of Diseases')}}
                {{Form::number('nbr_dis', '', ['class' => 'form-control', 'placeholder' => 'Title', 'min' => '0', 'max' => '8' ])}}
            </div>

            <div class="form-group">
                {{Form::label('age', 'Your age')}}
                {{Form::number('age', '', ['class' => 'form-control', 'placeholder' => 'Your age', 'min' => '6', 'max' => '118' ])}}
            </div>

            {{form::submit('Submit', ['class' => 'btn btn-primary'])}}

        {{ Form::close() }}
    </div>
@endsection