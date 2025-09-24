@extends('layout.client')
@section('title', 'Giỏ hàng')
@section('content')

    <section class="py-5">
        <div class="container px-4 px-lg-5">
            <h3>Thông tin giỏ hàng</h3>
            <table class="table table-bordered table-striped">
                <thead>
                    <th>STT</th>
                    <th>Sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Giá </th>
                    <th>Thành tiền</th>
                    <th></th>
                </thead>
                <tbody>
                    {{-- đọc session 'cart' --}}
                    @php
                        $cart = Session::get('cart', []);
                        $i = 1;
                        $total = 0;
                    @endphp

                    @foreach ($cart as $item)
                        @php
                            $total += $item['quantity'] * $item['price']
                        @endphp
                        {{-- $item : array??? --}}
                        {{-- $item : object??? --}}

                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $item['proname'] }}</td>
                            <td>{{ $item['quantity'] }}</td>
                            <td>{{ number_format($item['price']) }}</td>
                            <td>{{ number_format($item['quantity'] * $item['price'])}}</td>
                            <td>
                                <a href="{{ route('cartdel', ['id'=>$item['productid']]) }}">Xóa</a>
                            </td>
                        </tr>
                    @endforeach

                    <tr>
                        <td colspan="4">Tổng tiền</td>
                        <td>{{ number_format($total) }}</td>
                        <td><a href="{{ route('checkout') }}" class="btn btn-warning">Đặt hàng</a></td>
                    </tr>

                </tbody>
            </table>
        </div>
    </section>
@endsection