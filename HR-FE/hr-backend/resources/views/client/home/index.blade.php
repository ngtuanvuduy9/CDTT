@extends('layout.client')

@section('title', 'Trang chủ')

@section('content')
    <!-- Banner -->
    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('storage/banners/la.jpg') }}" class="d-block w-100 banner-img" alt="Banner">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('storage/banners/chicago.jpg') }}" class="d-block w-100 banner-img" alt="Banner">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
    {{-- đọc sản phẩm $products--}}
    <!-- Danh sách sản phẩm -->
    <div class="container my-5">
        <h2 class="text-center mb-4">Sản phẩm nổi bật</h2>
        <div class="row g-4">

            @foreach ($products as $item)
                <!-- Sản phẩm 1 -->
                <div class="col-md-3">
                    <div class="card h-100">
                        <img src="{{ asset('storage/products/' . $item->fileName) }}" class="card-img-top" alt="SP1">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->proname }}</h5>
                            <p class="text-danger fw-bold">{{ number_format($item->price) }}</p>

                            <div class="d-flex flex-wrap gap-2">
                                {{-- Nút Mua ngay --}}
                                <a href="{{ route('productdetail', ['id' => $item->id]) }}"
                                    class="btn btn-primary btn-sm flex-fill">
                                    Mua ngay
                                </a>

                                {{-- Nút Thêm giỏ hàng --}}
                                <form action="{{ route('cartadd', ['id' => $item->id]) }}" method="POST" class="flex-fill">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm w-100">
                                        Thêm giỏ hàng
                                    </button>
                                </form>

                                {{-- Nút Chi tiết --}}
                                <a href="{{ route('productdetail', ['id' => $item->id]) }}"
                                    class="btn btn-outline-secondary btn-sm flex-fill">
                                    Chi tiết
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

@endsection