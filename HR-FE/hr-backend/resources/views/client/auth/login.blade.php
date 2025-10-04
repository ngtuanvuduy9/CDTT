@extends('layout.client')

@section('title', 'Đăng nhập khách hàng')

@section('content')
    <div class="container mt-5">
        @if (session('message'))
            <div class="alert alert-danger">{{ session('message') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <h2>Đăng nhập</h2>
        <form method="POST" action="{{ route('customer.login.post') }}">
            @csrf
            <input name="email" class="form-control mb-2" placeholder="Email">
            <input name="password" type="password" class="form-control mb-2" placeholder="Mật khẩu">
            <button class="btn btn-primary">Đăng nhập</button>
        </form>
    </div>
@endsection