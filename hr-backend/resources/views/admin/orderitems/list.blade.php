<table class="table table-bordered table-striped">
    <thead class="table-light">
        <tr>
            <th>ID</th>
            <th>Mã đơn hàng</th>
            <th>Sản phẩm</th>
            <th>Số lượng</th>
            <th>Giá</th>
            <th>Ngày tạo</th>
            <th>Cập nhật</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($list as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->orderid }}</td>
                <td>{{ $item->productid }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ number_format($item->price) }}đ</td>
                <td>{{ $item->created_at }}</td>
                <td>{{ $item->updated_at }}</td>
                <td>
                    <div class="d-flex">
                        <a href="{{ route('orderitems.edit', $item->id) }}" class="btn btn-warning btn-sm me-1">Edit</a>
                        <form action="{{ route('orderitems.delete', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{ $list->links('pagination::bootstrap-4') }}