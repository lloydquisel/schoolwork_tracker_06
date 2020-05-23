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
    <div class="container h-100">
        <a href="/subjects" class="btn btn-secondary btn-sm"><-Back to all subjects</a>
        <h1 class="display-4">Single Subject</h1>
        <h2>Subject Name - {{ $subject->name }}</h2>
        <br>
        <p>Description: {{ $subject->description }}</p>
        
    </div>
    
</div>
@endsection  