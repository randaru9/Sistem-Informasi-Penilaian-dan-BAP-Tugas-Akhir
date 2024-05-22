@php
    $breads = [
        [
            'href' => '/mahasiswa/yudisium',
            'title' => 'Yudisium',
        ],
        [
            'href' => '/mahasiswa/yudisium/detail',
            'title' => 'Detail',
        ],
    ];
@endphp

<x-layout-mahasiswa :$breads title="Detail Berkas Yudisium">
    <div class="bg-white ring-2 ring-blue1 rounded-[10px] w-full h-full overflow-hidden">
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
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laborum at dolores beatae sed sit quisquam in quae. Facilis, ipsum. Illo velit at repellendus. Atque fugiat commodi nemo consequuntur quidem tenetur.
                </p>
            </div>
        </div>
        <div class="w-full px-5 flex py-2 gap-2">
            <div class="w-1/2">
                <label for="status_revisi" class="block mb-2 text-base text-[#000000] font-poppins font-normal">Draft
                    Tugas Akhir</label>
                <button id="status_revisi"
                    class="bg-gold text-white hover:bg-white hover:ring-2 hover:ring-gold hover:text-gold px-4 py-1 w-fit rounded-[5px] font-poppins text-base">
                    Unduh
                </button>
            </div>
        </div>
        <div class="w-full px-5 flex justify-end items-center py-2 gap-2">
            <button type="submit"
                class="bg-gold text-white hover:bg-white hover:ring-2 hover:ring-gold hover:text-gold px-4 py-2 w-fit rounded-[5px] font-poppins text-base">Simpan</button>
        </div>
    </div>
</x-layout-mahasiswa>
