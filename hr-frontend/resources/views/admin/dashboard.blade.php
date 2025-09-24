@extends('layout.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="container py-4">
        <h1 class="mb-4">Trang quản trị nhân sự</h1>

        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card text-white bg-primary">
                    <div class="card-body">
                        <h5 class="card-title">Tổng số nhân viên</h5>
                        <p class="card-text fs-2">{{ $totalEmployees }}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-white bg-success">
                    <div class="card-body">
                        <h5 class="card-title">Tổng số phòng ban</h5>
                        <p class="card-text fs-2">{{ $totalDepartments }}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-white bg-info">
                    <div class="card-body">
                        <h5 class="card-title">Tổng số vị trí</h5>
                        <p class="card-text fs-2">{{ $totalPositions }}</p>
                    </div>
                </div>
            </div>
        </div>

        <h3 class="mt-5">🆕 5 nhân viên mới nhất</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Mã NV</th>
                    <th>Họ tên</th>
                    <th>Phòng ban</th>
                    <th>Vị trí</th>
                    <th>Ngày vào làm</th>
                </tr>
            </thead>
            <tbody>
                @forelse($latestEmployees as $emp)
                    <tr>
                        <td>{{ $emp['id'] ?? '-' }}</td>
                        <td>{{ $emp['fullname'] ?? '-' }}</td>
                        <td>{{ $emp['department']['name'] ?? '-' }}</td>
                        <td>{{ $emp['position']['title'] ?? '-' }}</td>
                        <td>{{ isset($emp['created_at']) ? \Carbon\Carbon::parse($emp['created_at'])->format('d/m/Y') : '-' }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Không có nhân viên</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection