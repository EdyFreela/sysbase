@extends('layouts.app')
 
@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Gestão de Regras</h2>
	        </div>
	        <div class="pull-right">
	        	@permission('role-create')
	            <a class="btn btn-success" href="{{ route('roles.create') }}"><i class="fa fa-plus" aria-hidden="true"></i> Nova Regra</a>
	            @endpermission
	        </div>
	    </div>
	</div>
	@if ($message = Session::get('success'))
		<div class="alert alert-success">
			<p>{{ $message }}</p>
		</div>
	@endif
	<table class="table table-bordered">
		<tr>
			<th width="1%">#</th>
			<th width="30%">Nome</th>
			<th width="54%">Descrição</th>
			<th width="15%">Ação</th>
		</tr>
	@foreach ($roles as $key => $role)
	<tr>
		<td>{{ ++$i }}</td>
		<td>{{ $role->display_name }}</td>
		<td>{{ $role->description }}</td>
		<td>
			<a class="btn btn-info btn-sm" href="{{ route('roles.show',$role->id) }}"><i class="fa fa-eye" aria-hidden="true"></i></a>
			@permission('role-edit')
			<a class="btn btn-primary btn-sm" href="{{ route('roles.edit',$role->id) }}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
			@endpermission
			@permission('role-delete')
			{!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
            {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm']) !!}
        	{!! Form::close() !!}
        	@endpermission
		</td>
	</tr>
	@endforeach
	</table>
	{!! $roles->render() !!}
@endsection