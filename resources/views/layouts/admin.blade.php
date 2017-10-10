<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS-->
  <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/jquery.dataTables.css')}}" rel="stylesheet">
    <link href="{{asset('css/dataTables.bootstrap.css')}}" rel="stylesheet">
       <link href="{{ asset('css/bootstrap-material-datetimepicker.css') }}" rel="stylesheet">
       <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
     <title>STFI Bandung</title>
    <!-- Favicon-->
    <link rel="icon" href="images/favicon.png" type="image/png">
<link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
      

    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet">
  
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!--if lt IE 9
    script(src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')
    script(src='https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js')
    -->
  </head>
  <body class="sidebar-mini fixed">
    <div class="wrapper">
      <!-- Navbar-->
      <header class="main-header hidden-print"> <a class="logo" href="{{ url('/home') }}"><small>Farmasi Indonesia</small></a>
        <nav class="navbar navbar-static-top">
          <!-- Sidebar toggle button--><a class="sidebar-toggle" href="#" data-toggle="offcanvas"></a>
          <!-- Navbar Right Menu-->
          <div class="navbar-custom-menu">
            <ul class="top-nav">
              <!--Notification Menu-->
             
              <!-- User Menu-->
              <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user fa-lg"></i></a>
                <ul class="dropdown-menu settings-menu">
                  <li><a href="{{ url('/settings/password') }}"><i class="fa fa-cog fa-lg"></i> Settings</a></li>
                  <li><a href="{{ url('/settings/profile') }}"><i class="fa fa-user fa-lg"></i> Profile</a></li>
                  <li> 
                 <a href="{{ route('logout') }}"  class="btn btn-default btn-flat"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Side-Nav-->
      <aside class="main-sidebar hidden-print">
        <section class="sidebar">
          <div class="user-panel">
            <div class="pull-left image"><img class="img-circle" src="{{asset('img/a.png')}}" alt="User Image"></div>
            <div class="pull-left info">
              <p>{{ Auth::user()->name }}</p>
              <p class="designation">Frontend Developer</p>
            </div>
          </div>
          <!-- Sidebar Menu-->
          <ul class="sidebar-menu">
            <li class="active"><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
         
          
            <li class="treeview"><a href="#"><i class="fa fa-th-list"></i><span>Tables</span><i class="fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="{{route('staff.index')}}"><i class="fa fa-circle-o"></i> Staff</a></li>
                <li><a href="{{route('kategori.index')}}"><i class="fa fa-circle-o"></i> Kategori</a></li>
                <li><a href="{{route('tempat.index')}}"><i class="fa fa-circle-o"></i> Tempat</a></li>
                <li><a href="{{route('barang.index')}}"><i class="fa fa-circle-o"></i> Barang</a></li>
                <li><a href="{{route('barangmasuk.index')}}"><i class="fa fa-circle-o"></i> Barang Masuk</a></li>
                <li><a href="{{route('penempatanbarang.index')}}"><i class="fa fa-circle-o"></i> Penempatan Barang</a></li>
                <li><a href="{{route('penyesuaianstok.index')}}"><i class="fa fa-circle-o"></i> Penyesuaian Stok</a></li>
              </ul>
            </li>
          
          </ul>
        </section>
      </aside>
      <div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
            <p>Sekolah Tinggi Farmasi <small>Indonesia</small></p>
          </div>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li><a href="{{ url('/home') }}">Dashboard</a></li>
            </ul>
          </div>
        </div>
        
           @include('layouts._flash')
     @yield('content')
        </div>
      </div>
    </div>
   
 
  
      </div>
    </div>
    <!-- Javascripts-->
    <!-- Javascripts-->

    <script src="{{ asset('js/jquery-2.1.4.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/plugins/pace.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="/js/custom.js"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/bootstrap-datepicker.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/select2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/bootstrap-datepicker.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap-material-datetimepicker.js') }}"></script>
    <script src="{{ asset('table/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('table/js/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset ('js/plugins/bootstrap-notify.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset ('js/plugins/sweetalert.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/select2.min.js') }}"></script>
    <script src="{{ asset ('js/moment.js') }}"></script>
    <script src="{{ asset ('js/bootstrap-datetimepicker.min.js') }}"></script>
    
    <script type="text/javascript">
     $(function () {
    $('#datetimepicker2').datetimepicker({
        format: 'YYYY-MM-DD h:m:s A',
      });
  });
      $('#sl').click(function(){
        $('#tl').loadingBtn();
        $('#tb').loadingBtn({ text : "Signing In"});
      });
      
      $('#el').click(function(){
        $('#tl').loadingBtnComplete();
        $('#tb').loadingBtnComplete({ html : "Sign In"});
      });
      
      $('#demoDate').datepicker({
        format: "dd/mm/yyyy",
        autoclose: true,
        todayHighlight: true
      });
      
      $('#demoSelect').select2();
       $('#demoSelecte').select2();
        $('#demoSelected').select2();


       $('#date-fr').bootstrapMaterialDatePicker
      ({
        format: 'DD/MM/YYYY HH:mm',
        lang: 'fr',
        weekStart: 1, 
        cancelText : 'ANNULER',
        nowButton : true,
        switchOnClick : true
      });
      $('#demoSwal').click(function(){
        swal({
          title: "Are you sure?",
          text: "You will not be able to recover this imaginary file!",
          type: "warning",
          showCancelButton: true,
          confirmButtonText: "Yes, delete it!",
          cancelButtonText: "No, cancel plx!",
          closeOnConfirm: false,
          closeOnCancel: false
        }, function(isConfirm) {
          if (isConfirm) {
            swal("Deleted!", "Your imaginary file has been deleted.", "success");
          } else {
            swal("Cancelled", "Your imaginary file is safe :)", "error");
          }
        });
      });
    </script>
    <script type="text/javascript">$('body').removeClass("sidebar-mini").addClass("sidebar-collapse");</script>
    
    </script>
     @yield('scripts')
  </body>
</html>
