@extends('layouts.admin')

@section('title', 'Đổi mật khẩu')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0"><i class="fas fa-key"></i> Đổi mật khẩu</h4>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.change-password.post') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="current_password" class="form-label">
                                <i class="fas fa-lock"></i> Mật khẩu hiện tại <span class="text-danger">*</span>
                            </label>
                            <input type="password" class="form-control" id="current_password" name="current_password"
                                required>
                        </div>

                        <div class="mb-3">
                            <label for="new_password" class="form-label">
                                <i class="fas fa-key"></i> Mật khẩu mới <span class="text-danger">*</span>
                            </label>
                            <input type="password" class="form-control" id="new_password" name="new_password" required>
                            <div class="form-text">Mật khẩu phải có ít nhất 8 ký tự</div>
                        </div>

                        <div class="mb-3">
                            <label for="new_password_confirmation" class="form-label">
                                <i class="fas fa-key"></i> Xác nhận mật khẩu mới <span class="text-danger">*</span>
                            </label>
                            <input type="password" class="form-control" id="new_password_confirmation"
                                name="new_password_confirmation" required>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Đổi mật khẩu
                            </button>
                            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">
                                <i class="fas fa-times"></i> Hủy
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
