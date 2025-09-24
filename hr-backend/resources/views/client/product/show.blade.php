@extends('layout.client')

@section('title', 'Trang chủ')

@section('content')

    <!-- Danh sách sản phẩm -->
    <div class="container my-5">
        <div class="row g-4">

            @foreach ($products as $item)
                <!-- Sản phẩm 1 -->
                <div class="col-md-3">
                    <div class="card h-100">
                        <img src="{{ asset('storage/products/' . $item->fileName) }}" class="card-img-top" alt="SP1">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->proname }}</h5>
                            <p class="text-danger fw-bold">{{ number_format($item->price) }}</p>

                            <div class="d-flex">
                                <a href="#" class="btn btn-primary">Mua ngay</a>
                                {{-- đổi qua icon --}}
                                {{-- sử dụng form --}}
                                <form action="{{ route('cartadd', ['id' => $item->id]) }}" method="post">
                                    @csrf
                                    <input type="submit" value="Thêm giỏ hàng" class="btn btn-success">
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

@endsection