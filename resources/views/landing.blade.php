@extends('layouts.layout')

@section('content')
<div>
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif
    <div class="container">
        <div class="jumbotron text-center mt-3">
            <h1 class="display-3">Schoolwork Tracker</h1>
            <p class="lead">An app for students</p>
            <div>
                <a href="" class="btn btn-primary">Log In</a>
                <a href="" class="btn btn-secondary">Register</a>
            </div>
        </div>
    </div>
</div>
@endsection  