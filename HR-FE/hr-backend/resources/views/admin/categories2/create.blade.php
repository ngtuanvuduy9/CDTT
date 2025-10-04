{{-- @extends('layout.admin')
@section('title', 'Thêm loại sản phẩm')
@section('content')
<h3 class="mb-3">Thêm loại sản phẩm</h3>
@if (session('message'))
<div class="alert alert-danger">{{ session('message') }}</div>
@endif
<form action="{{ route('cate2.store') }}" method="post" class="w-50 p-4 shadow">
    @csrf
    <label for="f-catename">Tên loại sản phẩm</label>
    <input type="text" name="catename" id="f-catename" class="form-control m-2" value="{{ old('catename') }}">
    <label for="f-description">Mô tả</label>
    <textarea name="description" id="f-description" class="form-control m-2"
        rows="3">{{ old('description') }}</textarea>

    <a href="{{ route('cate2.index') }}" class="btn btn-primary">&lAarr;</a>
    <input type="submit" value="Lưu" class="btn btn-primary">
</form>
@endsection --}}
@extends('layout.admin')
@section('title', 'Thêm loại sản phẩm')
@section('content')
    <h3 class="mb-3">Thêm loại sản phẩm</h3>

    {{-- Thông báo thành công / thất bại từ session --}}
    @if (session('message'))
        <div class="alert alert-info">{{ session('message') }}</div>
    @endif

    {{-- Hiển thị toàn bộ lỗi --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('cate2.store') }}" method="post" class="w-50 p-4 shadow">
        @csrf

        <label for="f-catename">Tên loại sản phẩm</label>
        <input type="text" name="catename" id="f-catename" class="form-control m-2" value="{{ old('catename') }}">
        {{-- Lỗi riêng cho catename --}}
        @error('catename')
            <div class="text-danger ps-2">{{ $message }}</div>
        @enderror

        <label for="f-description">Mô tả</label>
        <textarea name="description" id="f-description" class="form-control m-2"
            rows="3">{{ old('description') }}</textarea>
        {{-- Lỗi riêng cho description (nếu cần) --}}
        @error('description')
            <div class="text-danger ps-2">{{ $message }}</div>
        @enderror

        <a href="{{ route('cate2.index') }}" class="btn btn-primary">&lAarr;</a>
        <input type="submit" value="Lưu" class="btn btn-primary">
    </form>
@endsection