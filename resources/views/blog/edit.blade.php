@extends('adminlte::page')

@section('title', 'Create Blog')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 pt-2">
            <a href="/blog" class="btn btn-outline-primary btn-sm">Go back</a>
            <div class="border rounded mt-5 pl-4 pr-4 pt-4 pb-4">
                <h1 class="display-4">Edit Post</h1>
                <p>Edit and submit this form to update a post</p>

                <hr>
                <form action="{{ route('update',$post->slug)}}"  method="POST" >
                    @csrf
                    @method('PUT')
                    
                    @if ($post != null)
                        <div class="row">
                            <div class="control-group col-12">
                                <label for="title">Post Title</label>
                                <input type="text" id="title" class="form-control" name="title"
                                    placeholder="Enter Post Title" value="{{ $post->title }}" required>
                            </div>
                          
                            <div class="control-group col-12">
                                <label for="title">Post Slug</label>
                                <input type="text" id="slug" class="form-control" name="slug" placeholder="Post Slug" autocomplete="off" value="{{ $post->slug }}" required>
                                @error('slug')
                                    <small class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                @enderror
                            </div>

                            <div class="control-group col-12 mt-2">
                                <label for="body">Post Body</label>
                                <textarea id="body" class="form-control" name="body" placeholder="Enter Post Body"
                                        rows="5" required>{{ $post->body }}</textarea>
                            </div>
                        </div> 
                    @endif
                    
                        
                    <div class="row mt-2">
                        <div class="control-group col-12 text-center">
                            <button id="btn-submit" class="btn btn-primary">
                                Update Post
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop

@section('js')
    <script>
        $('#title').on('change input',function() {
            if($(this).val() != ""){
                var title = $(this).val();
                $('#slug').val(convertToSlug(title));
            }
            else{
                $('#slug').val("");
            }
        });

        function convertToSlug(text)
        {
            return text
                .toLowerCase()
                .replace(/[^\w ]+/g,'')
                .replace(/ +/g,'-')
                ;
        }
    </script>
@stop