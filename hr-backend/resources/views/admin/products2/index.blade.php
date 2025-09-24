@extends('layout.admin')

@section('title', 'Danh sách sản phẩm')

@section('content')
    <h3 class="mb-3">Danh sách sản phẩm</h3>

    <a href="{{ route('products2.create') }}" class="btn btn-primary my-2">
        <i class="fas fa-plus"></i> Thêm
    </a>

    @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Thương hiệu</th>
                    <th>Danh mục</th>
                    <th>Ảnh</th>
                    <th>Thao tác</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($products as $item)
                    <tr>
                        <td>{{ ($products->currentPage() - 1) * $products->perPage() + $loop->index + 1 }}</td>
                        <td>{{ $item->proname }}</td>
                        <td>{{ number_format($item->price, 0, ',', '.') }} đ</td>
                        <td>{{ $item->brand->brandname ?? 'Không có' }}</td>
                        <td>{{ $item->category->catename ?? 'Không có' }}</td>
                        <td>
                            @if ($item->fileName)
                                <img src="{{ asset('storage/products/' . $item->fileName) }}" width="60" height="60"
                                    style="object-fit:cover;">
                            @else
                                Không có ảnh
                            @endif
                        </td>

                        <td>
                            <a href="{{ route('products2.edit', $item->id) }}" class="btn btn-warning btn-sm">Sửa</a>

                            <form action="{{ route('products2.delete', $item->id) }}" method="post" style="display:inline;">
                                @csrf
                                <input type="submit" value="Xóa" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này?')">
                            </form>

                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#confirmdelete" data-info="{{ $item->proname }}"
                                data-action="{{ route('products2.delete', $item->id) }}">
                                Xóa (modal)
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex align-items-center my-3">
        <label class="me-2">Số bản ghi:</label>
        <select onchange="window.location.href=this.value" class="form-select w-auto">
            <option value="{{ route('products2.index', 5) }}" {{ $perpage == 5 ? 'selected' : '' }}>5</option>
            <option value="{{ route('products2.index', 10) }}" {{ $perpage == 10 ? 'selected' : '' }}>10</option>
            <option value="{{ route('products2.index', 15) }}" {{ $perpage == 15 ? 'selected' : '' }}>15</option>
            <option value="{{ route('products2.index', 100) }}" {{ $perpage == 100 ? 'selected' : '' }}>100</option>
        </select>
    </div>

    <div>
        {{ $products->links('pagination::bootstrap-4') }}
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
                        Bạn có chắc muốn xóa sản phẩm: <strong class="info"></strong>?
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