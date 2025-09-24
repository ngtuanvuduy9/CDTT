@extends('layout.admin')


@section('content')
    <div class="container">
        <h2>Thêm vị trí</h2>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('positions.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Tên vị trí</label>
                <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
            </div>

            <button type="submit" class="btn btn-success">Lưu</button>
            <a href="{{ route('positions.index') }}" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>
@endsection