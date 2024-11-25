@php
    $breads = [
        [
            'href' => '/admin/bap',
            'title' => 'BAP',
        ],
        [
            'href' => '/admin/bap/ubah-rentang-nilai',
            'title' => 'Ubah Rentang Nilai',
        ],
    ];
@endphp

<x-layout-admin :$breads title="Ubah Rentang Nilai">
    <div class="bg-white ring-2 ring-blue1 rounded-[10px] w-full h-full overflow-y-auto">
        <form action="{{ route('ubah-rentang-nilai-post') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="w-full px-5 flex py-2 gap-2">
                <div class="w-1/2">
                    <p class="block mb-2 text-xl text-[#000000] font-poppins font-bold">Ubah Rentang Nilai
                    </p>
                </div>
            </div>
            <div class="w-full px-5 flex py-2 gap-2">
                <div class="w-1/3">
                    <label for="min_a" class="block mb-2 text-sm text-[#000000] font-poppins font-normal">Minimum Nilai
                        A</label>
                    <input type="text" id="min_a" name="min_a"
                        class="bg-white border rounded-md border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block p-1 w-full "
                        required value="{{$data[0]->min}}" />
                </div>
                @error('min_a')
                    <div class="w-full px-5 flex py-2 gap-2">
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    </div>
                @enderror
                <div class="w-1/3">
                    <label for="min_ab" class="block mb-2 text-sm text-[#000000] font-poppins font-normal">Minimum Nilai
                        AB</label>
                    <input type="text" id="min_ab" name="min_ab"
                        class="bg-white border rounded-md border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block p-1 w-full "
                        required value="{{$data[1]->min}}"/>
                </div>
                @error('min_ab')
                    <div class="w-full px-5 flex py-2 gap-2">
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    </div>
                @enderror
                <div class="w-1/3">
                    <label for="min_b" class="block mb-2 text-sm text-[#000000] font-poppins font-normal">Minimum Nilai
                        B</label>
                    <input type="text" id="min_b" name="min_b"
                        class="bg-white border rounded-md border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block p-1 w-full "
                        required value="{{$data[2]->min}}" />
                </div>
                @error('min_b')
                    <div class="w-full px-5 flex py-2 gap-2">
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    </div>
                @enderror
            </div>

            <div class="w-full px-5 flex py-2 gap-2">
                <div class="w-1/3">
                    <label for="min_bc" class="block mb-2 text-sm text-[#000000] font-poppins font-normal">Minimum Nilai
                        BC</label>
                    <input type="text" id="min_bc" name="min_bc"
                        class="bg-white border rounded-md border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block p-1 w-full "
                        required value="{{$data[3]->min}}"/>
                </div>
                @error('min_bc')
                    <div class="w-full px-5 flex py-2 gap-2">
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    </div>
                @enderror
                <div class="w-1/3">
                    <label for="min_c" class="block mb-2 text-sm text-[#000000] font-poppins font-normal">Minimum Nilai
                        C</label>
                    <input type="text" id="min_c" name="min_c"
                        class="bg-white border rounded-md border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block p-1 w-full "
                        required value="{{$data[4]->min}}"/>
                </div>
                @error('min_c')
                    <div class="w-full px-5 flex py-2 gap-2">
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    </div>
                @enderror
            </div>

            <div class="w-full px-5 flex justify-end items-center py-2 gap-2">
                <button type="submit"
                    class="bg-gold text-white hover:bg-white hover:ring-2 hover:ring-gold hover:text-gold px-4 py-2 w-fit rounded-[5px] font-poppins text-base">Ubah</button>
            </div>
        </form>
    </div>
</x-layout-admin>
