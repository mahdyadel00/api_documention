@extends('layouts.app')

@section('content')
    <input type="hidden" id="api_token" value="{{ session('api_token') }}" />
    <!-- https://www.youtube.com/watch?v=OHhvhMUWB9g -->
    <div class="container">
        <Chat :to="{{ $to }}" :order_id="{{ $order_id }}"
        :product_id="{{ $product_id }}"
        :product_from="{{ $product_from }}"
        :product_to="{{ $product_to }}"
        :from="{{ $from }}"
        :user="{{ auth()->user() }}"></Chat>
    </div>
@endsection
