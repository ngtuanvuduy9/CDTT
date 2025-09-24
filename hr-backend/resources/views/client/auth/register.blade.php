@extends('layout.client')

@section('title', 'Đăng ký khách hàng')

@section('content')
    <div class="container mt-5">
        <h2>Đăng ký</h2>
        <form method="POST" action="{{ route('customer.register.post') }}">
            @csrf
            <input name="username" class="form-control mb-2" placeholder="Tên đăng nhập">
            <input name="fullname" class="form-control mb-2" placeholder="Họ và tên">
            <input name="email" class="form-control mb-2" placeholder="Email">
            <input name="password" type="password" class="form-control mb-2" placeholder="Mật khẩu">
            <input name="password_confirmation" type="password" class="form-control mb-2" placeholder="Nhập lại mật khẩu">
            <button class="btn btn-primary">Đăng ký</button>
        </form>
    </div>
@endsection