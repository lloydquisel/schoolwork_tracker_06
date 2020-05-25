@extends('layouts.app')

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
<div class="bg-dark text-white">
    <div class="d-inline-block w-50 ml-5">
        <div class="text-center">
            <h1 class="display-4">Schoolwork Tracker</h1>
            <p class="lead">An app for students</p>
            <div>
                
            </div>
        </div>
    </div>
    <div class="d-inline-block w-25 m-5 bg-light text-dark rounded p-4">
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group row ">
                <label for="name" class="col-md-6 col-form-label text-md-right">{{ __('Name') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-6 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-6 col-form-label text-md-right">{{ __('Password') }}</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="password-confirm" class="col-md-6 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
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
            <h1 class="display-4">Schoolwork Tracker</h1>
            <p class="lead">An app for students</p>
            <div>
                ,ashhdskahdsaklh
            </div>
        </div>
    </div>
</div
@endguest
<footer class="position-absolute w-100">
    <div class="text-center p-3 bg-light text-dark">
        © 2020 Copyright
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