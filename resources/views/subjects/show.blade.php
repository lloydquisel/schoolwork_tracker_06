@extends('layouts.layout')

@section('navcontent')
<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a class="nav-link" href="#">Subjects</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">SchoolWorks</a>
        </li>
    </ul>
</div>
@endsection

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
    <div class="container h-100 mt-2">
        <a href="/subjects" class="btn btn-secondary btn-sm"><-Back to all subjects</a>
        <h1 class="display-4">Single Subject</h1>
        <h2>Subject Name - {{ $subject->name }}</h2>
        <br>
        <p>Description: {{ $subject->description }}</p>
        
    </div>
</div>
@endsection  