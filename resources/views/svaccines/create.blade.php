@extends('layouts.master')

@section('content')
    <div class="jumbotron">
        <h1>Reserve For Vaccination :</h1>
        {!! Form::open(['action' => 'App\Http\Controllers\VaccinesController@store', 'method' => 'POST']) !!}

            <div class="form-group">
                {{Form::label('date_vacc', 'Take a Date of Vaccination')}}
                {{Form::date('date_vacc', '', ['class' => 'form-control', 'placeholder' => 'Vaccine Date', 'min' => '2021-01-01'])}}
            </div>

            {{form::submit('Submit', ['class' => 'btn btn-primary'])}}

        {{ Form::close() }}
    </div>
@endsection