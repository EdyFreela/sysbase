<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{env('SITE_APP_META_TITLE')}}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.10/sweetalert2.min.css">
    <link rel="stylesheet" href="{{ url('assets/css/simple-sidebar.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/admin.css') }}">

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
        .alert-danger, .alert-success{
            border-radius: 0px;
        }
        .alert-danger > h3{
            font-weight: 100;
            margin-top: 0px;
        }
        .alert-success > p{
            font-size: 24px;
            font-weight: 100;
        }
        .swal2-modal {
            font-family: 'Roboto', sans-serif;
            border-radius: 0px;
        }
        .swal2-modal .swal2-styled {
            border-radius: 0px;
        }        

        /* TOP NAVBAR */
        .navbar {
            margin-bottom: 0px;
        }        
        .navbar-inverse {
            background-color: #000;
        }        
        .navbar-inverse .navbar-brand {
            color: #fff;
        }
        .navbar-right > .drop-user > a {
            padding-top: 8px;
            padding-bottom: 7px;
        }        
        .navbar-right > .drop-user > a > div{
            float:left;
        }
        .navbar-right > .drop-user > a > div > .navbar-user-name,
        .navbar-right > .drop-user > a > div > .navbar-user-type{
            margin: 0;
            padding: 0;
        } 
        .navbar-right > .drop-user > a > div > .navbar-user-name{
            font-size: 16px;
            line-height: 1.3em;
        }
        .navbar-right > .drop-user > a > div > .navbar-user-type{
            font-size: 12px;
            line-height: 1.1em;
        }      
        .navbar-right > .drop-user > a > img{
            width:35px;
            margin-left:7px;
            border-radius: 100%;
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
        .container-fluid > .row > .col-lg-12 > .pull-left > h2,
        .container-fluid > .row > .col-lg-12 > .pull-right > a{
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

    @yield('style')

</head>
<body id="app-layout">
    <nav class="navbar navbar-inverse navbar-static-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <a href="javascript:void(0);" id="menu-toggle"><i class="fa fa-bars" aria-hidden="true"></i></a>

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
                        <!--
                        MENU ITEM ADMIN
                        <li><a href="{{ route('users.index') }}">Usuários</a></li>
                        -->
                    @endif
                </ul>
                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Acesso</a></li>
                        <li><a href="{{ url('/register') }}">Registro</a></li>
                    @else
                        <li class="dropdown drop-user">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <div>
                                    <p class="navbar-user-name">{{ Auth::user()->name }}</p>
                                    <p class="navbar-user-type">{{ Auth::user()->user_type }}</p> 
                                </div>
                                <img src="{{ url('assets/imgs/no-avatar.png') }}">
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ route('profile.index') }}"><i class="fa fa-btn fa-user"></i>Perfil do Usuário</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Sair</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <div id="wrapper">
    
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li><a href="{{ url('/home') }}" id="painel"><i class="fa fa-tachometer" aria-hidden="true"></i> Painel</a></li>
                <li><a href="javascript:void(0);" class="tree-toggler" id="super"><i class="fa fa-certificate" aria-hidden="true"></i> Super <span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span></a>
                    <ul class="tree">
                        <li><a href="{{ route('users.index') }}" id="super-users"><i class="fa fa-users" aria-hidden="true"></i> Usuários</a></li>
                        <li><a href="{{ route('roles.index') }}" id="super-roles"><i class="fa fa-check" aria-hidden="true"></i> Regras</a></li>
                        <li><a href="{{ route('permissions.index') }}" id="super-permissions"><i class="fa fa-unlock-alt" aria-hidden="true"></i> Permissões</a></li>
                        <li><a href="{{ route('itemCRUD2.index') }}" id="super-crud"><i class="fa fa-list-alt" aria-hidden="true"></i> CRUD</a></li>
                    </ul>
                </li>
            </ul>
            <div class="sidebar-footer">&copy <?php echo date('Y'); ?> USEMODA - V0.1</div>
        </div>

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.10/sweetalert2.min.js" crossorigin="anonymous"></script>
    <script src="{{ url('assets/jsc/jquery.cookie.js') }}"></script>

    <!-- Menu Toggle Script -->
    <script>
        $(document).ready(function () {

            if($.cookie('menu_toggle')=='toggled'){
                $("#wrapper").toggleClass("toggled");
                $.cookie('menu_toggle', 'toggled');
            }else{
                $(".sidebar-footer").hide();
            };

            $("#menu-toggle").click(function(e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
                if($.cookie('menu_toggle')=='toggled'){
                    $.cookie('menu_toggle', '');
                    $(".sidebar-footer").hide(150);
                }else{
                    $.cookie('menu_toggle', 'toggled');
                    $(".sidebar-footer").show(150);
                };                
            });

            $('.tree-toggler').parent().children('ul.tree').toggle(0);

            $('.tree-toggler').click(function () {
                $(this).parent().children('ul.tree').toggle(150);
            });
        });
    </script>


    @yield('script')

</body>
</html>
