@extends('adminlte::page')

@section('title', 'BlogApp')

@section('content_header')
<h1>{{ $users->name }}</h1>
@stop

@section('content')

<div class="card text-white bg-light">
  <div class="card-body">
    <h4 class="card-title">Title</h4>
    <p class="float-right">
        <a name="create" id="create" class="btn btn-primary " href="/manageUser" role="button">Manage Users</a>
    </p>
    
    <p class="card-text">
        <table class="table table-striped table-inverse ">
           
            <thead class="thead-inverse">
                <tr>
        
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
        
                </tr>
                </thead>
                <tbody>
        
                    <tr>
                        <td scope="row">{{ $users->id }}</td>
                        <td>{{ $users->name }}</td>
                        <td>{{ $users->email }}</td>
                        @switch($users->roll_id)
                            @case(1)
                                <td>Admin</td>
                                @break
                            @case(2)
                                <td>Editor</td>
                                @break
                            @case(3)
                                <td>User</td>
                                @break
                            @default
                                <td>No Roll</td>
                        @endswitch
                        
                    </tr>
                </tbody>
        </table>
    </p>
  </div>
</div>
@stop