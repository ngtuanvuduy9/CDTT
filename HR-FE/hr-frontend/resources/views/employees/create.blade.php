@extends('layout.admin')

@section('title', 'Thêm nhân viên')

@section('content')
    <div class="container py-4">
        <h3 class="mb-3">Thêm nhân viên</h3>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
            @include('employees._form')
        </form>
    </div>
@endsection