@extends('layout.admin')

@section('content')
<div class="container">
    <h1 class="mb-3">Quản lý dự án</h1>

    <a href="{{ route('projects.create') }}" class="btn btn-primary mb-3">+ Thêm Dự án</a>

    <!-- Bộ lọc và tìm kiếm -->
    <form method="GET" action="{{ route('projects.index') }}" class="row g-3 mb-4">
        <div class="col-md-3">
            <select name="status" class="form-select" onchange="this.form.submit()">
                <option value="">-- Lọc theo trạng thái --</option>
                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Chờ duyệt</option>
                <option value="in_progress" {{ request('status') == 'in_progress' ? 'selected' : '' }}>Đang thực hiện</option>
                <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Hoàn thành</option>
                <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Hủy</option>
            </select>
        </div>

        <div class="col-md-4">
            <!-- đổi keyword -> search để trùng với controller -->
            <input type="text" name="search" value="{{ request('search') }}" class="form-control"
                placeholder="Tìm theo tên dự án...">
        </div>

        <div class="col-md-2">
            <button type="submit" class="btn btn-primary w-100">Lọc / Tìm kiếm</button>
        </div>

        <div class="col-md-2">
            <a href="{{ route('projects.index') }}" class="btn btn-secondary w-100">Xóa lọc</a>
        </div>
    </form>

    <!-- Bảng danh sách dự án -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Tên dự án</th>
                <th>Trạng thái</th>
                <th>Ngày bắt đầu</th>
                <th>Ngày kết thúc</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @forelse($projects as $index => $project)
            <tr>
                <!-- Dùng $loop->iteration để hiển thị số thứ tự -->
                <td>{{ $loop->iteration }}</td>
                <td>{{ $project->name }}</td>
                <td>
                    @switch($project->status)
                        @case('pending') <span class="badge bg-warning">Chờ duyệt</span> @break
                        @case('in_progress') <span class="badge bg-primary">Đang thực hiện</span> @break
                        @case('completed') <span class="badge bg-success">Hoàn thành</span> @break
                        @case('cancelled') <span class="badge bg-danger">Hủy</span> @break
                        @default <span class="badge bg-secondary">Không xác định</span>
                    @endswitch
                </td>
                <td>{{ $project->start_date }}</td>
                <td>{{ $project->end_date ?? '-' }}</td>
                <td>
                    <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                    <form action="{{ route('projects.destroy', $project->id) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button onclick="return confirm('Xóa dự án này?')" class="btn btn-danger btn-sm">Xóa</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">Không có dự án nào.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
