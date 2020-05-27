@extends('layouts.layout')

@section('links')
<li class="nav-item">
    <a class="nav-link" href="{{ route('home') }}">Home</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{ route('subjects.index') }}">Subjects</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{ route('schoolworks.index') }}">Schoolworks</a>
</li>
@endsection

@section('content')
@guest
<div class="row w-100 px-0 bg-dark text-white">
    <div class="col-sm mx-5 p-3">
        <div class="text-center">
            <img src="img/icon.png" width="250" height="250" alt="">
            <h1 class="display-4 mb-0">Schoolwork Tracker</h1>
            <h3 class="text-muted border-bottom pb-3">- Optimize, one at a time -</h3>
            <p class="lead">An app for students that allows them to track their schoolworks</p>
            <div>
            </div>
        </div>
    </div>
    <div class="col-sm m-5 p-5 bg-light text-dark rounded">
        <form class="needs-validation" method="POST" action="{{ route('register') }}" novalidate>
            @csrf

            <div class="form-group row ">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                <div class="col-md-8">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    <div class="invalid-feedback">
                        This field is required.
                    </div>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                <div class="col-md-8">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                    <div class="invalid-feedback">
                        This field is required.
                    </div>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                <div class="col-md-8">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    <div class="invalid-feedback">
                        This field is required.
                    </div>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                <div class="col-md-8">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    <div class="invalid-feedback">
                        This field is required.
                    </div>
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary btn-block py-4">
                        {{ __('Sign Up for Schoolwork Tracker') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@else
<div class="bg-dark text-white">
    <div class="p-5">
        <div class="text-center">
            <img src="img/icon.png" width="300" height="300" alt="">
            <h1 class="display-3 mb-0">Schoolwork Tracker</h1>
            <h3 class="text-muted border-bottom pb-3 w-50 mx-auto">- Optimize, one at a time -</h3>
            <p class="lead">An app for students that allows them to track their schoolworks.</p>
        </div>
    </div>
</div>
@endguest
<div class="bg-white py-5 border-bottom">
    <div class="container">
        <div class="row">
            <div class="col-sm border-right">
                <div class="mx-auto pt-4" style="width:40%;">
                    <h5 class="text-secondary">Shows the number of pending schoolworks and the schoolworks that are beyond the deadline.</h5>
                </div>
            </div>
            <div class="col-sm">
                <div class="text-center">
                    <img src="img/dashboardicon.png" width="200" alt="" style="opacity:0.3;">
                    <h3 class="text-secondary mt-2">Dashboard</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="bg-light py-5 border-bottom">
    <div class="container">
        <div class="row">
            <div class="col-sm text-center border-right">
                <img src="img/subjecticon.png" width="200" alt="" style="opacity:0.3;">
                <h3 class="text-secondary mt-2">Subject Management</h3>
            </div>
            <div class="col-sm">
                <div class="mx-auto pt-5" style="width:40%;">
                    <h5 class="text-secondary">
                        Allows students to enter their subjects and can also edit and delete their entries.
                    </h5>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="bg-white py-5 border-bottom">
`   <div class="container">
        <div class="row">
            <div class="col-sm border-right">
                <div class="mx-auto pt-3" style="width:40%;">
                    <h5 class="text-secondary">
                        Allows students to enter their schoolworks in their corresponding subjects. Shows pending, submitted, and beyond the deadline schoolworks.
                    </h5>
                </div>
            </div>
            <div class="col-sm text-center">
                <img src="img/schoolworkicon.png" width="200" alt="" style="opacity:0.3;">
                <h3 class="text-secondary mt-2">Schoolwork Management</h3>
            </div>
        </div>
    </div>
</div>
<footer class="position-absolute w-100">
    <div class="text-center p-3 bg-light text-dark">
        © 2020 Copyright:
        <a class="d-inline text-dark text-decoration-none" href="/">Schoolwork Tracker</a>
    </div>
</footer>
@endsection
@section('script')
<script>
    $( function() {
        $( "#datepicker" ).datepicker();
    } );
</script>
@endsection