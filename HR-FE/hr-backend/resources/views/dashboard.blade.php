@extends('layout.admin') {{-- hoặc layout phù hợp của bạn --}}

@section('title', 'Dashboard')

@section('content')
    <div class="container py-4">
        <h1 class="mb-4">Trang quản trị - Dashboard</h1>

        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card text-white bg-primary">
                    <div class="card-body">
                        <h5 class="card-title">Tổng số sản phẩm</h5>
                        <p class="card-text fs-2">{{ $totalProducts }}</p>
                    </div>
                </div>
            </div>
        </div>

        <h3 class="mt-5">🆕 5 sản phẩm mới nhất</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Ngày tạo</th>
                </tr>
            </thead>
            <tbody>
                @foreach($latestProducts as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->proname }}</td>
                        <td>{{ number_format($product->price) }} đ</td>
                        <td>{{ $product->created_at->format('d/m/Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h3 class="mt-5">🆕 5 đơn hàng mới nhất</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Mã đơn</th>
                    <th>Khách hàng</th>
                    <th>Ghi chú</th>
                    <th>Ngày đặt</th>
                </tr>
            </thead>
            <tbody>
                @foreach($latestOrders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->customer->fullname ?? 'Không rõ' }}</td>
                        <td>{{ $order->description }}</td>
                        <td>{{ $order->created_at->format('d/m/Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection