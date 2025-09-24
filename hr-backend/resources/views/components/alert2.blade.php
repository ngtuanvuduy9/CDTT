@if(session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
@endif

{{-- hiển thị tất cả lỗi sau khi validate --}}
@if ($errors->any())
        <div class="alert alert-danger">
                        @foreach ($errors->all() as $item)
                                                        {{ $item }} <br>
                                        @endforeach
        </div>
@endif