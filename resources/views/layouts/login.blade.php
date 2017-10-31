<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS-->
    <link href="{{ asset('css/bootstrap-material-datetimepicker.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('table/css/jquery.dataTables.css') }}">
    <link rel="stylesheet" href="{{ asset('table/css/dataTables.bootstrap.css') }}">
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">

    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
     <title>Aplikasi Inventaris</title>
    <!-- Favicon-->
    <link rel="icon" href="{{ asset('images/icon.png') }}" type="image/png">
<link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
     
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!--if lt IE 9
    script(src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')
    script(src='https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js')
    -->
  </head>
  
    <div class="wrapper">
      <!-- Navbar-->
     
     @yield('content')
      
    </div>
  
 
  
    <!-- Javascripts-->
    <!-- Javascripts-->
    <script src="{{ asset('js/jquery-2.1.4.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/plugins/pace.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/bootstrap-datepicker.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/select2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/bootstrap-datepicker.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap-material-datetimepicker.js') }}"></script>
    <script src="{{ asset('table/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('table/js/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset ('js/plugins/bootstrap-notify.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset ('js/plugins/sweetalert.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/select2.min.js') }}"></script>
  
  </body>
</html>
