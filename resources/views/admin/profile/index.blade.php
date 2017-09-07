@extends('layouts.app')

@section('style')
@endsection
 
@section('content')
    <div>
        <ul class="breadcrumb">
            <li class="completed"><a href="{{ url('home') }}">Home</a></li>
            <li><a href="javascript:void(0);">Perfil do Usuário</a></li>
        </ul>
    </div>
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2><i class="fa fa-user" aria-hidden="true"></i> Perfil do Usuário</h2>
	        </div>
	        <div class="pull-right">
	            <a class="btn btn-primary" href="{{ route('profile.edit') }}"><i class="fa fa-pencil" aria-hidden="true"></i> Editar Usuário</a>
	        </div>	        
	    </div>
	</div>
	@if ($message = Session::get('success'))
		<div class="alert alert-success">
			<p><i class="fa fa-check" aria-hidden="true"></i> {{ $message }}</p>
		</div>
	@endif	
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nome:</strong>
                {{ $user->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tipo:</strong>
                {{ $user->user_type }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                {{ $user->email }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Regras:</strong>
                @if(!empty($user->roles))
					@foreach($user->roles as $v)
						<label class="label label-success">{{ $v->display_name }}</label>
					@endforeach
				@endif
            </div>
        </div>
	</div>
@endsection

@section('script')
@endsection