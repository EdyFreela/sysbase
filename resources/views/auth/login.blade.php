@extends('layouts.login')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">

            <div class="login-header text-center">
                <img src="{{ url('assets/imgs/logo-login.png') }}">
                <h3>Faça login no Sysbase</h3>
            </div>
            
            <div class="panel panel-default">
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-12">E-Mail</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-6">Senha</label>
                            <label for="password" class="col-md-6"><a href="{{ url('/password/reset') }}">Esqueceu sua Senha?</a></label>
                            
                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Me Lembre
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-login">
                                    <i class="fa fa-btn fa-sign-in"></i> Acesso
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-body text-center">
                    Novo no Sysbase? <a href="{{ url('/register') }}">Crie uma Conta?</a>
                </div>
            </div>

            <div class="login-footer">
                <a href="{{ url('/terms') }}">Termos</a>
                <a href="{{ url('/privacy') }}">Privacidade</a>
                <a href="{{ url('/security') }}">Segurança</a>
                <a href="{{ url('/contact') }}">Contate-nos</a>
            </div>

        </div>
    </div>
</div>
@endsection
