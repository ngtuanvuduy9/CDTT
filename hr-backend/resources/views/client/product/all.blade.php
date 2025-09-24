@extends('layout.client')

@section('title', 'Tất cả sản phẩm')

@section('content')
    <div class="container my-5">
        <div class="row g-4">
            @forelse ($products as $item)
                <div class="col-md-3">
                    <div class="card h-100">
                        <img src="{{ asset('storage/products/' . $item->fileName) }}" class="card-img-top"
                            alt="{{ $item->proname }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->proname }}</h5>
                            <p class="text-danger fw-bold">{{ number_format($item->price) }} đ</p>

                            <div class="d-flex gap-2">
                                <a href="#" class="btn btn-primary">Mua ngay</a>

                                <form action="{{ route('cartadd', ['id' => $item->id]) }}" method="POST">
                                    @csrf
                                    <input type="submit" value="Thêm giỏ hàng" class="btn btn-success">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <p>Không có sản phẩm nào.</p>
            @endforelse
        </div>
        {{-- PHÂN TRANG --}}
        <div class="d-flex justify-content-center mt-4">
            {{ $products->links('pagination::bootstrap-4') }}
        </div>

    </div>
@endsection