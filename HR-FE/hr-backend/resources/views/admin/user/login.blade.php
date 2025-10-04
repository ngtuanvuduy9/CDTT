<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<body>

    <div class="container mt-4 w-50 shadow p-4">
        <h4 class="mb-3">Login</h4>
        {{-- call component --}}
        <x-alert2></x-alert2>
        <form action="{{ route('users.login') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="f-email" class="form-label">Email</label>
                <input type="email" name="email" id="f-email" class="form-control" required>
            </div>


            <div class="mb-3">
                <label for="password" class="form-label">Mật khẩu</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="remember" class="form-label">Ghi nhớ đăng nhập</label>
                <input type="checkbox" name="remember" id="remember">
            </div>

            <button type="submit" class="btn btn-primary">Đăng nhập</button>
            <a href="{{ route('ad.forgotpassform') }}">Quên mật khẩu?</a>
        </form>
    </div>
</body>

</html>