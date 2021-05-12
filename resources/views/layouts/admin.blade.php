<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin Panel</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- Dropzone JS CDN CSS --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.8.1/min/dropzone.min.css" rel="stylesheet" />
</head>

<body class="hold-transition sidebar-mini layout-footer-fixed layout-navbar-fixed layout-fixed">
    <div id="app">
        <div class="wrapper">

            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="/" class="nav-link">Home</a>
                    </li>
                </ul>
            </nav>
        </div>

        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <img src="/img/logo_3.png" alt="{{config('app.name')}} Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">Gevmist VL Admin</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="/img/avatar.png" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                        {{-- DASHBOARD --}}
                        <li class="nav-item">
                            <a href="{{ route('dashboard') }}" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-bell nav-icon"></i>
                                <p>Notifications</p>
                            </a>
                        </li>

                        {{-- MANAGEMENT --}}
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Management
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('cars.index') }}" class="nav-link">
                                        <i class="fas fa-car nav-icon"></i>
                                        <p>All Cars</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('car-make.index') }}" class="nav-link">
                                        <i class="fas fa-car nav-icon"></i>
                                        <p>Car Make</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('car-model.index') }}" class="nav-link">
                                        <i class="fas fa-car nav-icon"></i>
                                        <p>Car Models</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('features.index') }}" class="nav-link">
                                        <i class="fas fa-car nav-icon"></i>
                                        <p>Car Features</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        {{-- SETTINGS --}}
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link active">
                                <i class="fas fa-cog nav-icon"></i>
                                <p>
                                    Settings
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="fas fa-users nav-icon"></i>
                                        <p>
                                            Roles
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="fas fa-user-plus nav-icon"></i>
                                        <p>
                                            Assign Roles
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="fas fa-user-edit nav-icon"></i>
                                        <p>
                                            My Profile
                                        </p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                                <i class="fas fa-power-off nav-icon"></i>
                                <p>Logout</p>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper mt-5">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">{{ config('app.name') }}</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item active">Admin Dashboard</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            {{-- Success Alert --}}
            @if(session()->has('flash_message'))
            <div class="alert alert-success" role="alert">
                <strong>Success:</strong> {{ session()->get('flash_message')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif

            {{-- Error/Danger Alert --}}
            @if(session()->has('flash_message_error'))
            <div class="alert alert-danger" role="alert">
                <strong>Error:</strong> {{ session()->get('flash_message_error')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    @yield('content')
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                We got your ride!
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; {{date('Y')}} <a href="#">{{ config('app.name') }}</a>.</strong> All rights
            reserved.
        </footer>
    </div>
    <!-- ./wrapper -->
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    {{-- Dropzone JS CDN script --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.8.1/min/dropzone.min.js"></script>
    @yield('scripts')
</body>

</html>