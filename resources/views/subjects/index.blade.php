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
        <h1 class="d-inline display-4">Subjects Management</h1>
        <a href="" class="btn btn-success btn-lg float-right d-inline mt-3 mr-5">New Subject</a>
        
        <div class="mt-4">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- @for($i = 0; $i < 5; $i++)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $i }}</td>
                    </tr>
                    @endfor -->
                    <!-- @for($i = 0; $i < count($subjects); $i++)
                        <tr>
                            <td>{{ $subjects[$i]['name'] }}</td>
                            <td>{{ $subjects[$i]['description'] }}</td>
                        </tr>
                    @endfor -->
                    @foreach($subjects as $subject) 
                        <tr>
                            <td>{{ $subject->name }}</td>
                            <td>{{ $subject->description }}</td>
                            <td>
                                <a href="" class="btn btn-info">Edit</a>
                                <a href="" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection  