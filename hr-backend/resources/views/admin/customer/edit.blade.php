@extends('layout.admin')

@section('title', 'Sửa Khách hàng')

@section('content')
    <h3 class="mb-3">Cập nhật Thông tin Khách hàng</h3>

    @if (session('message'))
        <div class="alert alert-danger">{{ session('message') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('customer.update', $customer->id) }}" method="POST">
        @csrf
        @method('POST') {{-- Nếu dùng route POST cho update --}}

        <div class="form-group mb-3">
            <label for="f-name">Họ và Tên</label>
            <input type="text" name="fullname" id="f-name" class="form-control"
                value="{{ old('fullname', $customer->fullname) }}">
            @error('fullname')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="f-email">Email</label>
            <input type="email" name="email" id="f-email" class="form-control" value="{{ old('email', $customer->email) }}">
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="f-password">Mật khẩu mới (nếu muốn thay)</label>
            <input type="password" name="password" id="f-password" class="form-control">
            @error('password')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="f-phone">Số điện thoại</label>
            <input type="text" name="phone" id="f-phone" class="form-control" value="{{ old('phone', $customer->phone) }}">
            @error('phone')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="f-address">Địa chỉ</label>
            <textarea name="address" id="f-address" class="form-control">{{ old('address', $customer->address) }}</textarea>
            @error('address')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <a href="{{ route('customer.index') }}" class="btn btn-secondary">&larr; Quay lại</a>
        <input type="submit" value="Lưu Thay đổi" class="btn btn-primary">
    </form>
@endsection