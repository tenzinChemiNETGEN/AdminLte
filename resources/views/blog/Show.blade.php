@extends('adminlte::page')

@section('title', 'Create Blog')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 pt-2">
            <a href="/blog" class="btn btn-outline-primary btn-sm">Go back</a>
            <h1 class="display-one"> {{ ucfirst($post->title) }} </h1>
            <hr>
            <p>{!! $post->body !!}</p> 
        </div>
    </div>
</div>


@stop