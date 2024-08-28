@php
    $breads = [
        [
            'href' => '/admin/yudisium',
            'title' => 'Yudisium',
        ],
        [
            'href' => route('yudisium-detail', ['id' => request()->query('id')]),
            'title' => 'Detail',
        ],
    ];
@endphp

<x-layout-admin :$breads title="Detail Berkas Yudisium">
    <div id="alasan_penolakan" tabindex="-1"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white ring-2 ring-blue1 rounded-lg flex flex-col justify-center items-center">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b-2 w-11/12">
                    <h3 class="font-poppins text-xl font-semibold text-black">
                        Tuliskan Alasan Penolakan
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-blue1 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                        data-modal-hide="alasan_penolakan">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4 min-w-full max-w-2xl max-h-96 min-h-96 overflow-y-scroll">
                    <form action="{{ route('yudisium-reject', ['id' => request()->query('id')]) }}" method="POST">
                        @csrf
                        <div class="flex flex-col">
                            <label class="text-base text-[#000000] font-poppins font-normal"
                                for="alasan_penolakan">Catatan : </label>
                            <textarea class="border border-gray-300" name="alasan_penolakan" id="alasan_penolakan" cols="30" rows="10"
                                required></textarea>
                        </div>
                        @error('alasan_penolakan')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                        <button type="submit"
                            class="bg-gold text-white hover:bg-white hover:ring-2 hover:ring-gold hover:text-gold w-full mt-2 px-4 py-2 rounded-[5px] font-poppins text-base">
                            Konfirmasi
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-white ring-2 ring-blue1 rounded-[10px] w-full h-full overflow-y-auto">
        <div class="w-full px-5 flex py-2 gap-2">
            <div class="w-1/2">
                <label for="nama" class="block mb-2 text-base text-[#000000] font-poppins font-normal">Nama</label>
                <p id="nama" class="text-sm text-[#000000] font-poppins font-normal w-2/3 text-justify">
                    {{ $data['penggunas']['nama'] }}
                </p>
            </div>
        </div>
        <div class="w-full px-5 flex py-2 gap-2">
            <div class="w-1/2">
                <label for="periode_wisuda" class="block mb-2 text-base text-[#000000] font-poppins font-normal">Periode
                    Wisuda</label>
                @php
                    $date = Carbon\Carbon::parse($data['periode_wisuda'])->translatedFormat('F Y');
                @endphp
                <p id="periode_wisuda" class="text-sm text-[#000000] font-poppins font-normal w-2/3 text-justify">
                    {{ $data['periode_wisuda'] }}
                </p>
            </div>
        </div>
        <div class="w-full px-5 flex py-2 gap-2">
            <div class="w-1/2">
                <label for="tempat_kerja" class="block mb-2 text-base text-[#000000] font-poppins font-normal">Tempat
                    dan Bidang Kerja (Apabila Sudah Bekerja)</label>
                <p id="tempat_kerja" class="text-sm text-[#000000] font-poppins font-normal w-2/3 text-justify">
                    {{ $data['tempat_dan_bidang_kerja'] }}
                </p>
            </div>
        </div>
        <div class="w-full px-5 flex py-2 gap-2">
            <div class="w-4/5">
                <label for="saran" class="block mb-2 text-base text-[#000000] font-poppins font-normal">Tempat
                    Saran Dan
                    Kritik</label>
                <p id="saran" class="text-sm text-[#000000] font-poppins font-normal w-2/3 text-justify">
                    {{ $data['saran_dan_kritik'] }}
                </p>
            </div>
        </div>
        <div class="w-full px-5 flex py-2 gap-2">
            <div class="w-1/2">
                <label for="berkas_yudisium" class="block mb-2 text-base text-[#000000] font-poppins font-normal">Berkas
                    Yudisium</label>
                <a href="{{ route('yudisium-unduh-berkas-admin', ['path' => $data['berkas'], 'periode' => $date, 'nama' => $data['penggunas']['nama']]) }}"
                    id="berkas_yudisium"
                    class="bg-gold text-white hover:bg-white hover:ring-2 hover:ring-gold hover:text-gold px-4 py-1 w-fit rounded-[5px] font-poppins text-base">
                    Unduh
                </a>
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
        @if ($data['status_yudisium_id'] == 1)
            <div class="w-full px-5 flex justify-end items-center py-2 gap-2">
                <button data-modal-target="alasan_penolakan" data-modal-toggle="alasan_penolakan"
                    class="bg-gold text-white hover:bg-white hover:ring-2 hover:ring-gold hover:text-gold px-4 py-2 w-fit rounded-[5px] font-poppins text-base">Tolak</button>
                <form action="{{ route('yudisium-accept', ['id' => request()->query('id')]) }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="bg-gold text-white hover:bg-white hover:ring-2 hover:ring-gold hover:text-gold px-4 py-2 w-fit rounded-[5px] font-poppins text-base">Terima</button>
                </form>
            </div>
        @endif
    </div>

</x-layout-admin>
