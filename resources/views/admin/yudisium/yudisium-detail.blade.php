@php
    $breads = [
        [
            'href' => '/admin/yudisium',
            'title' => 'Yudisium',
        ],
        [
            'href' => '/admin/yudisium/detail',
            'title' => 'Detail',
        ],
    ];
@endphp

<x-layout-admin :$breads title="Detail Berkas Yudisium">
    <div id="alasan_penolakan" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white ring-2 ring-blue1 rounded-lg flex flex-col justify-center items-center">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b-2 w-11/12">
                    <h3 class="font-poppins text-xl font-semibold text-black">
                        Tuliskan Alasan Penolakan
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-blue1 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="alasan_penolakan">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4 min-w-full max-w-2xl max-h-96 min-h-96 overflow-y-scroll">
                    <form action="">
                        <div class="flex flex-col">
                            <label class="text-base text-[#000000] font-poppins font-normal" for="alasan_penolakan">Catatan : </label>
                            <textarea class="border border-gray-300" name="alasan_penolakan" id="alasan_penolakan" cols="30" rows="10"></textarea>
                        </div>
                        <button type="submit" class="bg-gold text-white hover:bg-white hover:ring-2 hover:ring-gold hover:text-gold w-full mt-2 px-4 py-2 rounded-[5px] font-poppins text-base">
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
                <label for="periode_wisuda" class="block mb-2 text-base text-[#000000] font-poppins font-normal">Periode
                    Wisuda</label>
                <p id="periode_wisuda" class="text-sm text-[#000000] font-poppins font-normal w-2/3 text-justify">
                    November
                </p>
            </div>
        </div>
        <div class="w-full px-5 flex py-2 gap-2">
            <div class="w-1/2">
                <label for="tempat_kerja" class="block mb-2 text-base text-[#000000] font-poppins font-normal">Tempat
                    dan Bidang Kerja (Apabila Sudah Bekerja)</label>
                <p id="tempat_kerja" class="text-sm text-[#000000] font-poppins font-normal w-2/3 text-justify">
                    Staff TIK Itera
                </p>
            </div>
        </div>
        <div class="w-full px-5 flex py-2 gap-2">
            <div class="w-4/5">
                <label for="saran" class="block mb-2 text-base text-[#000000] font-poppins font-normal">Tempat
                    Saran Dan
                    Kritik</label>
                <p id="saran" class="text-sm text-[#000000] font-poppins font-normal w-2/3 text-justify">
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laborum at dolores beatae sed sit quisquam
                    in quae. Facilis, ipsum. Illo velit at repellendus. Atque fugiat commodi nemo consequuntur quidem
                    tenetur.
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
        <div class="w-full px-5 flex justify-end items-center py-2 gap-2">
            <button data-modal-target="alasan_penolakan" data-modal-toggle="alasan_penolakan"
                class="bg-gold text-white hover:bg-white hover:ring-2 hover:ring-gold hover:text-gold px-4 py-2 w-fit rounded-[5px] font-poppins text-base">Tolak</button>
                <a href="/mahasiswa/yudisium/ubah"
                class="bg-gold text-white hover:bg-white hover:ring-2 hover:ring-gold hover:text-gold px-4 py-2 w-fit rounded-[5px] font-poppins text-base">Terima</a>
        </div>
    </div>

</x-layout-admin>
