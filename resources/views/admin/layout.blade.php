<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - Admin</title>

    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="{{ asset('adminlte/css/adminlte.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap4.min.css">

    @stack('styles')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('home') }}" class="nav-link">Site Web</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i> Déconnexion
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ route('admin.dashboard') }}" class="brand-link">
                <img src="{{ asset('adminlte/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Culture Bénin</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('adminlte/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ Auth::user()->prenom }} {{ Auth::user()->nom }}</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>

                        <li class="nav-header">GESTION DES DONNÉES</li>

                        <li class="nav-item">
                            <a href="{{ route('admin.utilisateurs') }}" class="nav-link {{ request()->routeIs('admin.utilisateurs') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-users"></i>
                                <p>Utilisateurs</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.contenus') }}" class="nav-link {{ request()->routeIs('admin.contenus') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-book"></i>
                                <p>Contenus</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.commentaires') }}" class="nav-link {{ request()->routeIs('admin.commentaires') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-comments"></i>
                                <p>Commentaires</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.medias') }}" class="nav-link {{ request()->routeIs('admin.medias') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-photo-video"></i>
                                <p>Médias</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.regions') }}" class="nav-link {{ request()->routeIs('admin.regions') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-map-marked-alt"></i>
                                <p>Régions</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.langues') }}" class="nav-link {{ request()->routeIs('admin.langues') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-language"></i>
                                <p>Langues</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.roles') }}" class="nav-link {{ request()->routeIs('admin.roles') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-user-tag"></i>
                                <p>Rôles</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.type_contenus') }}" class="nav-link {{ request()->routeIs('admin.type_contenus') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-tags"></i>
                                <p>Types de Contenus</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.type_medias') }}" class="nav-link {{ request()->routeIs('admin.type_medias') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-file-alt"></i>
                                <p>Types de Médias</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.parler') }}" class="nav-link {{ request()->routeIs('admin.parler') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-globe"></i>
                                <p>Langues par Région</p>
                            </a>
                        </li>
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
                            <h1 class="m-0">@yield('title', 'Dashboard')</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                                @yield('breadcrumb')
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    @yield('content')
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2025 <a href="#">Culture Béninoise</a>.</strong>
            Tous droits réservés.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.0.0
            </div>
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('adminlte/js/adminlte.min.js') }}"></script>

    <!-- DataTables -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/responsive.bootstrap4.min.js"></script>

    @stack('scripts')
</body>
</html>