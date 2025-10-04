@extends('layout.admin')

@section('content')
    <div class="container">
        <h2>Sửa Dự án</h2>

        <form action="{{ route('projects.update', $project->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Tên dự án</label>
                <input type="text" name="name" class="form-control" required value="{{ old('name', $project->name) }}">
            </div>

            <div class="mb-3">
                <label>Mô tả</label>
                <textarea name="description" class="form-control">{{ old('description', $project->description) }}</textarea>
            </div>

            <div class="row">
                <div class="col">
                    <label>Ngày bắt đầu</label>
                    <input type="date" name="start_date" class="form-control"
                        value="{{ old('start_date', $project->start_date) }}" required>
                </div>
                <div class="col">
                    <label>Ngày kết thúc</label>
                    <input type="date" name="end_date" class="form-control"
                        value="{{ old('end_date', $project->end_date) }}">
                </div>
            </div>

            <div class="mb-3 mt-3">
                <label>Trạng thái</label>
                <select name="status" class="form-select">
                    @foreach(['pending' => 'Chờ duyệt', 'in_progress' => 'Đang thực hiện', 'completed' => 'Hoàn thành', 'cancelled' => 'Hủy'] as $key => $label)
                        <option value="{{ $key }}" {{ $key == $project->status ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Ngân sách</label>
                <input type="number" name="budget" class="form-control" value="{{ old('budget', $project->budget) }}">
            </div>

            <div class="mb-3">
                <label>Chọn nhân viên</label>
                <select name="employee_ids[]" class="form-select" multiple>
                    @foreach($employees as $e)
                        <option value="{{ $e->id }}" @if(collect($project->employees ?? [])->pluck('id')->contains($e->id))
                        selected @endif>
                            {{ $e->fullname }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button class="btn btn-success">Cập nhật</button>
            <a href="{{ route('projects.index') }}" class="btn btn-secondary">Hủy</a>
        </form>
    </div>
@endsection