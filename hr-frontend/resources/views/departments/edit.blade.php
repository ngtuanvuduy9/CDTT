@extends('layout.admin')


@section('content')
    <div class="container">
        <h2>Sửa phòng ban</h2>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('departments.update', $department->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Tên phòng ban</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $department->name) }}" required>
            </div>

            <button type="submit" class="btn btn-success">Cập nhật</button>
            <a href="{{ route('departments.index') }}" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>
@endsection