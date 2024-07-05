@php
    $breads = [
        [
            'href' => '/mahasiswa/yudisium',
            'title' => 'Yudisium',
        ],
        [
            'href' => route('yudisium-detail-mahasiswa', ['id' => $data['id']]),
            'title' => 'Detail',
        ],
    ];
@endphp

<x-layout-mahasiswa :$breads title="Detail Berkas Yudisium">
    <div class="bg-white ring-2 ring-blue1 rounded-[10px] w-full h-full overflow-y-auto">
        <div class="w-full px-5 flex py-2 gap-2">
            <div class="w-1/2">
                <label for="periode_wisuda" class="block mb-2 text-base text-[#000000] font-poppins font-normal">Periode
                    Wisuda</label>
                <p id="periode_wisuda" class="text-sm text-[#000000] font-poppins font-normal w-2/3 text-justify">
                    {{ $data['periode_wisudas']['keterangan'] }}
                </p>
            </div>
        </div>
        <div class="w-full px-5 flex py-2 gap-2">
            <div class="w-1/2">
                <label for="tempat_kerja" class="block mb-2 text-base text-[#000000] font-poppins font-normal">Tempat
                    dan Bidang Kerja (Apabila Sudah Bekerja)</label>
                <p id="tempat_kerja" class="text-sm text-[#000000] font-poppins font-normal w-2/3 text-justify">
                    @if ($data['tempat_dan_bidang_kerja'] == null)
                        -
                    @else
                        {{ $data['tempat_dan_bidang_kerja'] }}
                    @endif
                </p>
            </div>
        </div>
        <div class="w-full px-5 flex py-2 gap-2">
            <div class="w-4/5">
                <label for="saran" class="block mb-2 text-base text-[#000000] font-poppins font-normal">Tempat
                    Saran Dan
                    Kritik</label>
                <p id="saran" class="text-sm text-[#000000] font-poppins font-normal w-2/3 text-justify">
                    @if ($data['saran_dan_kritik'] == null)
                        -
                    @else
                        {{ $data['saran_dan_kritik'] }}
                    @endif
                </p>
            </div>
        </div>
        <div class="w-full px-5 flex py-2 gap-2">
            <div class="w-1/2">
                <label for="berkas_yudisium" class="block mb-2 text-base text-[#000000] font-poppins font-normal">Berkas
                    Yudisium</label>
                <button id="berkas_yudisium"
                    class="bg-gold text-white hover:bg-white hover:ring-2 hover:ring-gold hover:text-gold px-4 py-1 w-fit rounded-[5px] font-poppins text-base">
                    Unduh
                </button>
            </div>
        </div>
        @if ($data['catatan'] != null)
        <div class="w-full px-5 flex py-2 gap-2">
            <div class="w-4/5">
                <label for="saran" class="block mb-2 text-base text-[#000000] font-poppins font-normal">Catatan
                    Perbaikan :</label>
                <p id="saran" class="text-sm text-[#000000] font-poppins font-normal w-2/3 text-justify">
                    {{ $data['catatan'] }}
                </p>
            </div>
        </div>
        @endif
        @if ($data['status_yudisium_id'] !== 3)
        <div class="w-full px-5 flex justify-end items-center py-2 gap-2">
            <a href="{{route('yudisium-ubah', ['id' => $data['id']])}}"
                class="bg-gold text-white hover:bg-white hover:ring-2 hover:ring-gold hover:text-gold px-4 py-2 w-fit rounded-[5px] font-poppins text-base">Ubah</a>
        </div>
        @endif
    </div>
</x-layout-mahasiswa>
