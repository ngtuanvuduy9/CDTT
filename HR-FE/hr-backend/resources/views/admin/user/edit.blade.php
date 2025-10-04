@extends('layout.admin')

@section('title', 'Sửa User')

@section('content')
    <h3 class="mb-3">Cập nhật Thông tin Người dùng</h3>

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

    <form action="{{ route('user.update', $user->id) }}" method="post">
        @csrf
        {{-- KHÔNG cần @method('PUT') nếu bạn dùng POST route --}}


        <div class="form-group mb-3">
            <label for="fullname">Họ và Tên</label>
            <input type="text" name="fullname" id="fullname" class="form-control"
                value="{{ old('fullname', $user->fullname) }}">
            @error('fullname')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">Tên đăng nhập</label>
            <input type="text" name="username" id="username" class="form-control"
                value="{{ old('username', $user->username) }}" required>
            @error('username')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="f-email">Email</label>
            <input type="email" name="email" id="f-email" class="form-control" value="{{ old('email', $user->email) }}">
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
            <label for="f-role">Vai trò</label>
            <select name="role" id="f-role" class="form-control">
                <option value="">-- Chọn Vai trò --</option>
                <option value="1" {{ old('role', $user->role) == '1' ? 'selected' : '' }}>Quản trị viên</option>
                <option value="0" {{ old('role', $user->role) == '0' ? 'selected' : '' }}>Người dùng</option>
            </select>
            @error('role')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <a href="{{ route('user.index') }}" class="btn btn-secondary">&larr; Quay lại</a>
        <input type="submit" value="Lưu Thay đổi" class="btn btn-primary">
    </form>
@endsection