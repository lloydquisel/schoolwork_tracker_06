@extends('layouts.app')

@section('links')
<li class="nav-item active">
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
<div class="container py-3">
    <div class="px-5">
        <h1 class="display-5 border-bottom border-secondary pb-3">Dashboard</h1>
        <div class="card">
            <div class="card-header">
                Schoolworks To-do
            </div>
            <div class="card-body mb-2">
                <h5 class="card-title">You have {{ count($schoolworks) }} pending schoolwork/s.</h5>
                @if(count($schoolworks) < 1)
                    <a class="btn btn-outline-secondary" href="{{ route('schoolworks.index') }}">Add a new schoolwork</a>
                @else
                    <a class="btn btn-outline-secondary" href="{{ route('schoolworks.index') }}">View Schoolworks</a>
                @endif
            </div>
        </div>
        @if(count($deadlines) > 0)
            <div class="card">
                <div class="card-header">
                    Beyond Deadlines
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach($deadlines as $deadline)
                            <li class="list-group-item">Description: {{ $deadline->description}} <small class="border-left text-danger pl-2">Deadline: {{ $deadline->deadline }}</small></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
