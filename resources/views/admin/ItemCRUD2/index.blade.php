@extends('layouts.app')
 
@section('content')
    <div>
        <ul class="breadcrumb">
            <li class="completed"><a href="{{ url('home') }}">Home</a></li>
            <li><a href="javascript:void(0);">CRUD</a></li>
        </ul>
    </div>
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2><i class="fa fa-list-alt" aria-hidden="true"></i> CRUD</h2>
	        </div>
	        <div class="pull-right">
	        	@permission('item-create')
	            <a class="btn btn-success" href="{{ route('itemCRUD2.create') }}"><i class="fa fa-asterisk" aria-hidden="true"></i> Novo Item</a>
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
			<th width="42%">Titulo</th>
			<th width="42%">Descrição</th>
			<th width="15%">Ação</th>
		</tr>
	</thead>
	<tbody>
	@foreach ($items as $key => $item)
	<tr>
		<td>{{ ++$i }}</td>
		<td>{{ $item->title }}</td>
		<td>{{ $item->description }}</td>
		<td>
			<a class="btn btn-info btn-md" href="{{ route('itemCRUD2.show',$item->id) }}"><i class="fa fa-eye" aria-hidden="true"></i></a>
			@permission('item-edit')
			<a class="btn btn-primary btn-md" href="{{ route('itemCRUD2.edit',$item->id) }}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
			@endpermission
			@permission('item-delete')
			{!! Form::open(['method' => 'DELETE','route' => ['itemCRUD2.destroy', $item->id],'style'=>'display:inline']) !!}
            {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-md']) !!}
        	{!! Form::close() !!}
        	@endpermission
		</td>
	</tr>		
	@endforeach
	</tbody>
	</table>
	{!! $items->render() !!}
@endsection