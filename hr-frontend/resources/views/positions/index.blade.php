@extends('layout.admin')


@section('content')
    <div class="container">
        <h2>Danh sách vị trí</h2>
        <a href="{{ route('positions.create') }}" class="btn btn-primary mb-3">➕ Thêm vị trí</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tên vị trí</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @forelse($positions as $position)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $position->title }}</td>
                        <td>
                            <a href="{{ route('positions.edit', $position->id) }}" class="btn btn-sm btn-warning">Sửa</a>
                            <form action="{{ route('positions.destroy', $position->id) }}" method="POST"
                                style="display:inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Xóa vị trí này?')">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">Chưa có vị trí</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection