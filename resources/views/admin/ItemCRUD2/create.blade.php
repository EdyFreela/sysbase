@extends('layouts.app')

@section('style')
<style>
#super-crud{
    border-left: 3px solid orange;
}
</style>
@endsection
 
@section('content')
    <div>
        <ul class="breadcrumb">
            <li class="completed"><a href="{{ url('home') }}">Home</a></li>
            <li class="active"><a href="{{ route('itemCRUD2.index') }}">CRUD</a></li>
            <li><a href="javascript:void(0);">Novo</a></li>
        </ul>
    </div>
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2><i class="fa fa-list-alt" aria-hidden="true"></i> Novo CRUD</h2>
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
	{!! Form::open(array('route' => 'itemCRUD2.store','method'=>'POST')) !!}
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Titulo:</strong>
                {!! Form::text('title', null, array('placeholder' => 'Title','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Descrição:</strong>
                {!! Form::textarea('description', null, array('placeholder' => 'Description','class' => 'form-control','style'=>'height:100px')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
				<button type="submit" class="btn btn-success"><i class="fa fa-floppy-o" aria-hidden="true"></i> Gravar</button>
        </div>
	</div>
	{!! Form::close() !!}
@endsection

@section('script')
<!-- Menu Toggle Script -->
<script>
    $(document).ready(function () {
        $('.tree-toggler#super').parent().children('ul.tree').toggle(150);
    });
</script>
@endsection