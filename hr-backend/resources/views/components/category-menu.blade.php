{{-- đọc biến $categories --}}



<ul class="dropdown-menu" aria-labelledby="categoryDropdown">
    @foreach ($categories as $item)
        <li><a class="dropdown-item" href="{{ route('productbycate', ['id'=>$item->cateid]) }}">{{ $item->catename }}</a></li>

    @endforeach

</ul>