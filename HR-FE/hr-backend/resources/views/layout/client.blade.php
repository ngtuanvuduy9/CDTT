<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/m-client.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('homepage') }}">MyShop</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('homepage') ? 'active' : '' }}"
                            href="{{ route('homepage') }}">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('allproducts') ? 'active' : '' }}"
                            href="{{ route('allproducts') }}">
                            Sản phẩm
                        </a>
                    </li>
                    <li class="nav-item position-relative" id="hotline-container">
                        <a class="nav-link" href="#">Liên hệ</a>
                        <div id="hotlineBox" class="position-absolute bg-light border rounded p-2"
                            style="top: 100%; left: 0; display: none; z-index: 1000; min-width: 200px;">
                            <strong>Hotline:</strong>
                            <p class="mb-0">0123 456 789</p>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="categoryDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Danh mục
                        </a>
                        <x-category-menu></x-category-menu>


                    </li>

                </ul>
                <form class="d-flex" action="{{ route('productsearch') }}" method="GET">
                    <input class="form-control me-2" type="search" name="q" placeholder="Tìm kiếm sản phẩm...">
                    <button class="btn btn-outline-light" type="submit">Tìm</button>
                </form>
                <a class="btn btn-warning ms-3" href="{{ route('cartshow') }}">
                    {{-- đọc session 'cart' --}}
                    {{-- count : đếm số phần tử có trong mảng --}}
                    {{ 'Giỏ hàng (' . count(Session::get('cart', [])) . ')' }}
                </a>
                @if(Auth::guard('customer')->check())
                    {{-- Khi đã đăng nhập --}}
                    <div class="dropdown ms-3">
                        <button class="btn btn-outline-light dropdown-toggle" type="button" id="profileDropdown"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle"></i> Tài khoản
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                            <li class="dropdown-item text-muted">
                                {{ Auth::guard('customer')->user()->fullname }}
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form action="{{ route('customer.logout') }}" method="GET" class="d-inline">
                                    <button type="submit" class="dropdown-item text-danger">Đăng xuất</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @else
                    {{-- Khi chưa đăng nhập --}}
                    <button class="btn btn-outline-light ms-2" data-bs-toggle="modal" data-bs-target="#loginModal">Đăng
                        nhập</button>
                    <button class="btn btn-outline-success ms-2" data-bs-toggle="modal" data-bs-target="#registerModal">Đăng
                        ký</button>
                @endif

            </div>
        </div>
    </nav>



    @yield('content')

    <!-- Footer -->
    <footer class="bg-dark text-white py-4">
        <div class="container text-center">
            <p>&copy; 2025 MyShop. Đã đăng ký bản quyền.</p>
            <p>Email: support@myshop.vn | ĐT: 0123 456 789</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const hotlineContainer = document.getElementById('hotline-container');
        const hotlineBox = document.getElementById('hotlineBox');

        hotlineContainer.addEventListener('mouseenter', () => {
            hotlineBox.style.display = 'block';
        });

        hotlineContainer.addEventListener('mouseleave', () => {
            hotlineBox.style.display = 'none';
        });
    </script>
    <!-- Modal Đăng nhập -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="{{ route('customer.login.post') }}">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="loginLabel">Đăng nhập</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label>Email:</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Mật khẩu:</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="mb-3 d-flex justify-content-between align-items-center">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                <label class="form-check-label" for="remember">
                                    Ghi nhớ đăng nhập
                                </label>
                            </div>
                            <a href="#" class="text-decoration-none small">
                                Quên mật khẩu?
                            </a>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Đăng nhập</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Đăng ký -->
    <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="{{ route('customer.register.post') }}">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="registerLabel">Đăng ký</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label>Họ tên:</label>
                            <input type="text" name="fullname" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Email:</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>số điện thoại:</label>
                            <input type="phone" name="phone" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Mật khẩu:</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Nhập lại mật khẩu:</label>
                            <input type="password" name="password_confirmation" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Đăng ký</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</body>

</html>