@extends('adminlte::page')

@section('title', 'Create Blog')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <a href="/home" class="btn btn-outline-primary btn-sm">Go back</a>
           
                <div class="card text-left">
                    <h1>Create a New Post</h1>
                    <p>Fill and submit this form to create a post</p>
                  <div class="card-body">
                    <form action="{{ route('store')}}" method="POST" novalidate >
                        @csrf
                        <div class="row">
                            <div class="control-group col-12">
                                <label for="title">Post Title</label>
                                <input type="text" id="title" class="form-control" name="title" placeholder="Enter Post Title" autocomplete="off" value="{{ old('title') }}" required>
                                @error('title')
                                    <small class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                @enderror
                            </div>
    
                            <div class="control-group col-12">
                                <label for="title">Post Slug</label>
                                <input type="text" id="slug" class="form-control" name="slug" placeholder="Post Slug" autocomplete="off" value="{{ old('slug') }}" required>
                                @error('slug')
                                    <small class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                @enderror
                            </div>
                            
                            <div class="control-group col-12 mt-2">
     
                                @if(session('status'))
                                  <div class="alert alert-success">
                                      {{ session('status') }}
                                  </div>
                                @endif
                            </div>
                                
                           
                            <div class="control-group col-12 mt-2">
                                {{-- <label for="body">Post Body</label>
                                <textarea id="body" class="form-control @error('body') is-invalid @enderror" name="body" placeholder="Enter Post Body"
                                          rows="" required style="height: 150px">{{ old('body') }}</textarea> --}}
                                          <div class="form-group">
                                            <label>Description</label>
                                            <textarea name="body" rows="10" cols="40" class="form-control tinymce-editor">{{ old('body') }}</textarea>
                                        </div> 
                            @error('body')
                                <small class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
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
            
                </div>
            </div>
        </div>
    </div>
</div>



@stop 

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha256-aAr2Zpq8MZ+YA/D6JtRD3xtrwpEz2IqOS+pWD/7XKIw=" crossorigin="anonymous" />
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
  <script src="https://cdn.tiny.cloud/1/bp366yubc68046zt9bzvyiw3cgxv8x9ym7g8bckcrp2538y1/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'a11ychecker advcode casechange export formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
      toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter pageembed permanentpen table',
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
   });
  </script>
@stop
