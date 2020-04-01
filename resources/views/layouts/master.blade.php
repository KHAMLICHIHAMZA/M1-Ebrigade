
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Gestion d'intervention</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="  {{ asset('plugins/fontawesome-free/css/all.min.css') }}
">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->

  <link rel="stylesheet" href="  {{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}
">
  <!-- iCheck -->

  <link rel="stylesheet" href="  {{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}
">
  <!-- JQVMap -->

  <link rel="stylesheet" href="  {{ asset('plugins/jqvmap/jqvmap.min.css') }}
">
  <!-- Theme style -->

  <link rel="stylesheet" href="  {{ asset('dist/css/adminlte.min.css') }}
">
  <!-- overlayScrollbars -->

  <link rel="stylesheet" href="  {{ asset('dist/css/adminlte.min.css') }}
">
  <!-- Daterange picker -->

  <link rel="stylesheet" href="  {{ asset('plugins/daterangepicker/daterangepicker.css') }}
">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.css') }}
">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Home</a>
      </li>
     
    </ul>



    
    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
    <li class="nav-item d-none d-sm-inline-block">
        <a href="#"  class="nav-link"><i
            class="fas fa-door-open"></i></a></a>
            
            <script>
function myFunction2() {
  var txt;
  if (confirm("vous étes sure de vous deconecter !")) {
    

  } else {
    window.location.href;
  }
  document.getElementById("demo").innerHTML = txt;
}
</script>
      </li>

      

      <li class="nav-item d-none d-sm-inline-block">
      <!--       <a href="index.php?c=userscontroller&m=getAllUsers" class="nav-link"><i
-->
        <a href="#" class="nav-link"><i
            class="far fa-user"></i></a></a>
            
      </li>

     

   
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <img src="" alt="" class="brand-image img-responsive elevation-3"
           style="opacity: .8">

      <span class="brand-text font-weight-light"> </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/pompier.jpg" class="img-circle elevation-2" alt="User Image">
        <span>  </span>
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php    ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->



            <li  class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-list"></i>
                    <p>
                        Intervention
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                    <li  class="nav-item">
                        <a href="" class="nav-link">
                            <i class="nav-icon fas fa-pencil "></i>
                            <p>ajout intervention</p>
                        </a>
                    </li>

                    <li  class="nav-item">
                        <a href="" class="nav-link">
                            <i class="nav-icon fas fa-pencil "></i>
                            <p>liste intervention</p>
                        </a>
                    </li>


                </ul>
            </li>



            <li  class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-list"></i>
                    <p>
                        Rapport
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                    <li  class="nav-item">
                        <a href="" class="nav-link">
                            <i class="nav-icon fas fa-pencil "></i>
                            <p>Rediger Rapport</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class="nav-icon fas fa-pencil "></i>
                            <p>liste all rapport</p>
                        </a>
                    </li>
                    <div  >
                        <li  class="nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon fas fa-layers-text "></i>
                                <p>Valider Rapport</p>
                            </a>
                        </li>
                    </div>

                </ul>
            </li>
          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Analyses
                <span class="right badge badge-danger"></span>
              </p>
            </a>
          </li>


          <li class="nav-item">
                <a href=""  class="nav-link">
                    <i class="nav-icon fas fa-calendar"></i>
                    <p>
                    paramètres                     </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="" class="nav-link">
                    <i class="nav-icon fas fa-book"></i>
                    <p>
                        Archive
                        <span class="right badge badge-danger"></span>
                    </p>
                </a>

                <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class="nav-icon fas fa-pencil "></i>
                            <p>Liste des interventions</p>
                        </a>
                    </li>

                </ul>

            </li>


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <div class="content-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <div class="d-flex flex-row justify-content-end">
              
@yield('content');
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> 


 <footer class="main-footer">
    <strong>2020 <a href="">Gestion d'intervention</a></strong>
    
    <div class="float-right d-none d-sm-inline-block">
      <b>M1 MIAGE UHA</b>
    </div>
  </footer>

</div>
<!-- ./wrapper -->




<script src="/js/app.js"></script>
<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}
"></script>
<!-- jQuery UI 1.11.4 -->

<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}
"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->

<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}
"></script>
<!-- ChartJS -->

<script src="{{ asset('plugins/chart.js/Chart.min.js') }}
"></script>
<!-- Sparkline -->
<script src="{{ asset('plugins/sparklines/sparkline.js') }}
"></script>
<!-- JQVMap -->

<script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}
"></script>

<script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}
"></script>
<!-- jQuery Knob Chart -->

<script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}
"></script>
<!-- daterangepicker -->
<script src="{{ asset('plugins/moment/moment.min.js') }}
"></script>

<script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}
"></script>
<!-- Tempusdominus Bootstrap 4 -->

<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}
"></script>
<!-- Summernote -->

<script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}
"></script>
<!-- overlayScrollbars -->

<script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}
"></script>
<!-- AdminLTE App -->


<script src="{{ asset('dist/js/pages/dashboard.js') }}
"></script>
<!-- AdminLTE for demo purposes -->

<script src="{{ asset('dist/js/demo.js') }}
"></script>



</body>
</html>
