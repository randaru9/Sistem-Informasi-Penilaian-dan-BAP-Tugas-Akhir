<div>
    <ul class="flex p-3">
        @foreach ($breads  as $item)
        @if ($loop->first)
        <li>
            <a href="{{ $item['href'] }}" class="font-poppins font-normal">
                {{ $item['title'] }}
            </a>
        </li>
        @else
        <li class="flex">
            <img src="{{ url(asset('storage/assets/logo_arrow_breadcrumbs.svg')) }}" alt="">
            <a href="{{ $item['href'] }}" class="{{$loop->last ? 'font-poppins font-normal text-gold w-fit whitespace-nowrap' : 'font-poppins font-normal w-fit whitespace-nowrap'}}">
                {{ $item['title'] }}
            </a>
        </li>
        @endif
        @endforeach
    </ul>
</div>
