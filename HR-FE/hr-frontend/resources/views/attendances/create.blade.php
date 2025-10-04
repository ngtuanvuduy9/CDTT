@extends('layout.admin')

@section('title', 'Thêm chấm công')

@section('content')
    <div class="container py-4">
        <h3>Thêm chấm công</h3>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form action="{{ route('attendances.store') }}" method="POST">
            @include('attendances._form')
        </form>
    </div>
@endsection