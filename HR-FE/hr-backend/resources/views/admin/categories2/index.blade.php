@extends('layout.admin')
@section('title', 'Sản Phẩm')
@section('content')
    <h3 class="mb-3">Danh sách loại sản phẩm</h3>
    <a href="{{ route('cate2.create') }}" class="btn btn-primary my-2">
        <i class="fas fa-plus"></i> Thêm
    </a>

    @if (session('message'))
        <div class="alert alert-danger">{{ session('message') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên loại</th>
                    <th>Mô tả</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($list as $item)
                    <tr>
                        <td>{{ ($list->currentPage() - 1) * $list->perPage() + $loop->index + 1 }}</td>
                        <td>{{ $item->catename }}</td>
                        <td>{{ $item->description }}</td>
                        <td>
                            <a href="{{ route('cate2.edit', $item->cateid) }}" class="btn btn-warning btn-sm">Sửa</a>

                            <form action="{{ route('cate2.delete', $item->cateid) }}" method="post" style="display:inline;">
                                @csrf
                                <input type="submit" value="Xóa" class="btn btn-danger btn-sm">
                            </form>

                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#confirmdelete" data-info="{{ $item->catename }}"
                                data-action="{{ route('cate2.delete', $item->cateid) }}">
                                Xóa (modal)
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-3">
            {{ $list->links('pagination::bootstrap-4') }}
        </div>
        {{-- Modal xác nhận xóa --}}
        <div class="modal fade" id="confirmdelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form method="post" id="deleteForm">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Xác nhận xóa</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Đóng"></button>
                        </div>
                        <div class="modal-body">
                            Bạn có chắc muốn xóa loại sản phẩm: <strong class="info"></strong>?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                            <button type="submit" class="btn btn-danger">Đồng ý</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
@endsection

    @push('scripts')
        <script>
            const confirmModal = document.getElementById('confirmdelete');
            confirmModal.addEventListener('show.bs.modal', function (event) {
                const button = event.relatedTarget;
                const info = button.getAttribute('data-info');
                const action = button.getAttribute('data-action');
                confirmModal.querySelector('.info').textContent = info;
                confirmModal.querySelector('form#deleteForm').action = action;
            });
        </script>
    @endpush