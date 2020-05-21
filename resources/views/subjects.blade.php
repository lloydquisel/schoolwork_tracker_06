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
        <h1 class="d-inline display-4">Subjects Management</h1>
        <a href="" class="btn btn-dark float-right d-inline mt-3 mr-5">New Subject</a>
        
        <div class="mt-4">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Code</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>CIS2202</td>
                        <td>Web Development</td>
                        <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</td>
                        <td>
                            <a href="" class="btn btn-info">Edit</a>
                            <a href="" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Cis2111</td>
                        <td>sdsadsa</td>
                        <td>ssss</td>
                        <td>
                            <a href="" class="btn btn-info">Edit</a>
                            <a href="" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection  