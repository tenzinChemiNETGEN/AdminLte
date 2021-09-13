@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
  
@stop

@section('content')

    <h1>Admin Dashboard</h1>
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                    <h3>{{ $blog }}</h3>
                    <h3>Blogs</h3>
                    <p>Manage Blogs</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-bag"></i><i class="fa fa-rss" aria-hidden="true"></i>
                    </div>
                    <a href="/editDashboard" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                  <div class="inner">
                    <h3>{{ $userCount }}</h3>
                    <h3>Users</h3>
                    <p>Manage Users</p>
                  </div>
                  <div class="icon">
                    <i class="fa fa-user-plus" aria-hidden="true"></i>
                  </div>
                  <a href="manageUser" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
        </div>
    </div>    
@stop

@section('css')
@stop

@section('js')

@stop
