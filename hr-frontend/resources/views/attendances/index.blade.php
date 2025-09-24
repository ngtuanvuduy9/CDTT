@extends('layout.admin')

@section('title', 'Danh sách chấm công')

@section('content')
    <div class="container py-4">
        <h3 class="mb-3">Danh sách chấm công</h3>

        @if(session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        <a href="{{ route('attendances.create') }}" class="btn btn-primary mb-3">
            <i class="fas fa-plus"></i> Thêm chấm công
        </a>

        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-dark text-center">
                    <tr>
                        <th>#</th>
                        <th>Nhân viên</th>
                        <th>Ngày</th>
                        <th>Trạng thái</th>
                        <th>Giờ vào</th>
                        <th>Giờ ra</th>
                        <th>Ghi chú</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($attendances as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->employee->fullname }}</td>
                            <td>{{ $item->date }}</td>
                            <td>{{ $item->status }}</td>
                            <td>{{ $item->check_in ?? '—' }}</td>
                            <td>{{ $item->check_out ?? '—' }}</td>
                            <td>{{ $item->note ?? '—' }}</td>
                            <td class="text-center">
                                <a href="{{ route('attendances.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('attendances.destroy', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Xóa chấm công này?')">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center text-muted">Chưa có dữ liệu chấm công</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection