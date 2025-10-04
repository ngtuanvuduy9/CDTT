@extends('layout.client')
@section('title', 'Giỏ hàng')
@section('content')

    <section class="py-5">
        <div class="container px-4 px-lg-5">
            {{-- call component --}}
            <x-alert></x-alert>
            {{-- show form điền thông tin đặt hàng --}}
            <form action="{{ route('cartsave') }}" method="POST" class="shadow-lg w-50 p-3">
                @csrf
                <div class="mb-3 mt-3">
                    <label for="fullname" class="form-label">Họ tên</label>
                    <input type="text" class="form-control" id="fullname" name="fullname" value="{{ old('fullname') }}">
                </div>
                <div class="mb-3 mt-3">
                    <label for="phone" class="form-label">Số điện thoại</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
                </div>
                <div class="mb-3 mt-3">
                    <label for="address" class="form-label">Địa chỉ</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}">
                </div>
                <div class="mb-3 mt-3">
                    <label for="f-description" class="form-label">Ghi chú cho đơn hàng</label>
                    <input type="text" class="form-control" id="f-description" name="description"
                        value="{{ old('description') }}">
                </div>
                <button type="submit" class="btn btn-primary">Đặt hàng</button>
            </form>



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
                                <a href="{{ route('cartdel', ['id' => $item['productid']]) }}">Xóa</a>
                            </td>
                        </tr>
                    @endforeach

                    <tr>
                        <td colspan="4">Tổng tiền</td>
                        <td>{{ number_format($total) }}</td>

                    </tr>

                </tbody>
            </table>
        </div>
    </section>
@endsection