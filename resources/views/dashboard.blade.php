@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class='panel-body'>
                        
                        <a href="/vaccines/create" class="btn btn-primary">take appointment</a><br><br>
                        <h3>Take an appointment To vaccinate against Covid19</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
