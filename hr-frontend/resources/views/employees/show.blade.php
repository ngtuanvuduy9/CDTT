@extends('layout.admin')

@section('title', 'Hồ sơ nhân viên')

@section('content')
    <div class="container py-4">
        <h3 class="mb-3 text-center">Hồ sơ nhân viên</h3>

        <div class="card shadow rounded">
            <div class="card-body">
                <div class="row">
                    {{-- Ảnh đại diện --}}
                    <div class="col-md-4 text-center">
                        @if ($employee->photo)
                            <img src="{{ asset('storage/employees/' . $employee->photo) }}" class="rounded-circle mb-3 shadow"
                                width="180" height="180" style="object-fit: cover;">
                        @else
                            <img src="https://via.placeholder.com/180x180?text=No+Photo" class="rounded-circle mb-3 shadow">
                        @endif
                        <h5 class="fw-bold">{{ $employee->fullname }}</h5>
                        <p class="text-muted">Mã NV: {{ $employee->employee_code }}</p>
                    </div>

                    {{-- Thông tin chi tiết --}}
                    <div class="col-md-8">
                        <table class="table table-borderless">
                            <tr>
                                <th width="30%">CCCD:</th>
                                <td>{{ $employee->cccd ?? '—' }}</td>
                            </tr>
                            <tr>
                                <th>Ngày sinh:</th>
                                <td>{{ $employee->dob ? \Carbon\Carbon::parse($employee->dob)->format('d/m/Y') : '—' }}</td>
                            </tr>
                            <tr>
                                <th>Giới tính:</th>
                                <td>{{ $employee->gender ?? '—' }}</td>
                            </tr>
                            <tr>
                                <th>Trình độ:</th>
                                <td>{{ $employee->education_level ?? '—' }}</td>
                            </tr>
                            <tr>
                                <th>Email:</th>
                                <td>{{ $employee->email ?? '—' }}</td>
                            </tr>
                            <tr>
                                <th>Số điện thoại:</th>
                                <td>{{ $employee->phone ?? '—' }}</td>
                            </tr>
                            <tr>
                                <th>Phòng ban:</th>
                                <td>{{ $employee->department->name ?? '—' }}</td>
                            </tr>
                            <tr>
                                <th>Vị trí:</th>
                                <td>{{ $employee->position->title ?? '—' }}</td>
                            </tr>
                            <tr>
                                <th>Ngày vào làm:</th>
                                <td>{{ $employee->hired_date ? \Carbon\Carbon::parse($employee->hired_date)->format('d/m/Y') : '—' }}
                                </td>
                            </tr>
                            <tr>
                                <th>Lương:</th>
                                <td class="fw-bold text-success">
                                    {{ number_format($employee->salary, 0, ',', '.') }} đ
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="text-center mt-4">
                    <a href="{{ route('employees.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Quay lại
                    </a>
                    <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-warning">
                        <i class="fas fa-edit"></i> Chỉnh sửa
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection