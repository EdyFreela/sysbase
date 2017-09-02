@extends('layouts.app')
 
@section('content')
	<div>
		<ul class="breadcrumb">
			<li class="completed"><a href="{{ url('home') }}">Home</a></li>
			<li><a href="javascript:void(0);">Permissão</a></li>
		</ul>
	</div>
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2><i class="fa fa-unlock-alt" aria-hidden="true"></i> Gestão de Permissão</h2>
	        </div>
	        <div class="pull-right">
	        	@permission('permission-create')
	            <a class="btn btn-success" href="{{ route('permissions.create') }}"><i class="fa fa-asterisk" aria-hidden="true"></i> Nova Permissão</a>
	            @endpermission
	        </div>
	    </div>
	</div>
	@if ($message = Session::get('success'))
		<div class="alert alert-success">
			<p>{{ $message }}</p>
		</div>
	@endif
	<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th width="1%">#</th>
			<th width="15%">Nome</th>
			<th width="20%">Nome de Exibição</th>
			<th width="49%">Descrição</th>
			<th width="15%">Ação</th>
		</tr>
	</thead>
	<tbody>
	@foreach ($permissions as $key => $permission)
	<tr>
		<td>{{ ++$i }}</td>
		<td>{{ $permission->name }}</td>
		<td>{{ $permission->display_name }}</td>
		<td>{{ $permission->description }}</td>
		<td>
			<a class="btn btn-info btn-md" href="{{ route('permissions.show',$permission->id) }}"><i class="fa fa-eye" aria-hidden="true"></i></a>
			@permission('permission-edit')
			<a class="btn btn-primary btn-md" href="{{ route('permissions.edit',$permission->id) }}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
			@endpermission
			@permission('permission-delete')
			{!! Form::open(['id' => 'permission-delete-'.$permission->id, 'method' => 'DELETE','route' => ['permissions.destroy', $permission->id],'style'=>'display:inline']) !!}
            {!! Form::button('<i class="fa fa-trash"></i>', ['data-id' => $permission->id, 'class' => 'btn btn-danger btn-md']) !!}
        	{!! Form::close() !!}
        	@endpermission
		</td>
	</tr>
	@endforeach
	</tbody>
	</table>
	{!! $permissions->render() !!}
@endsection

@section('script')

<!-- ADITIONAL SCRIPT -->
<script type="text/javascript">

$('button.btn-danger').on('click', function(){

    var id        = $(this).data('id');
    var form_name = 'permission-delete-' + id;
	var $inputs   = $('#' + form_name + ' :input');

	var values = {};
	$inputs.each(function() {
	    values[this.name] = $(this).val();
	});

	var token = values._token;
	var url   = $('#' + form_name).attr('action');

	swal({
		title: 'Você tem certeza?',
		text: "Você não poderá reverter isso!",
		type: 'warning',
		showCancelButton: true,
		confirmButtonText: 'Sim, deletar isso!',
		cancelButtonText: "Não, cancelar!"
	}).then(function (miss) {
        $.ajax({
            url: url,
            data: {_method: 'delete', _token :token},
            type: 'post',
            datatype: 'json',
            success: function (result) {
                swal({
                	title: 'Deletado!', 
                	text: 'Este registro foi deletado.', 
                	type: 'success',
    				allowOutsideClick: false
                }).then(function(result2){
                	if(result2 == true){
                		location.reload();
                	}
                });
            }
        });
	}, function (dismiss) {
	  if (dismiss === 'cancel') {
	    swal('Cancelado', 'Nenhuma registro foi deletado', 'error')
	  }
	});

});
 
</script>
@endsection