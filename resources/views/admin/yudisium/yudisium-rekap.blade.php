@php
    $breads = [
        [
            'href' => '/admin/yudisium',
            'title' => 'Yudisium',
        ],
        [
            'href' => '/admin/yudisium/rekap',
            'title' => 'Unduh Rekap Yudisium',
        ],
    ];
@endphp

<x-layout-admin :$breads title="Unduh Rekap Yudisium">
    <div class="bg-white ring-2 ring-blue1 rounded-[10px] w-full h-full overflow-y-auto">
        <form action="{{ route('yudisium-rekap-post') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="w-full px-5 flex py-2 gap-2">
                <div class="w-1/2">
                    <p for="nama" class="block mb-2 text-xl text-[#000000] font-poppins font-bold">Unduh Rekap Yudisium</p>
                </div>
            </div>

            <div class="w-full px-5 flex py-2 gap-2">
                <div class="w-1/2">
                    <label for="periode" class="block mb-2 text-sm text-[#000000] font-poppins font-normal">Periode Wisuda</label>
                    <select
                        class="bg-white border rounded-md border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block p-1 w-full"
                        name="periode" id="periode">
                        <option disabled selected hidden> Pilih Periode Wisuda </option>
                        @foreach ($periode as $item)
                            <option value="{{ $item->id }}">{{ $item->keterangan }}</option>
                        @endforeach
                    </select>
                    @error('periode')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="w-full px-5 flex py-2 gap-2">
                <div class="w-1/2">
                    <label for="tahun" class="block mb-2 text-sm text-[#000000] font-poppins font-normal">Tahun Wisuda</label>
                    <input type="text" id="tahun" name="tahun"
                        class="bg-white border rounded-md border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block p-1 w-full "
                        required placeholder="Masukan Tahun Wisuda" />
                    @error('tahun')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                    @if(Session::has('error'))
                        <p class="text-red-500 text-xs mt-1">{{ Session::get('error') }}</p>
                    @endif
                </div>
            </div>

            <div class="w-full px-5 flex justify-end items-center py-2 gap-2">
                <button type="submit"
                    class="bg-gold text-white hover:bg-white hover:ring-2 hover:ring-gold hover:text-gold px-4 py-2 w-fit rounded-[5px] font-poppins text-base">Unduh</button>
            </div>
        </form>
    </div>
</x-layout-admin>
