@extends('layouts.app')
 
@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Users Management</h2>
	        </div>
	        <div class="pull-right">
	            <a class="btn btn-success" href="{{ route('users.create') }}"> Create New User</a>
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
			<th width="1%">No</th>
			<th width="20%">Name</th>
			<th width="25%">Email</th>
			<th width="39%">Roles</th>
			<th width="15%">Action</th>
		</tr>
	@foreach ($data as $key => $user)
	<tr>
		<td>{{ ++$i }}</td>
		<td>{{ $user->name }}</td>
		<td>{{ $user->email }}</td>
		<td>
			@if(!empty($user->roles))
				@foreach($user->roles as $v)
					<label class="label label-success">{{ $v->display_name }}</label>
				@endforeach
			@endif
		</td>
		<td>
			<a class="btn btn-info btn-sm" href="{{ route('users.show',$user->id) }}"><i class="fa fa-eye" aria-hidden="true"></i></a>
			<a class="btn btn-primary btn-sm" href="{{ route('users.edit',$user->id) }}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
			{!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
			{!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm']) !!}
        	{!! Form::close() !!}
		</td>
	</tr>
	@endforeach
	</table>
	{!! $data->render() !!}
@endsection