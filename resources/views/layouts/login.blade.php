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
        .login-header {
            margin-top: 30px;
            margin-bottom: 20px;
        }        
        h3 {
            font-weight: 100;
        }
        .panel {
            border-radius: 0px;
            -webkit-box-shadow: 0px;
            box-shadow: 0px;
        }        
        .btn {
            border-radius: 0px;
        }
        .btn-login{
            width:100%;
        }
        .form-control {
            border-radius: 0px;
        }
        .login-footer {
            margin-top: 40px;
            font-size: 12px;
            text-align: center;
        }
        .login-footer a{
            margin-left:10px;
            margin-right:10px;
            color:#777;
        }
    </style>

</head>
<body id="app-layout">
    <div class="container">
        @yield('content')
    </div>
    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    @yield('script')
</body>
</html>
