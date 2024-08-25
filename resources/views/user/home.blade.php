@extends('layout.app')

@section('title')
    Welcome
@endsection

@section('style')
@endsection

@section('content')
    <div class="container mt-3">
        <h1>Welcome User, {{ auth()->user()->name }}!</h1>
    </div>
@endsection

@section('script')
@endsection
