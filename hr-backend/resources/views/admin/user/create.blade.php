@extends('layout.admin')

@section('title', 'Thêm người dùng')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-4">Thêm người dùng</h2>

        {{-- Hiển thị thông báo lỗi --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card shadow-sm p-4">
            <form action="{{ route('user.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="username" class="form-label">Tên đăng nhập</label>
                    <input type="text" name="username" id="username" class="form-control" value="{{ old('username') }}"
                        required>
                </div>

                <div class="mb-3">
                    <label for="fullname" class="form-label">Họ và tên</label>
                    <input type="text" name="fullname" id="fullname" class="form-control" value="{{ old('fullname') }}"
                        required>
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Họ và tên</label>
                    <input type="text" name="username" id="username" class="form-control" value="{{ old('username') }}"
                        required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Mật khẩu</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="role" class="form-label">Vai trò</label>
                    <select name="role" id="role" class="form-select" required>
                        <option value="">-- Chọn vai trò --</option>
                        <option value="1" {{ old('role') == '1' ? 'selected' : '' }}>Admin</option>
                        <option value="0" {{ old('role') == '0' ? 'selected' : '' }}>User</option>
                    </select>
                </div>

                <div class="d-flex gap-2">
                    <a href="{{ route('user.index') }}" class="btn btn-success">
                        <i class="fas fa-arrow-left"></i> Quay lại
                    </a>
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </div>
            </form>
        </div>
    </div>
@endsection