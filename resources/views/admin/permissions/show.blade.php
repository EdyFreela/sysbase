@extends('layouts.app')
 
@section('content')
	<div>
		<ul class="breadcrumb">
			<li class="completed"><a href="{{ url('home') }}">Home</a></li>
			<li class="active"><a href="{{ route('permissions.index') }}">Permissão</a></li>
			<li><a href="javascript:void(0);">Visualizar</a></li>
		</ul>
	</div>
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2><i class="fa fa-unlock-alt" aria-hidden="true"></i> Visualizar Permissão</h2>
	        </div>
	    </div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nome:</strong>
                {{ $permission->name }}
            </div>
        </div>
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nome de Exibição:</strong>
                {{ $permission->display_name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Descrição:</strong>
                {{ $permission->description }}
            </div>
        </div>
	</div>
@endsection