@extends('layouts.admin')

@section('title', 'Quản lý Nhân viên')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2><i class="fas fa-users"></i> Quản lý Nhân viên</h2>
        <a href="{{ route('admin.employees.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Thêm nhân viên
        </a>
    </div>

    <div class="card shadow">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="table-primary">
                        <tr>
                            <th>ID</th>
                            <th>Tên</th>
                            <th>Email</th>
                            <th>Phòng ban</th>
                            <th>Chức vụ</th>
                            <th>Trạng thái</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($employees as $employee)
                            <tr>
                                <td>{{ $employee->id }}</td>
                                <td>
                                    <strong>{{ $employee->name }}</strong>
                                    <br>
                                    <small class="text-muted">{{ $employee->username }}</small>
                                </td>
                                <td>{{ $employee->email }}</td>
                                <td>
                                    @if ($employee->department)
                                        <span class="badge bg-info">{{ $employee->department->name }}</span>
                                    @else
                                        <span class="text-muted">Chưa phân công</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($employee->position)
                                        <span class="badge bg-success">{{ $employee->position->name }}</span>
                                    @else
                                        <span class="text-muted">Chưa có chức vụ</span>
                                    @endif
                                </td>
                                <td>
                                    @switch($employee->status)
                                        @case('active')
                                            <span class="badge bg-success">Hoạt động</span>
                                        @break

                                        @case('inactive')
                                            <span class="badge bg-warning">Tạm nghỉ</span>
                                        @break

                                        @case('terminated')
                                            <span class="badge bg-danger">Đã nghỉ việc</span>
                                        @break
                                    @endswitch
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.employees.show', $employee) }}"
                                            class="btn btn-info btn-sm">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.employees.edit', $employee) }}"
                                            class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.employees.destroy', $employee) }}" method="POST"
                                            class="d-inline"
                                            onsubmit="return confirm('Bạn có chắc chắn muốn xóa nhân viên này?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">Không có nhân viên nào</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endsection
