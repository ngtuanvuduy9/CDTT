@extends('layout.admin')

@section('title', 'Sửa chấm công')

@section('content')
    <div class="container py-4">
        <h3>Sửa chấm công</h3>

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

        <form action="{{ route('attendances.update', $attendance->id) }}" method="POST">
            @method('PUT')
            @include('attendances._form')
        </form>
    </div>
@endsection