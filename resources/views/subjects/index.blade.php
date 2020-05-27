@extends('layouts.app')

@section('links')
<li class="nav-item active">
    <a class="nav-link" href="{{ route('subjects.index') }}">Subjects</a>
</li>
<li class="nav-item">
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
        @elseif(session('mssg') == "edit")
            <div id="alert" class="alert alert-info text-center" role="alert">
                A subject was successfully updated!
            </div>
        @endif
        <div class="border-bottom border-secondary pb-3 pt-2 mb-3">
            <h1 class="d-inline display-5 ml-2">Subjects Management</h1>
            <a class="btn btn-success btn-lg text-white float-right d-inline mb-2 mr-2" type="button" data-toggle="modal" data-target="#createModal">New Subject</a>
        </div>
        <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Create a New Subject</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form class="needs-validation" action="{{ route('subjects.store') }}" method="POST" novalidate>
                        <div class="modal-body">
                            @csrf
                            <div class="form-group">
                                <label for="name">Subject Name:</label>
                                <input class="form-control" type="text" name="name" id="name" placeholder="Subject Name/Code" required>
                                <div class="invalid-feedback">
                                    A subject name is required.
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description">Description:</label>
                                <textarea class="form-control" name="description" id="description" placeholder="Subject Description" required></textarea>
                                <div class="invalid-feedback">
                                    A subject description is required.
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
        <div class="row px-2">
        @if(count($subjects) < 1)
            <div class="ml-3">
                <h2><small class="text-muted">You have no existing subjects.</small></h2>
            </div>
        @else
            @foreach($subjects as $subject)
                <div class="col-sm-3 py-2">
                    <div class="card border-light shadow rounded">
                        <div class="card-header font-weight-bold"></div>
                        <div class="card-body">
                            <h4 class="card-title">{{ $subject->name }}</h4>
                            <p class="card-text">{{ $subject->description }}</p>
                            <p class="card-text"><small class="text-muted">Created on {{ $subject->created_at }}</small></p>
                        </div>
                        <div class="card-footer bg-transparent">
                            <form class="d-inline" action="{{ route('subjects.update', $subject->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <a class="btn btn-info btn-sm text-white" type="button" data-toggle="modal" data-target="#editModal{{ $subject->id }}">Edit</a>
                                <div class="modal fade" id="editModal{{ $subject->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">  
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Updating a subject:</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="name">Subject Name:</label>
                                                <input type="text" name="name" id="name" class="form-control" value="{{ $subject->name }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <textarea type="text" name="description" id="description" class="form-control">{{ $subject->description }}</textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-info text-white">Edit</button>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <form class="d-inline" action="{{ route('subjects.destroy', $subject->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a class="btn btn-danger btn-sm text-white" type="button" data-toggle="modal" data-target="#deleteModal{{ $subject->id }}">Delete</a>
                                <div class="modal fade" id="deleteModal{{ $subject->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-danger" id="exampleModalLabel">You are trying to delete a subject</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure you want to delete this subject?</p>
                                                <p>All the schoolworks related to this subject will also be deleted.</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    document.addEventListener("click", function(){
        document.getElementById("alert").style.display = "none";
    });
</script>
@endsection  