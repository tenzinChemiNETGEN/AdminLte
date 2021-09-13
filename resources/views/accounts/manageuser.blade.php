@extends('adminlte::page')

@section('title', 'BlogApp')

@section('content_header')
<h1>Manage Users</h1>
@stop

@section('content')
{{-- Setup data for datatables --}}
<section>
    <div class="card text-left">
    <div class="card-body">
        <h4 class="card-title">Table</h4>
        <p class="card-text">
            <table class="table table-striped table-inverse  table-bordered data-table">
                <thead >
                    <tr>
                        <th>ID</th>
                        <th>Email</th>
                        <th width="20%">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    
                    </tbody>
            </table>
        </p>
    </div>
    </div>
</section>

<div class="modal fade" id="modelDelete" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-exclamation-triangle"></i>  Confirm</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this user?
                <small><p class="text-danger">Data Related to this user will also be deleted !</p></small>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="close">Close</button>
                <button type="button" class="btn btn-danger" id="ok_button">Yes</button>
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
        ajax: "{{ route('manageUser') }}",
      columns: [
            {data: 'id', name: 'id'},
            {data: 'email', name: 'email'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
      ]
    });
    
    });

jQuery(document).ready(function($) {
		createTable();

		$('.intent').on('change', function(){
			createTable();
		});

		function createTable(){
			$('.data-table').DataTable({
				'bDestroy': true,
				processing: true,
				serverSide: true,
				ajax: "{{ route('manageUser') }}",
				columns: [
                    {data: 'id', name: 'id'},
                    {data: 'email', name: 'email'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
				]
			});
		}

		var id;
        $(document).on('click','a.delete-data', function(){
            id = $(this).attr('data-id');
        });

        $(document).on('click','#ok_button', function () {             
            $.ajax({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				url: "/admin/users/"+id,
                beforeSend: function () {
                    $('#ok_button').text('Deleting...');
                },
                type: 'DELETE',
                data: {
                    submit: true,
                    _token: $('input[name="_token"]').val()
                },
                success: function (data) {
                    console.log(data);
                    if(data.info){
                        $('#ok_button').text('Yes');
                        $('#close').trigger('click');
                        toastr.info(data.message);
                    }
                    else if(data.info == false){
                        $('#ok_button').text('Yes');
                        $('#close').trigger('click');
                        toastr.error(data.message);
                    }
                    else{
                        setTimeout(function () {
                            $('#ok_button').text('Yes');
                            $('#close').trigger('click');
                            $('#dataTable').DataTable().ajax.reload();
                            toastr.success('User Removed');
                        }, 1000);
                    }
                },
                error: function(){
                    toastr.error('Something Went Wrong, Try Again.');
                    $('#ok_button').text('Yes');
                }
            });
	    });
    });
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
@stop 