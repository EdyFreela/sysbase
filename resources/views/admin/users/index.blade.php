@extends('layouts.app')

@section('style')
<style>
#super-users{
    border-left: 3px solid orange;
}
</style>
@endsection
 
@section('content')
	<div>
		<ul class="breadcrumb">
			<li class="completed"><a href="{{ url('home') }}">Home</a></li>
			<li><a href="javascript:void(0);">Usuários</a></li>
		</ul>
	</div>
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2><i class="fa fa-users" aria-hidden="true"></i> Gestão de Usuários</h2>
	        </div>
	        <div class="pull-right">
	        	@permission('user-create')
	            <a class="btn btn-success" href="{{ route('users.create') }}"><i class="fa fa-asterisk" aria-hidden="true"></i> Novo Usuário</a>
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
			<th width="10%">Tipo</th>
			<th width="20%">Nome</th>
			<th width="15%">Email</th>
			<th width="*">Regras</th>
			<th width="80px" class="text-center">Visualizar</th>
			<th width="80px" class="text-center">Editar</th>
			<th width="80px" class="text-center">Excluir</th>
		</tr>
	</thead>
	<tbody>
	@foreach ($data as $key => $user)
	<tr>
		<td>{{ ++$i }}</td>
		<td>{{ $user->user_type }}</td>
		<td>{{ $user->name }}</td>
		<td>{{ $user->email }}</td>
		<td>
			@if(!empty($user->roles))
				@foreach($user->roles as $v)
					<label class="label label-success">{{ $v->display_name }}</label>
				@endforeach
			@endif
		</td>
		<td class="text-center"><a class="btn btn-info btn-md" href="{{ route('users.show',$user->id) }}"><i class="fa fa-eye" aria-hidden="true"></i></a></td>		
		<td class="text-center">
			@permission('user-edit')
			<a class="btn btn-primary btn-md" href="{{ route('users.edit',$user->id) }}"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>		
			@endpermission
		<td class="text-center">
			@permission('user-delete')
			{!! Form::open(['id' => 'user-delete-'.$user->id, 'method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
			{!! Form::button('<i class="fa fa-trash"></i>', ['data-id' => $user->id, 'class' => 'btn btn-danger btn-md']) !!}
        	{!! Form::close() !!}
        	@endpermission			
		</td>
	</tr>
	@endforeach
	</tbody>
	</table>
	{!! $data->render() !!}
@endsection

@section('script')

<!-- ADITIONAL SCRIPT -->
<script type="text/javascript">

$('button.btn-danger').on('click', function(){

    var id        = $(this).data('id');
    var form_name = 'user-delete-' + id;
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