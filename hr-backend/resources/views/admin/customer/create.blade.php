@extends('layout.admin')

@section('title', 'Thêm khách hàng')

@section('content')
    <div class="container mt-4">
        <h4>Thêm khách hàng</h4>
        @if (session('message'))
            <div class="alert alert-info">{{ session('message') }}</div>
        @endif

        <form action="{{ route('customer.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Họ tên</label>
                <input type="text" name="fullname" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Mật khẩu</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Số điện thoại</label>
                <input type="text" name="phone" class="form-control">
            </div>
            <div class="mb-3">
                <label>Địa chỉ</label>
                <textarea name="address" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Thêm</button>
            <a href="{{ route('customer.index') }}" class="btn btn-secondary">Hủy</a>
        </form>
    </div>
@endsection