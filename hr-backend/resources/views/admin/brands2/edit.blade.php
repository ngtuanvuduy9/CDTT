@extends('layout.admin')

@section('title', 'Sửa Thương Hiệu')

@section('content')
    <h3 class="mb-3">Cập nhật Thương hiệu</h3>

    {{-- Thông báo từ session --}}
    @if (session('message'))
        <div class="alert alert-info">{{ session('message') }}</div>
    @endif

    {{-- Hiển thị tất cả lỗi --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('brands2.update', $brand->id) }}" method="POST" class="w-50 p-4 shadow rounded">
        @csrf

        <div class="mb-3">
            <label for="f-brandname" class="form-label">Tên Thương Hiệu</label>
            <input type="text" name="brandname" id="f-brandname"
                class="form-control @error('brandname') is-invalid @enderror"
                value="{{ old('brandname', $brand->brandname) }}">
            @error('brandname')
                <div class="text-danger ps-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="f-description" class="form-label">Mô tả</label>
            <textarea name="description" id="f-description" class="form-control @error('description') is-invalid @enderror"
                rows="3">{{ old('description', $brand->description) }}</textarea>
            @error('description')
                <div class="text-danger ps-2">{{ $message }}</div>
            @enderror
        </div>

        <a href="{{ route('brands2.index') }}" class="btn btn-secondary me-2">&larr; Quay lại</a>
        <input type="submit" value="Lưu" class="btn btn-primary">
    </form>
@endsection