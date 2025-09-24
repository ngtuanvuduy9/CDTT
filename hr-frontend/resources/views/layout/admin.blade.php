<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>@yield('title', 'Admin Panel')</title>

    <!-- Bootstrap & SB Admin CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/employees.css') }}">
    <!-- Font Awesome -->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    @stack('styles')
</head>

<body class="sb-nav-fixed">
    <!-- Navbar -->
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand ps-3" href="{{ url('/admin') }}">Admin</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#"><i
                class="fas fa-bars"></i></button>
    </nav>

    <div id="layoutSidenav">
        <!-- Sidebar -->
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link" href="{{ route('employees.index') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                            Nhân viên
                        </a>

                        <a class="nav-link" href="{{ route('departments.index') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-building"></i></div>
                            Phòng ban
                        </a>

                        <a class="nav-link" href="{{ route('positions.index') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-briefcase"></i></div>
                            Vị trí
                        </a>
                        <a class="nav-link" href="{{ route('attendances.index') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-briefcase"></i></div>
                            Chấm Công
                        </a>
                        <a class="nav-link" href="{{ route('projects.index') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-briefcase"></i></div>
                            Dự án
                        </a>


                        <!-- Thêm các menu khác tại đây -->
                    </div>
                </div>
            </nav>
        </div>

        <!-- Content -->
        <div id="layoutSidenav_content">
            <main class="container-fluid px-4 py-4">
                @yield('content')
            </main>

            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">© {{ date('Y') }} - Admin Panel</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>

    @stack('scripts')
</body>

</html>