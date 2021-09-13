@extends('adminlte::page')

@section('title', 'BlogApp')

@section('content_header')
 
    <div class="container-fluid">
        <div class="row">
            <div class="col-5">
                <h1>Blogs</h1>
   
            </div>
            <div class="col-7 " style="text-align: right">
                @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 pt-3 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>
        
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            </div>
        </div>
    </div>
@stop

@section('content')
<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
    

    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                <div class="row">
                   <div class="col-8">
                       <h1 class="display-one">Our Blog!</h1>
                       <p>Enjoy reading our posts. Click on a post to read!</p>
                   </div>
                    {{-- @auth
                        <div class="col-4">
                            <p>Create new Post</p>
                            <a href="/blog/create" class="btn btn-primary btn-sm">Add Post</a>
                        </div>    
                    @endauth
                    
                    @guest
                        <div class="col-4">
                            <p>Create new Post</p>
                            <a href="{{ route('login')}}" class="btn btn-primary btn-sm">Add Post</a>
                        </div>
                    @endguest         --}}
                   
                    
                   
               </div>                
               
                @forelse($posts as $post)
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"><a href="./blog/{{ $post->slug }}" >{{ ucfirst($post->title) }}</a></h4>
                            <p class="card-text">{!! $post->body  !!}</p>
                        </div>
                    </div>
               @empty
                   <p class="text-warning">No blog Posts available</p>
               @endforelse
               
           </div>
           {{-- {{ $posts->links('pagination::bootstrap-4')}} --}}
        </div>
        
    </div>
</div>
@stop
 

