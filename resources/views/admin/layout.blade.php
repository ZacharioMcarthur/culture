<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Culture Admin') }}</title>

    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="{{ asset('adminlte/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- DataTables CSS -->
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
                    <a href="{{ route('admin.index') }}" class="nav-link">Dashboard</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-user"></i> {{ Auth::user()->nom }} {{ Auth::user()->prenom }}
                        <i class="fas fa-caret-down"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-user"></i> Mon profil
                        </a>
                        <div class="dropdown-divider"></div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item">
                                <i class="fas fa-sign-out-alt"></i> Déconnexion
                            </button>
                        </form>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ route('admin.index') }}" class="brand-link">
                <img src="{{ asset('adminlte/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Culture Admin</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ Auth::user()->photo ?? asset('images/user.png') }}" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ Auth::user()->nom }} {{ Auth::user()->prenom }}</a>
                        <small class="text-muted">{{ Auth::user()->role->nom_role ?? 'Utilisateur' }}</small>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="{{ route('admin.index') }}" class="nav-link {{ request()->routeIs('admin.index') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>

                        <!-- Gestion des utilisateurs -->
                        <li class="nav-item {{ request()->routeIs('admin.utilisateurs*') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link {{ request()->routeIs('admin.utilisateurs*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Utilisateurs
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.utilisateurs.index') }}" class="nav-link {{ request()->routeIs('admin.utilisateurs.index') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Tous les utilisateurs</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.utilisateurs.create') }}" class="nav-link {{ request()->routeIs('admin.utilisateurs.create') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Ajouter un utilisateur</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- Gestion des rôles -->
                        <li class="nav-item {{ request()->routeIs('admin.roles*') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link {{ request()->routeIs('admin.roles*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-user-shield"></i>
                                <p>
                                    Rôles
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.roles.index') }}" class="nav-link {{ request()->routeIs('admin.roles.index') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Tous les rôles</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.roles.create') }}" class="nav-link {{ request()->routeIs('admin.roles.create') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Ajouter un rôle</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- Gestion des langues -->
                        <li class="nav-item {{ request()->routeIs('admin.langues*') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link {{ request()->routeIs('admin.langues*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-language"></i>
                                <p>
                                    Langues
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.langues.index') }}" class="nav-link {{ request()->routeIs('admin.langues.index') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Toutes les langues</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.langues.create') }}" class="nav-link {{ request()->routeIs('admin.langues.create') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Ajouter une langue</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- Gestion des catégories -->
                        <li class="nav-item {{ request()->routeIs('admin.categories*') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link {{ request()->routeIs('admin.categories*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-tags"></i>
                                <p>
                                    Catégories
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.categories.index') }}" class="nav-link {{ request()->routeIs('admin.categories.index') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Toutes les catégories</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.categories.create') }}" class="nav-link {{ request()->routeIs('admin.categories.create') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Ajouter une catégorie</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- Gestion des contenus -->
                        <li class="nav-item {{ request()->routeIs('admin.contenus*') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link {{ request()->routeIs('admin.contenus*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-file-alt"></i>
                                <p>
                                    Contenus
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.contenus.index') }}" class="nav-link {{ request()->routeIs('admin.contenus.index') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Tous les contenus</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.contenus.create') }}" class="nav-link {{ request()->routeIs('admin.contenus.create') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Ajouter un contenu</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- Gestion des médias -->
                        <li class="nav-item {{ request()->routeIs('admin.medias*') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link {{ request()->routeIs('admin.medias*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-images"></i>
                                <p>
                                    Médias
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.medias.index') }}" class="nav-link {{ request()->routeIs('admin.medias.index') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Tous les médias</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.medias.create') }}" class="nav-link {{ request()->routeIs('admin.medias.create') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Ajouter un média</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- Gestion des commentaires -->
                        <li class="nav-item {{ request()->routeIs('admin.commentaires*') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link {{ request()->routeIs('admin.commentaires*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-comments"></i>
                                <p>
                                    Commentaires
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.commentaires.index') }}" class="nav-link {{ request()->routeIs('admin.commentaires.index') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Tous les commentaires</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- Gestion des notes -->
                        <li class="nav-item {{ request()->routeIs('admin.notes*') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link {{ request()->routeIs('admin.notes*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-star"></i>
                                <p>
                                    Notes
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.notes.index') }}" class="nav-link {{ request()->routeIs('admin.notes.index') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Toutes les notes</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- Gestion des paiements -->
                        <li class="nav-item {{ request()->routeIs('admin.paiements*') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link {{ request()->routeIs('admin.paiements*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-credit-card"></i>
                                <p>
                                    Paiements
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.paiements.index') }}" class="nav-link {{ request()->routeIs('admin.paiements.index') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Tous les paiements</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- Gestion des paramètres -->
                        <li class="nav-item {{ request()->routeIs('admin.settings*') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link {{ request()->routeIs('admin.settings*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-cogs"></i>
                                <p>
                                    Paramètres
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.settings.index') }}" class="nav-link {{ request()->routeIs('admin.settings.index') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Tous les paramètres</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.settings.create') }}" class="nav-link {{ request()->routeIs('admin.settings.create') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Ajouter un paramètre</p>
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
                                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
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
            <strong>Copyright &copy; 2025 <a href="#">Culture</a>.</strong>
            Tous droits réservés.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.0.0
            </div>
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- AdminLTE JS -->
    <script src="{{ asset('adminlte/js/adminlte.min.js') }}"></script>

    <!-- DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/responsive.bootstrap4.min.js"></script>

    @stack('scripts')
</body>
</html>

