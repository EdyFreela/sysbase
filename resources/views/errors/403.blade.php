@extends('layouts.app')
 
@section('content')
	<div>
		<ul class="breadcrumb">
			<li class="completed"><a href="{{ url('home') }}">Home</a></li>
			<li><a href="javascript:void(0);">Erro</a></li>
		</ul>
	</div>
	<div class="alert alert-danger" role="alert">
		<h2><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> 403 - Acesso Negado</h2>
	</div>
	<h3>Você não tem permissão para acessar este conteúdo.</h3>
	<p>Contate o administrador do sistema <a href="mailto:{{ env("SITE_ADMIN_MAIL") }}" target="blank">{{ env("SITE_ADMIN_MAIL") }}</a></p>	
@endsection