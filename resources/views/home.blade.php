@extends('layouts.app')

@section('content')
<input type="hidden" id="api_token" value="{{ session('api_token') }}" />
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                 <unread-meassage :user_id="{{ auth()->user()->id }}"></unread-meassages>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    <example-component></example-component>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
