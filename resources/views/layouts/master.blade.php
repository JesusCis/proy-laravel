<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Incmsz</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" type="text/css" href="/css/app.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper" id="app">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <p></p>
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block"></li>
     </ul>

 <!-- SEARCH FORM -->
    <form class="form-inline ml-5">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Buscar" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="nav-icon fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>
    </nav>
  <!-- /.navbar -->

  <aside class="main-sidebar sidebar-dark-primary elevation-5">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="./img/hospital.png" class="brand-image img-circle elevation-4" alt="Logo">
           <h4 class="brand-text font-weight-light">Innsz</h4>
           <p></p>
    </a>

<!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="./img/logo.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">
          {{ Auth::user()->name }}
          </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

               <li class="nav-item">
            <router-link to="/inicio" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Inicio

              </p>
            </router-link>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-cog"></i>
              <p>
                Inico
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link to="/usuarios" class="nav-link">
                  <i class="fa fa-users nav-icon"></i>
                  <p>Usuarios</p>
                </router-link>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fa fa-stroopwafel nav-icon "></i>
                  <p>Peticiones</p>
                </a>
              </li>
              <li class="nav-item">
                <router-link to="/reportes" class="nav-link">
                  <i class="fa fa-align-justify nav-icon"></i>
                  <p>Reportes</p>
                </router-link>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <router-link to="/desarrollo" class="nav-link">
              <i class="nav-icon fas fa-cogs "></i>
              <p>
                desarrollo
             </p>
            </router-link>
          </li>
          
          <li class="nav-item">
            <router-link to="/perfiles" class="nav-link">
              <i class="nav-icon fas fa-user "></i>
              <p>
                Perfil
             </p>
            </router-link>
          </li>


          <li class="nav-item">

                   <a class="nav-link" href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                             <i class="nav-icon fas fa-sign-out-alt"></i>
                             Salir
                                </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                                </form>
          </li>
        </ul>
      </nav>
    </div>
  </aside>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- /.content-header -->
  <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <router-view></router-view>
        <vue-progress-bar></vue-progress-bar>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      prueba
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2018 <a href="#">Jesus</a>.</strong> Derechos Reservados.
  </footer>
</div>
<script src="/js/app.js"></script>
</body>
</html>
