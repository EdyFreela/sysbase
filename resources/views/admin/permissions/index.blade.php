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
			{!! Form::open(['method' => 'DELETE','route' => ['permissions.destroy', $permission->id],'style'=>'display:inline']) !!}
            {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-md']) !!}
        	{!! Form::close() !!}
        	@endpermission
		</td>
	</tr>
	@endforeach
	</tbody>
	</table>
	{!! $permissions->render() !!}
@endsection