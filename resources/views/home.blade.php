<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin | Talento Humano</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/86776573a8.js"></script>

  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">

  <!-- jQuery -->
  <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

  <!-- Data tables -->
  <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

  <!-- Toastr -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css" integrity="sha512-6S2HWzVFxruDlZxI3sXOZZ4/eJ8AcxkQH1+JjSe/ONCEqR9L4Ysq5JdT5ipqtzU7WHalNwzwBv+iE51gNHJNqQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js" integrity="sha512-lbwH47l/tPXJYG9AcFNoJaTMhGvYWhVM9YI43CT+uteTRRaiLCui8snIgyAN8XWgNjNhCqlAUdzZptso6OCoFQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/home" class="nav-link">Inicio</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contacto</a>
      </li>

      <!-- Agregar el botón aquí -->
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('asistencia.form') }}" class="btn btn-primary">Registrar mi asistencia</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="fa-solid fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
            <a href="{{ route('configuracion', ['user' => Auth::id()]) }}" class="dropdown-item">
                <div class="media">
                    <div class="media-body">
                      <h3 class="dropdown-item-title" >
                        <i class="fa-solid fa-user-gear"></i> Configuración
                      </h3>
                    </div>
              </div>
            </a>
          <div class="dropdown-divider"></div>
          <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item">
            <div class="media">
              <div class="media-body">
                <h3 class="dropdown-item-title" >
                    <i class="fa-sharp-duotone fa-solid fa-right-from-bracket"></i> Cerrar sesión
                </h3>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
              </div>
            </div>
          </a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
      <img src="{{asset('dist/img/Logo.png')}}" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Talento Humano</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          @php
              $sexo = auth()->user()->empleado->sexo ?? 'M';  // M por defecto
          @endphp
          
          <img 
              src="{{ asset($sexo == 'F' ? 'dist/img/female_avatar.png' : 'dist/img/male_avatar.png') }}" 
              class="img-circle elevation-2" 
              alt="User Image">
        </div>
        <div class="info">
          @if (Auth::user()->empleado && Auth::user()->empleado->nombre && Auth::user()->empleado->apellido)
              <a href="#" class="d-block">
                  {{ Auth::user()->empleado->nombre }} {{ Auth::user()->empleado->apellido }}
              </a>
          @endif
      </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/dashboard" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Tablero
              </p>
            </a>
          </li>

          <!-- Inicia auxiliares -->
        @can('ausencias.index')
          <li class="nav-item">
            <a href="#" class="nav-link active">
                <i class="fa-solid fa-gear"></i>
              <p>
                Auxiliares
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/ausencias" class="nav-link ">
                    <i class="fa-solid fa-user-slash"></i>
                  <p>Tipos Ausencias</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/cmotivopases" class="nav-link ">
                    <i class="fa-solid fa-user-tag"></i>
                  <p>Tipos de Pase</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/ctiporetraso" class="nav-link ">
                  <i class="fa-solid fa-user-injured"></i>
                  <p>Tipos de Retraso</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/ctipoes" class="nav-link ">
                    <i class="fa-solid fa-person-chalkboard"></i>
                  <p>Tipos Entradas y Salidas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/horarios" class="nav-link ">
                  <i class="fa-solid fa-user-clock"></i>
                  <p>Tipos de Horarios</p>
                </a>
              </li>
            </ul>
          </li>
        @endcan
          <!-- Fin auxiliares -->

        @can('ausencias.index')
          <li class="nav-item">
            <a href="/departamento" class="nav-link active">
                <i class="fa-solid fa-people-group"></i>
              <p>Departamentos</p>
            </a>
          </li>
        @endcan

          <!-- Inicia empleados -->
        @can('empleados.index')
          <li class="nav-item">
            <a href="#" class="nav-link active">
                <i class="fa-solid fa-users"></i>
              <p>
                Gestiones Empleados
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @can('ausencias.index')
              <li class="nav-item">
                <a href="/users" class="nav-link">
                  <i class="fa-solid fa-arrows-down-to-people"></i>
                  <p>Administrar usuarios</p>
                </a>
              </li>
              @endcan
              <li class="nav-item">
                <a href="/empleados" class="nav-link">
                    <i class="fa-solid fa-users-gear"></i>
                  <p>Administrar empleados</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/horarioasignado" class="nav-link">
                    <i class="fa-solid fa-calendar-days"></i>
                  <p>Asignar Horarios</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/trabextralaboral" class="nav-link">
                    <i class="fa-solid fa-business-time"></i>
                  <p>Registrar Horas Extra</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('asistencias.hoy') }}" class="nav-link">
                    <i class="fa-solid fa-address-card"></i>
                  <p> Ver Asistencias</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/adminausencia" class="nav-link">
                  <i class="fa-solid fa-list"></i>
                  <p> Ver Solicitudes Ausencias</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('retraso.admin') }}" class="nav-link">
                  <i class="fa-solid fa-bed"></i>
                  <p> Ver Retrasos</p>
                </a>
              </li>
            </ul>
          </li>
        @endcan
          <!-- Fin empleados -->

          <!-- Inicia control asistencia -->
          <li class="nav-item">
            <a href="#" class="nav-link active">
                <i class="fa-solid fa-user-check"></i>
              <p>
                Mis Gestiones
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('asistencia.form') }}" class="nav-link">
                    <i class="fa-solid fa-user-plus"></i>
                    <p>Registrar Asistencia</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/empleadoausencia" class="nav-link">
                    <i class="fa-solid fa-user-xmark"></i>
                  <p>Solicitar Ausencia</p>
                </a>
              <li class="nav-item">
                <a href="/retraso" class="nav-link">
                    <i class="fa-solid fa-person-running"></i>
                  <p>Justificar Retrasos</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- Fin control de asistencia -->

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/home">Inicio</a></li>
              <li class="breadcrumb-item active">Página de Inicio</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
          @yield('content')  <!-- Aquí se insertará el contenido de otras vistas -->
      </div>
    </div>

  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Let nothing stop you
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2024 <a href="">Desarrollo Web-USAP</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>

<!-- DataTables  & Plugins -->
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>





</body>
<script>

  toastr.options = {
              "closeButton": true,
              "debug": false,
              "newestOnTop": false,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "preventDuplicates": false,
              "onclick": null,
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "2500",
              "extendedTimeOut": "0",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
          };

      @if (session('success'))
              toastr.success("{{ session('success') }}", "Success");
      @endif
  </script>

</html>

