@extends('layouts.app')

@section('links')
<li class="nav-item">
    <a class="nav-link" href="{{ route('home') }}">Home</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{ route('subjects.index') }}">Subjects</a>
</li>
<li class="nav-item active">
    <a class="nav-link" href="{{ route('schoolworks.index') }}">Schoolworks</a>
</li>
@endsection

@section('content')
<div>
    <div class="container h-100 mt-2">
        @if(session('mssg') == "danger")
            <div id="alert" class="alert alert-danger text-center" role="alert">
                A subject was deleted!
            </div>
        @elseif(session('mssg') == "success")
            <div id="alert" class="alert alert-success text-center" role="alert">
                A new subject was added!
            </div>
        @endif
        <div class="border-bottom border-secondary pb-3 pt-2 mb-3">
            <h1 class="d-inline display-5 ml-2">Schoolworks Management</h1>
            <a class="btn btn-success btn-lg text-white float-right d-inline mb-2 mr-2" type="button" data-toggle="modal" data-target="#createModal">New Schoolwork</a>
        </div>    
        @if(count($subjects) > 0)
        <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="creatSchoolwork" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createSchoolwork">Create a New Schoolwork</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form class="needs-validation" action="{{ route('schoolworks.store') }}" method="POST" novalidate>
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="name">Description:</label>
                                <input class="form-control" type="text" name="description" id="description" required>
                                <div class="invalid-feedback">
                                    This field is required.
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="subject_id">Select Subject:</label>
                                <select id="subject_id" name="subject_id" class="form-control" required>
                                    <option value="" selected></option>
                                    @foreach($subjects as $subject)
                                        <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Please select a subject.
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="deadline">Deadline:</label>
                                <input type="text" class="form-control" name="deadline" id="datepicker" placeholder="MM/DD/YYYY" required>
                                <div class="invalid-feedback">
                                    A deadline is required.
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @else
        <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="creatSchoolwork" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-danger" id="createSchoolwork">No Subjects Yet!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>You have to create first a subject in the Subject Management page to classify your schoolwork.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <a href="/subjects" class="btn btn-primary">Create a Subject</a>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @if(count($schoolworks) < 1)
            <div class="ml-3">
                <h2><small class="text-muted">You have no pending schoolwork.</small></h2>
            </div>
        @else
        <div class="mt-4 px-2">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Description</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Deadline</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $currentDate = date('m/d/Y');
                    @endphp
                    @foreach($schoolworks as $schoolwork) 
                        @if($currentDate > $schoolwork->deadline)
                        <tr class="text-danger">
                        @else
                        <tr>
                        @endif
                            <td>{{ $schoolwork->description }}</td>
                            <td>@foreach($subjects as $subject)
                                    @if($schoolwork->subject_id == $subject->id)
                                        {{ $subject->name }}
                                    @endif
                                @endforeach
                            </td>
                            <td >{{ $schoolwork->deadline }}</td>
                            <td>
                                <form class="d-inline" action="{{ route('schoolworks.update', $schoolwork->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button class="btn btn-info text-white" type="submit">Submit</button>
                                </form>
                                <form class="d-inline" action="{{ route('schoolworks.destroy', $schoolwork->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn btn-danger text-white" type="button" data-toggle="modal" data-target="#deleteModal{{ $schoolwork->id }}">Delete</a>
                                    <div class="modal fade" id="deleteModal{{ $schoolwork->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-danger" id="deleteModalLabel">You are trying to delete a schoolwork!</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>You haven't submitted this schoolwork yet.</p>
                                                <p>Are you sure you want to delete this item?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
        @if(count($submittedworks) > 0)
            <div class="mt-3 px-2">
                <h3 class="mt-2 pt-3 border border-top-primary border-right-0 border-bottom-0 border-left-0">Submitted Schoolworks</h3>
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Description</th>
                            <th scope="col">Subject</th>
                            <th scope="col">Date Submitted</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($submittedworks as $submittedwork)
                        <tr>
                            <td>{{ $submittedwork->description }}</td>
                            <td>@foreach($subjects as $subject)
                                    @if($submittedwork->subject_id == $subject->id)
                                        {{ $subject->name }}
                                    @endif
                                @endforeach
                            </td>
                            <td>{{ $submittedwork->date_submitted }}</td>
                            <td>
                                <form class="d-inline" action="{{ route('schoolworks.destroy', $submittedwork->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>
@endsection
@section('script')
<script>
    $( function() {
        $( "#datepicker" ).datepicker({
            minDate: new Date()
        });
    });
    document.addEventListener("click", function(){
        document.getElementById("alert").style.display = "none";
    });
</script>
@endsection  