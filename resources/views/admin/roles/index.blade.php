@extends('layouts.app')

@section('style')
<style>
#super-roles{
    border-left: 3px solid orange;
}
</style>
@endsection
 
@section('content')
	<div>
		<ul class="breadcrumb">
			<li class="completed"><a href="{{ url('home') }}">Home</a></li>
			<li><a href="javascript:void(0);">Regras</a></li>
		</ul>
	</div>
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2><i class="fa fa-unlock-alt" aria-hidden="true"></i> Gestão de Regras</h2>
	        </div>
	        <div class="pull-right">
	        	@permission('role-create')
	            <a class="btn btn-success" href="{{ route('roles.create') }}"><i class="fa fa-asterisk" aria-hidden="true"></i> Nova Regra</a>
	            @endpermission
	        </div>
	    </div>
	</div>
	@if ($message = Session::get('success'))
		<div class="alert alert-success">
			<p><i class="fa fa-check" aria-hidden="true"></i> {{ $message }}</p>
		</div>
	@endif
	<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th width="1%">#</th>
			<th width="30%">Nome</th>
			<th width="54%">Descrição</th>
			<th width="15%">Ação</th>
		</tr>
	</thead>
	<tbody>
	@foreach ($roles as $key => $role)
	<tr>
		<td>{{ ++$i }}</td>
		<td>{{ $role->display_name }}</td>
		<td>{{ $role->description }}</td>
		<td>
			<a class="btn btn-info btn-md" href="{{ route('roles.show',$role->id) }}"><i class="fa fa-eye" aria-hidden="true"></i></a>
			@permission('role-edit')
			<a class="btn btn-primary btn-md" href="{{ route('roles.edit',$role->id) }}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
			@endpermission
			@permission('role-delete')
			{!! Form::open(['id' => 'role-delete-'.$role->id, 'method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
            {!! Form::button('<i class="fa fa-trash"></i>', ['data-id' => $role->id, 'class' => 'btn btn-danger btn-md']) !!}
        	{!! Form::close() !!}
        	@endpermission
		</td>
	</tr>
	@endforeach
	</tbody>
	</table>
	{!! $roles->render() !!}
@endsection

@section('script')

<!-- ADITIONAL SCRIPT -->
<script type="text/javascript">

$('button.btn-danger').on('click', function(){

    var id        = $(this).data('id');
    var form_name = 'role-delete-' + id;
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

<!-- Menu Toggle Script -->
<script>
    $(document).ready(function () {
        $('.tree-toggler#super').parent().children('ul.tree').toggle(150);
    });
</script>
@endsection