@extends('layout.admin')

@section('content')
    <div class="container">
        <h2>Danh sách phòng ban</h2>
        <a href="{{ route('departments.create') }}" class="btn btn-primary mb-3">➕ Thêm phòng ban</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tên phòng ban</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @forelse($departments as $department)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $department->name }}</td>
                        <td>
                            <a href="{{ route('departments.edit', $department->id) }}" class="btn btn-sm btn-warning">Sửa</a>
                            <form action="{{ route('departments.destroy', $department->id) }}" method="POST"
                                style="display:inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Xóa phòng ban này?')">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">Chưa có phòng ban</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection