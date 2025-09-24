@extends('layout.admin')

@section('title', 'my-dashboard')

@section('content')
    <div class="container mt-4">
        <h4 class="mb-3">Danh sách người dùng</h4>
        @if (session('message'))
            <div class="alert alert-danger">{{ session('message') }}</div>
        @endif
        <a href="{{ route('user.create') }}" class="btn btn-primary mb-3">
            + Thêm
        </a>

        <table class="table table-bordered text-center">
            <thead class="table-light">
                <tr>
                    <th>STT</th>
                    <th>Họ và tên</th>
                    <th>Tên đăng nhập</th>
                    <th>Email</th>
                    <th>Mật khẩu</th>
                    <th>Vai trò</th>

                    <th width="150px">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $index => $user)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $user->fullname }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td>********</td>
                        <td>{{ $user->role }}</td>

                        <td>
                            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning btn-sm">Sửa</a>

                            <form action="{{ route('user.destroy', $user->id) }}" method="post" style="display:inline;">
                                @csrf
                                <input type="submit" value="Xóa" class="btn btn-danger btn-sm">
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">Không có người dùng nào.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="d-flex align-items-center my-3">
        <label class="me-2">Số bản ghi:</label>
        <select onchange="window.location.href=this.value" class="form-select w-auto">
            <option value="{{ route('user.index', 5) }}" {{ $perpage == 5 ? 'selected' : '' }}>5</option>
            <option value="{{ route('user.index', 10) }}" {{ $perpage == 10 ? 'selected' : '' }}>10</option>
            <option value="{{ route('user.index', 15) }}" {{ $perpage == 15 ? 'selected' : '' }}>15</option>
            <option value="{{ route('user.index', 100) }}" {{ $perpage == 100 ? 'selected' : '' }}>100</option>
        </select>
    </div>
    <div>
        {{ $users->links('pagination::bootstrap-4') }}
</div @endsection