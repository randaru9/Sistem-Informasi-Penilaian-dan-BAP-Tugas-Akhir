<div>
    @php
    $min = 1;
    $max = $pages;
    if($pages > 5) {
        if($current > 3) {
            $min = $current - 2;
            if($current + 2 > $pages) {
                $min = $pages - 4;
            }
            $max = ($current + 2 > $pages) ? $pages : $current + 2;
        }else{
            $max = 5;
        }
    }   
    @endphp
    <nav aria-label="Page navigation example">
        <ul class="flex items-center space-x-2 h-8 text-sm">
            <li>
                <a href="#"
                    class="flex items-center justify-center px-3 h-8 leading-tight text-gold bg-white border border-gold rounded-[4px] hover:bg-gold hover:text-white">
                    <span class="sr-only">Previous</span>
                    <svg class="w-2.5 h-2.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 1 1 5l4 4" />
                    </svg>
                </a>
            </li>
            @for ($i = $min; $i <= $max; $i++)
            <li>
                <a href="#"
                    class="{{$i == $current ? 'bg-gold text-white' : ''}} flex items-center justify-center px-3 h-8 leading-tight rounded-[4px] border border-[#DCDCDC] text-[#212B36] hover:bg-gold hover:text-white">{{$i}}</a>
            </li>
            @endfor
            <li>
                <a href="#"
                    class="flex items-center justify-center px-3 h-8 leading-tight text-gold bg-white border border-gold rounded-[4px] hover:bg-gold hover:text-white">
                    <span class="sr-only">Next</span>
                    <svg class="w-2.5 h-2.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                </a>
            </li>
        </ul>
    </nav>
</div>
