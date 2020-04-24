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
  <link rel="stylesheet" href="{{ asset('plugins/fullcalendar/main.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/fullcalendar-daygrid/main.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/fullcalendar-timegrid/main.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/fullcalendar-bootstrap/main.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}
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

  <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}
  ">

  <!-- Daterange picker -->

  <link rel="stylesheet" href="  {{ asset('plugins/daterangepicker/daterangepicker.css') }}
">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.css') }}
">
  <!-- Google Font: Source Sans Pro -->

<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!-- DataTables -->

    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.csss') }}">


  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">


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

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
    aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav ml-auto">



            @if($locale = App::getLocale()  )
        @php $locale = App::getLocale(); @endphp

            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    @switch($locale)
                        @case('en')
                       English
                        @break
                        @case('fr')
                         Francais
                        @break
                        @case('de')
                         Deutsh
                        @break
                        @default
                         English
                    @endswitch
                    <span class="caret"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="lang/en"><img src="{{asset('us.jpg')}}"> English</a>
                    <a class="dropdown-item" href="lang/de"><img src="{{asset('de.jpg')}}"> Deutsh</a>
                    <a class="dropdown-item" href="lang/fr"><img src="{{asset('fr.png')}}"> French</a>
                </div>
            </li>
        </ul>
    </div>
@endif

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">


  <!-- Authentication Links -->
  @guest
  <li class="nav-item">
      <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
  </li>
  @if (Route::has('register'))
      <li class="nav-item">
          <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
      </li>
  @endif
@else
  <li class="nav-item dropdown">
      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
          {{ Auth::user()->name }} <span class="caret"></span>
      </a>

      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ route('logout') }}"
             onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
      </div>
  </li>
@endguest





      <li class="nav-item d-none d-sm-inline-block">

        <a href="http://localhost:8001/users" class="nav-link"><i
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

      <span class="brand-text font-weight-light"> {{session('P_NOM')}}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="http://www.myiconfinder.com/uploads/iconsets/48-48-4b17457ce3226ab34ff4f3e7b1c9e7bd-firefighter.png" class="img-circle elevation-2" alt="User Image">
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
                        <a href="http://localhost:8001/AjoutIntervention"  class="nav-link">
                            <i class="nav-icon fas fa-pencil "></i>
                            <p>ajout intervention</p>
                        </a>
                    </li>
                    <li  class="nav-item">
                        <a href="http://localhost:8001/AllIntervention" class="nav-link">
                            <i class="nav-icon fas fa-pencil "></i>
                            <p>liste intervention</p>
                        </a>
                    </li>
                </ul>
            </li>


            <li @if ( App\Http\Controllers\InterventionController::ispersonnel(session('P_CODE')) == true ) hidden  @endif class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-list"></i>
                    <p>
                        Rapport
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                    <li @if (App\Http\Controllers\InterventionController::isresponsable(session('P_CODE')) == false)) hidden  @endif class="nav-item">
                        <a href="{{route('listeIRapportnonrediger')}}" class="nav-link">
                            <i class="nav-icon fas fa-pencil "></i>
                            <p>Rediger Rapport</p>
                        </a>
                    </li>
                    <li @if (App\Http\Controllers\InterventionController::isresponsable(session('P_CODE')) == false) hidden  @endif class="nav-item">
                        <a href="{{route('listeAllrapportresponsable')}}" class="nav-link">
                            <i class="nav-icon fas fa-pencil "></i>
                            <p>liste all rapport</p>
                        </a>
                    </li>
                    <div>
                        <li @if ( App\Http\Controllers\InterventionController::isresponsable(session('P_CODE'))  == true)
                         hidden
                        @elseif (App\Http\Controllers\InterventionController::ischefducorp(session('P_CODE'))  == true)

                        @else
                        hidden
                        @endif class="nav-item">
                            <a href="{{route('listeallrapportchef')}}" class="nav-link">
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
                <a href="http://localhost:8001/parametres"  class="nav-link">
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
                        <a href="http://localhost:8001/AllArchive" class="nav-link">
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
    <!-- SEARCH FORM
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
    -->
@yield('content')

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






<script src="{{ asset('/js/app.js') }}
"></script>
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
<!-- ce que jai ajouter -->


<!-- ce que jai ajouter -->


<script src="{{ asset('dist/js/pages/dashboard.js') }}
"></script>
<!-- AdminLTE for demo purposes -->

<script src="{{ asset('dist/js/demo.js') }}
"></script>
<!-- ce que jai ajouter -->
<script src="{{ asset('plugins/fullcalendar/main.min.js') }}"></script>


<script src="{{ asset('plugins/fullcalendar-daygrid/main.min.js') }}"></script>
<script src="{{ asset('plugins/fullcalendar-timegrid/main.min.js') }}"></script>
<script src="{{ asset('plugins/fullcalendar-interaction/main.min.js') }}"></script>
<script src="{{ asset('plugins/fullcalendar-bootstrap/main.min.js') }}"></script>

<!-- ce que jai ajouter -->

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>


<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
@yield('scripto');
