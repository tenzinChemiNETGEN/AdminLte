@extends('layouts.app')


@section('content')
    
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2 class="text-center">Medium Blog App</h2>
        </div>
        <div class="card-body">
            <h4 class="card-title">Enjoy the Blogs</h4>
                @forelse($blogs as $post)
                <div class="card bg-light">
                    <div class="card-body">
                        <h4 class="card-title"><a href="blog/{{ $post->id }}" >{{ ucfirst($post->title) }}</a></h4>
                        <p class="card-text">{{$post->body}}</p>
                    </div>
                </div>
                </p>
                @empty
                    <p class="text-warning">No blog blogs available</p>
                @endforelse
        </div>
        <div class="card-footer text-muted">
            @2021
        </div>
    </div>

</div>


<div class="container">
    <div class="row">
        <div class="col-2">

        </div>
       
        <div class="col-2">

        </div>
    </div>
</div>
   
    
@endsection