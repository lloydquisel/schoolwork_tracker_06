@extends('layouts.app')

@section('links')
<li class="nav-item">
    <a class="nav-link" href="{{ route('home') }}">Home</a>
</li>
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
        @endif

        <h1 class="d-inline display-4">Subjects Management</h1>
        <a class="btn btn-success btn-lg text-white float-right d-inline mt-3 mr-5" type="button" data-toggle="modal" data-target="#createModal">New Subject</a>
        <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Create a New Subject</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('subjects.store') }}" method="POST">
                        <div class="modal-body">
                            @csrf
                            <div class="form-group">
                                <label for="name">Subject Name:</label>
                                <input class="form-control" type="text" name="name" id="name">
                            </div>
                            <div class="form-group">
                                <label for="description">Description:</label>
                                <textarea class="form-control" name="description" id="description"></textarea>
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
                    @foreach($subjects as $subject) 
                        <tr>
                            <td>{{ $subject->name }}</td>
                            <td>{{ $subject->description }}</td>
                            <td>
                                <form class="d-inline" action="{{ route('subjects.update', $subject->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <a class="btn btn-info text-white" type="button" data-toggle="modal" data-target="#editModal{{ $subject->id }}">Edit</a>
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
                                    <a class="btn btn-danger text-white" type="button" data-toggle="modal" data-target="#deleteModal{{ $subject->id }}">Delete</a>
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
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
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