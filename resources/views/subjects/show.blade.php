@extends('layouts.app')

@section('content')
<div>
    <div class="container h-100 mt-2">
        <a href="/subjects" class="btn btn-secondary btn-sm"><-Back to all subjects</a>
        <h1 class="display-4">Single Subject</h1>
        <h2>Subject Name - {{ $subject->name }}</h2>
        <br>
        <p>Description: {{ $subject->description }}</p>
    </div>
</div>
@endsection  