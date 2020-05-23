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
        <h1 class="display-4">Create A New Subject</h1>
        <div class="container w-50 mw-25">
            <form action="/subjects" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Subject Name:</label>
                    <input class="form-control" type="text" name="name" id="name">
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea class="form-control" name="description" id="description"></textarea>
                </div>
                <button class="btn btn-success" type="submit">Create</button>
            </form>
        </div>
    </div>
</div>
@endsection  