@extends('layout.admin')

@section('title', 'Danh sách nhân viên')

@section('content')
    <div class="container py-4">
        <h3 class="mb-3">Danh sách nhân viên</h3>

        @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        <a href="{{ route('employees.create') }}" class="btn btn-primary mb-3">
            <i class="fas fa-plus"></i> Thêm nhân viên
        </a>


        <div class="table-employees">
            <table class="table table-striped table-hover table-bordered table-employees align-middle">
                <thead class="table-dark text-center">
                    <tr>
                        <th>Mã NV</th>
                        <th>Họ tên</th>
                        <th>CCCD</th>
                        <th>Ngày sinh</th>
                        <th>Giới tính</th>
                        <th>Trình độ</th>
                        <th>Email</th>
                        <th>SĐT</th>
                        <th>Phòng ban</th>
                        <th>Vị trí</th>
                        <th>Ngày vào làm</th>
                        {{-- <th>Lương</th> --}}
                        <th>Ảnh</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($employees as $index => $item)
                        <tr>
                            <td>{{ $item->employee_code }}</td>
                            <td>{{ $item->fullname }}</td>
                            <td>{{ $item->cccd }}</td>
                            <td>{{ $item->dob ? \Carbon\Carbon::parse($item->dob)->format('d/m/Y') : '—' }}</td>
                            <td class="text-center">
                                <span
                                    class="badge bg-{{ $item->gender === 'Nam' ? 'primary' : ($item->gender === 'Nữ' ? 'danger' : 'secondary') }}">
                                    {{ $item->gender }}
                                </span>
                            </td>
                            <td>{{ $item->education_level ?? '—' }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->phone ?? '—' }}</td>
                            <td>{{ $item->department->name ?? '—' }}</td>
                            <td>{{ $item->position->title ?? '—' }}</td>
                            <td>{{ $item->hired_date ? \Carbon\Carbon::parse($item->hired_date)->format('d/m/Y') : '—' }}</td>
                            {{-- <td class="text-end">{{ number_format($item->salary, 0, ',', '.') }} đ</td> --}}
                            <td class="text-center">
                                @if ($item->photo)
                                    <img src="{{ asset('storage/employees/' . $item->photo) }}" class="rounded"
                                        style="width:50px; height:50px; object-fit:cover;">
                                @else
                                    <span class="text-muted">Không có</span>
                                @endif
                            </td>

                            <td class="text-center">
                                {{-- Nút xem hồ sơ --}}
                                <a href="{{ route('employees.show', $item->id) }}" class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i>
                                </a>

                                <a href="{{ route('employees.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('employees.destroy', $item->id) }}" method="post" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Bạn có chắc muốn xóa nhân viên này?')">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="15" class="text-center text-muted">Không có nhân viên nào</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection