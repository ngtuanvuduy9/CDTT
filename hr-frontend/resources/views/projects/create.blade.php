@extends('layout.admin')

@section('content')
    <div class="container">
        <h2>Thêm Dự án</h2>

        {{-- Hiển thị lỗi validate --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('projects.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label>Tên dự án</label>
                <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
            </div>

            <div class="mb-3">
                <label>Mô tả</label>
                <textarea name="description" class="form-control">{{ old('description') }}</textarea>
            </div>

            <div class="row">
                <div class="col">
                    <label>Ngày bắt đầu</label>
                    <input type="date" name="start_date" class="form-control" required value="{{ old('start_date') }}">
                </div>
                <div class="col">
                    <label>Ngày kết thúc</label>
                    <input type="date" name="end_date" class="form-control" value="{{ old('end_date') }}">
                </div>
            </div>

            <div class="mb-3 mt-3">
                <label>Trạng thái</label>
                <select name="status" class="form-select">
                    <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Chờ duyệt</option>
                    <option value="in_progress" {{ old('status') == 'in_progress' ? 'selected' : '' }}>Đang thực hiện</option>
                    <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Hoàn thành</option>
                    <option value="cancelled" {{ old('status') == 'cancelled' ? 'selected' : '' }}>Hủy</option>
                </select>
            </div>

            <div class="mb-3">
                <label>Ngân sách</label>
                <input type="number" name="budget" class="form-control" value="{{ old('budget') }}">
            </div>

            <div class="mb-3">
                <label>Chọn nhân viên</label>
                <select name="employee_ids[]" class="form-select" multiple>
                    @foreach($employees as $e)
                        <option value="{{ $e->id }}" {{ collect(old('employee_ids', []))->contains($e->id) ? 'selected' : '' }}>
                            {{ $e->fullname }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button class="btn btn-success">Tạo mới</button>
            <a href="{{ route('projects.index') }}" class="btn btn-secondary">Hủy</a>
        </form>
    </div>
@endsection