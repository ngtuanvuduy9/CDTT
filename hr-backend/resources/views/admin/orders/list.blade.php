<table class="table table-bordered table-striped">
    <thead class="table-light">
        <tr>
            <th>ID</th>
            <th>Khách hàng (ID)</th>
            <th>Ngày đặt</th>
            <th>Ghi chú</th>
            <th>Ngày tạo</th>
            <th>Cập nhật</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($list as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->customerid }}</td>
                <td>{{ $item->orderdate }}</td>
                <td>{{ $item->description }}</td>
                <td>{{ $item->created_at }}</td>
                <td>{{ $item->updated_at }}</td>
                <td>
                    <div class="d-flex">
                        {{-- <a href="{{ route('orders.edit', $item->id) }}" class="btn btn-warning btn-sm me-1">Sửa</a>
                        <form action="{{ route('orders.delete', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Xóa" class="btn btn-danger btn-sm">
                        </form> --}}
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{ $list->links('pagination::bootstrap-4') }}