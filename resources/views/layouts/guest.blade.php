<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{env('SITE_GUEST_META_TITLE')}}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" crossorigin="anonymous">

    <style>
        /* COMMON INTERFACE*/
        body {
            font-family: 'Roboto', sans-serif;
        }
        hr {
            margin-top: 0px;
            margin-bottom: 15px;
        }
        .panel {
            border-radius: 0px;
            -webkit-box-shadow: 0px;
            box-shadow: 0px;
        }        
        .btn {
            border-radius: 0px;
        }
        .form-control {
            border-radius: 0px;
        }
        .table {
            font-size: 14px;
        }       

        /* TOP NAVBAR */
        .navbar-static-top {
            z-index: 1000;
            border-width: 0px 0px 1px;
            border-color: rgb(220, 220, 220);
        }
        .navbar-inverse {
            background-color: #000;
        }        
        .navbar-inverse .navbar-brand {
            color: #fff;
        }        
        .fa-btn {
            margin-right: 6px;
        }

        /* CONTENT HEADER */
        h2{
            font-weight: 300;
        }
        .container > .row > .col-lg-12 > .pull-left > h2,
        .container > .row > .col-lg-12 > .pull-right > a{
            margin-top:10px;
            margin-bottom: 20px;
        }

        /* CONTENT */
        .label {
            font-size: 65%;
            font-weight: 300;
            border-radius: 0px;
        }
    </style>

</head>
<body id="app-layout">
    <nav class="navbar navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ url('assets/imgs/logo-guest.png') }}">
                </a>
            </div>
            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    @if (Auth::guest())
                    @else
                        <li><a href="{{ url('/home') }}">Painel</a></li>
                        <li><a href="{{ route('users.index') }}">Usuários</a></li>
                        <li><a href="{{ route('roles.index') }}">Regras</a></li>
                        <li><a href="{{ route('itemCRUD2.index') }}">CRUD</a></li>
                    @endif
                </ul>
                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Acesso</a></li>
                        <li><a href="{{ url('/register') }}">Registro</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Sair</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        @yield('content')
    </div>
    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>
</html>
