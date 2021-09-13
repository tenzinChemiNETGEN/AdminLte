@extends('adminlte::page')

@section('title', 'Create User')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 pt-2">
            <a href="/home" class="btn btn-outline-primary btn-sm">Go back</a>
            <div class="border rounded mt-5 pl-4 pr-4 pt-4 pb-4">
                <h1 class="display-4">Create User</h1>
            
                <hr>
                <div class="card text-left">
                  <div class="card-body">
                    <h4 class="card-title">Create User</h4>
                    <p class="card-text">
                        <form action="{{ route('storeUser')}}" method="POST" novalidate>
                            @csrf
                            <div class="row">
                                <div class="control-group col-12">
                                    <label for="title">name</label>
                                    <input type="text" id="title" class="form-control" name="name" placeholder="Enter UserName" autocomplete="off" value="{{ old('title') }}" required>
                                    @error('title')
                                        <small class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </small>
                                    @enderror
                                </div>
                                <div class="control-group col-12 mt-2">
                                    <label for="body">email</label>
                                    <input type="email" id="title" class="form-control" name="email" placeholder="Enter Email-ID" autocomplete="off" value="{{ old('title') }}" required>
                                @error('body')
                                    <small class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                @enderror
                                </div>


                                <div class="control-group col-12 mt-2">
                                    <label for="body">Password</label>
                                    <input type="password" id="title" class="form-control" name="password" placeholder="Enter Password" autocomplete="off" value="{{ old('title') }}" required>
                                @error('body')
                                    <small class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                @enderror
                                </div>

                                <div class="form-group">
                                  <label for="">Choose Role</label>
                                  <select class="form-control" name="roll_id" id="role">
                                    @foreach ($roles as $role)
                                         <option value="{{ $role->id }}">{{ $role->roll_name }}</option>
                                     @endforeach
                                  </select>
                                </div>
                               

                            </div>
                            <div class="row mt-2">
                                <div class="control-group col-12 text-center">
                                    <button id="btn-submit" class="btn btn-primary">
                                        Create Post
                                    </button>
                                </div>
                            </div>
                        </form>
                    </p>
                  </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
@stop