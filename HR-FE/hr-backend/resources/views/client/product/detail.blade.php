@extends('layout.client')

@section('title', $product->proname)

@section('content')
    <div class="container my-5">
        <div class="row">
            <!-- Hình ảnh -->
            <div class="col-md-5">
                <img src="{{ asset('storage/products/' . $product->fileName) }}" class="img-fluid"
                    alt="{{ $product->proname }}">
            </div>

            <!-- Thông tin -->
            <div class="col-md-7">
                <h2>{{ $product->proname }}</h2>
                <p class="text-danger fs-4 fw-bold">{{ number_format($product->price) }} ₫</p>
                <p><strong>Loại:</strong> {{ $product->category->catename ?? 'Không có' }}</p>
                <p><strong>Thương hiệu:</strong> {{ $product->brand->brandname ?? 'Không có' }}</p>
                <p><strong>Mô tả:</strong> {{ $product->description }}</p>

                <form action="{{ route('cartadd', ['id' => $product->id]) }}" method="POST"
                    class="d-flex align-items-center mt-3">
                    @csrf
                    <input type="number" name="quantity" value="1" min="1" class="form-control w-25 me-3">
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-cart-plus"></i> Thêm vào giỏ hàng
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection