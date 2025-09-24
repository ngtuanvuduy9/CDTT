@extends('layout.admin')

@section('title', 'Chỉnh sửa nhân viên')

@section('content')
    <div class="container py-4">
        <h3 class="mb-3">Chỉnh sửa nhân viên</h3>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('employees.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @include('employees._form')
        </form>
    </div>
@endsection