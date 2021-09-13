@extends('adminlte::page')

@section('title', 'Create Blog')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
            <h1>{{ ucfirst($users->name) }} View Blogs</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Table</h4>
                    @if (!$blogs==null)
                        <table class="table data-table">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    @else
                    <a name="" id="" class="btn btn-primary" href="/blog/create/post" role="button">Create new block</a>
                    @endif  
                </div>
            </div>
        </div>
    </div>    
</div>
  
@stop

@section('js')
<script type="text/javascript">
    $(function () { 
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('dashboard') }}",
      columns: [
        //   {data: 'id', name: 'id'},
            {data: 'title', name: 'title'},
            {data: 'action', name: 'action', orderable: false, searchable: false, width: "15%"},
            
      ]
    });
    
    });
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
@stop 