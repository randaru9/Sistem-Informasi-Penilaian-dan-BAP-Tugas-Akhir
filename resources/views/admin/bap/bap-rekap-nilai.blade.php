@php
    $breads = [
        [
            'href' => '/admin/bap',
            'title' => 'BAP',
        ],
        [
            'href' => '/admin/bap/rekap-nilai',
            'title' => 'Unduh Rekap Nilai Mahasiswa',
        ],
    ];
@endphp

<x-layout-admin :$breads title="Unduh Rekap Nilai Mahasiswa">
    <div class="bg-white ring-2 ring-blue1 rounded-[10px] w-full h-full overflow-y-auto">
        <form action="{{ route('bap-rekap-nilai-post') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="w-full px-5 flex py-2 gap-2">
                <div class="w-1/2">
                    <p for="nama" class="block mb-2 text-xl text-[#000000] font-poppins font-bold">Unduh Rekap Nilai
                        Mahasiswa
                    </p>
                </div>
            </div>

            <div class="w-full px-5 flex py-2 gap-2">
                <div class="w-1/2">
                    <label for="jenis_sidang" class="block mb-2 text-sm text-[#000000] font-poppins font-normal">Jenis
                        Sidang</label>
                    <select
                        class="bg-white border rounded-md border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block p-1 w-full"
                        name="jenis" id="jenis">
                        <option disabled selected hidden> Pilih Jenis Sidang </option>
                        @foreach ($data as $item)
                            <option value="{{ $item->id }}">{{ $item->keterangan }}</option>
                        @endforeach
                    </select>
                    @error('jenis')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="w-full px-5 flex py-2 gap-2">
                <div class="w-1/2">
                    <label for="tglAwal" class="block mb-2 text-sm text-[#000000] font-poppins font-normal">Tanggal
                        Awal</label>
                    <input type="date" id="tglAwal" name="tglAwal"
                        class="bg-white border rounded-md border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block p-1 w-full "
                        minlength="9" required />
                    @error('tglAwal')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="w-full px-5 flex py-2 gap-2">
                <div class="w-1/2">
                    <label for="tglAkhir" class="block mb-2 text-sm text-[#000000] font-poppins font-normal">Tanggal
                        Akhir</label>
                    <input type="date" id="tglAkhir" name="tglAkhir"
                        class="bg-white border rounded-md border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block p-1 w-full "
                        minlength="9" required />
                    @error('tglAkhir')
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
