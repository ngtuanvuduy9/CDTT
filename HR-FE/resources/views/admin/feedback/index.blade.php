@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0 fw-bold text-primary">
                <i class="fas fa-comments me-2"></i>Quản lý Phản hồi
            </h1>
        </div>
        {{-- <div class="row mb-4">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-0 shadow h-100 py-2"
                    style="background: linear-gradient(90deg, #396afc 0%, #2948ff 100%); color: #fff;">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div>
                            <div class="text-uppercase mb-1 fw-bold">Tổng phản hồi</div>
                            <div class="h4 mb-0 fw-bold">
                                @isset($feedbacks)
                                    {{ is_array($feedbacks) ? count($feedbacks) : 0 }}
                                @else
                                    0
                                @endisset
                            </div>
                        </div>
                        <i class="fas fa-comments fa-2x opacity-75"></i>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="card shadow mb-4">
            <div class="card-header py-3 bg-primary text-white">
                <h6 class="m-0 fw-bold"><i class="fas fa-list me-1"></i>Danh sách phản hồi</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>Nhân viên</th>
                                <th>Nội dung</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (is_array($feedbacks) && count($feedbacks) > 0)
                                @foreach ($feedbacks as $feedback)
                                    <tr>
                                        <td class="fw-bold text-primary"><i class="fas fa-user"></i>
                                            {{ $feedback['employee']['name'] ?? ($feedback['employee_id'] ?? 'N/A') }}</td>
                                        <td>{{ Str::limit($feedback['content'] ?? 'Không có nội dung', 50) }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="2" class="text-center">Không có dữ liệu phản hồi</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
