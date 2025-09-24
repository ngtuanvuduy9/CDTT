@extends('layout.admin')

@section('title', 'Thêm Sản phẩm')

@section('content')
    <h3 class="mb-3">Thêm Sản phẩm</h3>

    @if (session('message'))
        <div class="alert alert-danger">{{ session('message') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products2.store') }}" method="post" enctype="multipart/form-data" class="...">
        @csrf

        <div class="form-group mb-3">
            <label for="f-proname">Tên Sản phẩm</label>
            <input type="text" name="proname" id="f-proname" class="form-control" value="{{ old('proname') }}">
            @error('proname')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="f-price">Giá</label>
            <input type="number" name="price" id="f-price" class="form-control" value="{{ old('price') }}" min="0">
            @error('price')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="f-description">Mô tả</label>
            <textarea name="description" id="f-description" class="form-control"
                rows="3">{{ old('description') }}</textarea>
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="f-image">Ảnh sản phẩm</label>
            <input type="file" name="image" id="f-image" class="form-control">
            @error('image')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="f-cateid">Danh mục</label>
            <select name="cateid" id="f-cateid" class="form-control">
                <option value="">-- Chọn Danh mục --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->cateid }}" {{ old('cateid') == $category->cateid ? 'selected' : '' }}>
                        {{ $category->catename }}
                    </option>
                @endforeach
            </select>
            @error('cateid')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="f-brandid">Thương hiệu</label>
            <select name="brandid" id="f-brandid" class="form-control">
                <option value="">-- Chọn Thương hiệu --</option>
                @foreach ($brands as $brand)
                    <option value="{{ $brand->id }}" {{ old('brandid') == $brand->id ? 'selected' : '' }}>
                        {{ $brand->brandname }}
                    </option>
                @endforeach
            </select>
            @error('brandid')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <a href="{{ route('products2.index') }}" class="btn btn-secondary">&larr; Quay lại</a>
        <input type="submit" value="Lưu Sản phẩm" class="btn btn-primary">
    </form>
@endsection