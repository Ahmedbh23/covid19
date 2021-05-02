@extends('layouts.master')

@section('content')
    <div class="jumbotron">
        <h1>Enter your test result bellow :</h1>
        {!! Form::open(['action' => 'App\Http\Controllers\TestsController@store', 'method' => 'POST']) !!}
            
            <div class="form-group">
                {{Form::label('test_res', 'Test Result')}}
                {{Form::text('test_res', '', ['class' => 'form-control','placeholder' =>'Test Result'])}}
            </div>

            <div class="form-group">
                {{Form::label('labo', 'Choose a Laboratory To make Test :')}}
                {{Form::text('labo', '', ['class' => 'form-control','placeholder' =>'Laboratory name'])}}
            </div>

            <div class="form-group">
                {{Form::label('date_test', 'Date of Test')}}
                {{Form::date('date_test', '', ['class' => 'form-control', 'placeholder' => 'Testing Date', 'min' => '2021-01-01'])}}
            </div>

            {{form::submit('Submit', ['class' => 'btn btn-primary'])}}

        {{ Form::close() }}
    </div>
@endsection