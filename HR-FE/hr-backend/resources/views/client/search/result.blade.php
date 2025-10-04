@extends('layout.client')

@section('title', 'Kết quả tìm kiếm')

@section('content')
    <div class="container my-5">
        <h4 class="mb-4">Kết quả tìm kiếm cho: <strong>"{{ $keyword }}"</strong></h4>

        @if ($products->isEmpty())
            <p class="text-muted">Không tìm thấy sản phẩm phù hợp.</p>
        @else
            <div class="row g-4">
                @foreach ($products as $item)
                    <div class="col-md-3">
                        <div class="card h-100">
                            <img src="{{ asset('storage/products/' . $item->fileName) }}" class="card-img-top"
                                alt="{{ $item->proname }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->proname }}</h5>
                                <p class="text-danger fw-bold">{{ number_format($item->price) }} ₫</p>

                                <div class="d-flex justify-content-between">
                                    <a href="#" class="btn btn-primary btn-sm">Mua ngay</a>
                                    <form action="{{ route('cartadd', ['id' => $item->id]) }}" method="POST">
                                        @csrf
                                        <input type="submit" value="Thêm giỏ hàng" class="btn btn-success btn-sm">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection