@extends('layouts.app')
 
@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2> Visualizar CRUD</h2>
	        </div>
	        <div class="pull-right">
	            <a class="btn btn-primary" href="{{ route('itemCRUD2.index') }}"><i class="fa fa-chevron-left" aria-hidden="true"></i> Voltar</a>
	        </div>
	    </div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Titulo:</strong>
                {{ $item->title }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Descrição:</strong>
                {{ $item->description }}
            </div>
        </div>
	</div>
@endsection