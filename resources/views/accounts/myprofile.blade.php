@extends('adminlte::page')

@section('title', 'BlogApp')

@section('content_header')
<h1>Admin Account</h1>
@stop

@section('content')

<div class="card text-white bg-light">
  <div class="card-body">
    <h4 class="card-title">Title</h4>
    <p class="float-right">
        <a name="create" id="create" class="btn btn-primary " href="/createUser" role="button">Create Users</a>
    </p>
    
    <p class="card-text">
        <table class="table table-striped table-inverse ">
           
            <thead class="thead-inverse">
                <tr>
        
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
        
                </tr>
                </thead>
                <tbody>
        
                    <tr>
                        <td scope="row">{{ $users->id }}</td>
                        <td>{{ $users->name }}</td>
                        <td>{{ $users->email }}</td>
                    </tr>
                </tbody>
        </table>
    </p>
  </div>
</div>
@stop