@extends('layouts.app')

@section('content')

<div class="card" style="background-color:rgb(243, 243, 243); border-color:darkblue;">
  <div class="card-body">
    <nav class="nav justify-content-center float-right">
      
      <a class="nav-link active " href="#">Home</a>
      <a class="nav-link" href="{{ route('logout') }}">Log Out</a>
    </nav>
    <h4 class="card-title">Read Blogs</h4>
   
    <p class="card-text">
        @forelse($blogs as $post)
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"><a href="#" >{{ ucfirst($post->title) }}</a></h4>
                <p class="card-text">{{$post->body}}</p>
            </div>
        </div>
      </p>
   @empty
       <p class="text-warning">No blog blogs available</p>
   @endforelse

    
  </div>
</div>

@endsection