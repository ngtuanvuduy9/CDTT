@extends('layout.admin')

@section('title', 'Danh sách khách hàng')

@section('content')
    <div class="container mt-4">
        <h4>Danh sách khách hàng</h4>
        <a href="{{ route('customer.create') }}" class="btn btn-primary mb-2">+ Thêm</a>
        @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Họ tên</th>
                    <th>Email</th>
                    <th>SĐT</th>
                    <th>Địa chỉ</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach($customer as $key => $cus)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $cus->fullname }}</td>
                        <td>{{ $cus->email }}</td>
                        <td>{{ $cus->phone }}</td>
                        <td>{{ $cus->address }}</td>
                        <td>
                            <a href="{{ route('customer.edit', $cus->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                            <form action="{{ route('customer.destroy', $cus->id) }}" method="post" style="display:inline;">
                                @csrf
                                <input type="submit" value="Xóa" class="btn btn-danger btn-sm">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="d-flex align-items-center my-3">
        <label class="me-2">Số bản ghi:</label>
        <select onchange="window.location.href=this.value" class="form-select w-auto">
            <option value="{{ route('customer.index', 5) }}" {{ $perpage == 5 ? 'selected' : '' }}>5</option>
            <option value="{{ route('customer.index', 10) }}" {{ $perpage == 10 ? 'selected' : '' }}>10</option>
            <option value="{{ route('customer.index', 15) }}" {{ $perpage == 15 ? 'selected' : '' }}>15</option>
            <option value="{{ route('customer.index', 100) }}" {{ $perpage == 100 ? 'selected' : '' }}>100</option>
        </select>
    </div>
    <div>
        {{ $customer->links('pagination::bootstrap-4') }}
    </div>

@endsection