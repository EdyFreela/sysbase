@extends('layouts.app')
 
@section('content')
    <div>
        <ul class="breadcrumb">
            <li class="completed"><a href="{{ url('home') }}">Home</a></li>
            <li class="active"><a href="{{ route('roles.index') }}">Regras</a></li>
            <li><a href="javascript:void(0);">Nova</a></li>
        </ul>
    </div>
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2><i class="fa fa-unlock-alt" aria-hidden="true"></i> Nova Regra</h2>
	        </div>
	    </div>
	</div>
	@if (count($errors) > 0)
		<div class="alert alert-danger">
			<h3><strong>Whoops!</strong> Houve alguns problemas com a sua entrada.</h3>
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif
	{!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nome:</strong>
                {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
            </div>
        </div>
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nome de Exibição:</strong>
                {!! Form::text('display_name', null, array('placeholder' => 'Display Name','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Descrição:</strong>
                {!! Form::textarea('description', null, array('placeholder' => 'Description','class' => 'form-control','style'=>'height:100px')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Permissões:</strong>
                <hr>
                @foreach($permission as $value)
                	<label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                	{{ $value->display_name }}</label>
                	<br/>
                @endforeach
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
				<button type="submit" class="btn btn-success"><i class="fa fa-floppy-o" aria-hidden="true"></i> Gravar</button>
        </div>
	</div>
	{!! Form::close() !!}
@endsection