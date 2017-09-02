<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sysbase</title>
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
        .breadcrumb {
            padding: 0px;
            background: #f5f5f5;
            list-style: none; 
            overflow: hidden;
            margin-top: 0px;
            margin-bottom: 10px;
            border-radius: 0px;
        }
        .breadcrumb>li+li:before {
            padding: 0;
        }
        .breadcrumb li { 
            float: left;
            background-color: #d4d4d4;
        }
        .breadcrumb li.active a {
            background: brown;                   /* fallback color */
            background: #d4d4d4; ; 
        }
        .breadcrumb li.completed a {
            background: brown;                   /* fallback color */
            background: hsl(0, 0%, 69%); 
        }
        .breadcrumb li.active a:after {
            border-left: 30px solid #d4d4d4; ;
        }
        .breadcrumb li.completed a:after {
            border-left: 30px solid hsl(0, 0%, 69%);
        } 

        .breadcrumb li a {
            color: white;
            text-decoration: none; 
            padding: 5px 0 5px 45px;
            position: relative; 
            display: block;
            float: left;
            font-size:11px;
        }
        .breadcrumb li a:after { 
            content: " "; 
            display: block; 
            width: 0; 
            height: 0;
            border-top: 50px solid transparent;           /* Go big on the size, and let overflow hide */
            border-bottom: 50px solid transparent;
            border-left: 30px solid hsla(0, 0%, 83%, 1);
            position: absolute;
            top: 50%;
            margin-top: -50px; 
            left: 100%;
            z-index: 2; 
        }   
        .breadcrumb li a:before { 
            content: " "; 
            display: block; 
            width: 0; 
            height: 0;
            border-top: 50px solid transparent;           /* Go big on the size, and let overflow hide */
            border-bottom: 50px solid transparent;
            border-left: 30px solid white;
            position: absolute;
            top: 50%;
            margin-top: -50px; 
            margin-left: 1px;
            left: 100%;
            z-index: 1; 
        }   
        .breadcrumb li:first-child a {
            padding-left: 15px;
        }
        .breadcrumb li a:hover { background: #5cb85c  ; }
        .breadcrumb li a:hover:after { border-left-color: #5cb85c   !important; }

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
    <nav class="navbar navbar-inverse navbar-static-top">
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
                <a class="navbar-brand" href="{{ url('/home') }}">
                    <img src="{{ url('assets/imgs/logo-admin.png') }}">
                </a>
            </div>
            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    @if (Auth::guest())
                    @else
                        <li><a href="{{ route('users.index') }}">Usuários</a></li>
                        <li><a href="{{ route('roles.index') }}">Regras</a></li>
                        <li><a href="{{ route('permissions.index') }}">Permissões</a></li>
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
