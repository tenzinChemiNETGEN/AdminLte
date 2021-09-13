@extends('adminlte::page')

@section('title', 'Edit User')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 pt-2">
            <a href="/manageUser" class="btn btn-outline-primary btn-sm">Go back</a>
            <div class="border rounded mt-5 pl-4 pr-4 pt-4 pb-4">
                <h1 class="display-4">Edit User</h1>
                <p>Edit and submit this form to update a post</p>

                <hr>
                <form action="{{ route('updateUser', ['id' => $users->id])}}"  method="POST" >
                    @csrf
                    @method('PUT')
                    
                    @if ($users != null)
                        <div class="row">
                            <div class="control-group col-12">
                                <label for="name">Name</label>
                                <input type="text" id="name" class="form-control" name="name"
                                    placeholder="Enter your name" value="{{ $users->name }}" required>
                            @error('name')
                                <strong class="text-danger">
                                    <small>{{ $message }}</small>
                                </strong>
                            @enderror
                            </div>

                            <div class="control-group col-12 mt-2">
                                <label for="email">Email</label>
                                <input type="email" id="email" class="form-control" name="email"
                                    placeholder="Enter Post Title" value="{{ $users->email }}" required>
                            @error('email')
                                <strong class="text-danger">
                                    <small>{{ $message }}</small>
                                </strong>
                            @enderror
                            </div>

                            <div class="dropdown form-group col-6 mt-2">
                                <label for="role">Edit Role</label>
                                <select class="form-control" name="roll_id" id="roll_id">
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}" {{ $users->roll_id == $role->id ? 'selected' : '' }}>{{ $role->roll_name }}</option>
                                    @endforeach
                                </select>
                            @error('roll_id')
                                <strong class="text-danger">
                                    <small>{{ $message }}</small>
                                </strong>
                            @enderror
                            </div>
                        </div> 
                    @endif
                    
                        
                    <div class="row mt-2">
                        <div class="control-group col-12 text-center">
                            <button id="btn-submit" class="btn btn-primary">
                                Update User
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop