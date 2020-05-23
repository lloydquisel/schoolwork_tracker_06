@extends('layouts.layout')

@section('navcontent')
<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a class="nav-link" href="#">About</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Team</a>
        </li>
    </ul>
    <a href="" class="btn btn-outline-dark mr-2" data-toggle="modal" data-target="#loginModal">Log In</a>
    <a href="" class="btn btn-secondary" data-toggle="modal" data-target="#signupModal">Register</a>
</div>
@endsection

@section('content')
<div class="bg-dark text-white">
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

    <div class="d-inline-block w-45 ml-5">
        <div class="m-5 text-center">
            <h1 class="display-3">Schoolwork Tracker</h1>
            <p class="lead">An app for students</p>
            <div>
                
            </div>
        </div>
    </div>
    <div class="d-inline-block w-45 m-5">
        <form class="bg-light text-dark p-4 rounded">
            <div class="form-row">
                <div class="col from-group">
                    <label for="">First Name</label>
                    <input type="text" class="form-control" placeholder="First name">
                </div>
                <div class="col form-group">
                    <label for="">Last Name</label>
                    <input type="text" class="form-control" placeholder="Last name">
                </div>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Username</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Username">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Password</label>
                <input type="password" class="form-control" id="formGroupExampleInput" placeholder="Password">
            </div>
            <div class="form-group">
                <label for="datepicker">Birthdate</label>
                <input type="text" class="form-control" id="datepicker" placeholder="MM/DD/YYYY">
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                <label class="form-check-label" for="inlineRadio1">Male</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                <label class="form-check-label" for="inlineRadio2">Female</label>
            </div>
            <button type="submit" class="d-block btn btn-primary btn-block my-2 py-3">Sign Up for Schoolwork Tracker</button>
        </form>
    </div>
    <div class="modal fade text-dark" id="loginModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Log In</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/subjects">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="formGroupExampleInput">Username</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Password</label>
                            <input type="password" class="form-control" id="formGroupExampleInput" placeholder="Password">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="Submit" class="btn btn-primary">Log In</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade text-dark" id="signupModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Sign Up</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="">
                    <div class="modal-body">
                            <div class="form-row">
                                <div class="col from-group">
                                    <label for="">First Name</label>
                                    <input type="text" class="form-control" placeholder="First name">
                                </div>
                                <div class="col form-group">
                                    <label for="">Last Name</label>
                                    <input type="text" class="form-control" placeholder="Last name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Username</label>
                                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Password</label>
                                <input type="password" class="form-control" id="formGroupExampleInput" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="datepicker">Birthdate</label>
                                <input type="text" class="form-control" id="datepicker" placeholder="MM/DD/YYYY">
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                <label class="form-check-label" for="inlineRadio1">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                <label class="form-check-label" for="inlineRadio2">Female</label>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Sign Up</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection  