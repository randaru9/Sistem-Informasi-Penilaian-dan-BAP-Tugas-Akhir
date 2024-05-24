@php
    $breads = [
        [
            'href' => '/dosen/penilaian',
            'title' => 'Penilaian',
        ],
        [
            'href' => '/dosen/penilaian/detail',
            'title' => 'Detail',
        ],
        [
            'href' => '/dosen/penilaian/revisi-tambah',
            'title' => 'Beri Revisi',
        ],
    ];
@endphp

<x-layout-dosen :$breads title="Beri Revisi">
    <div class="bg-white ring-2 ring-blue1 rounded-[10px] w-full h-full lg:overflow-y-auto">
        <div class="w-full px-5 flex py-2 gap-2">
            <div class="w-1/2">
                <label for="nama" class="block mb-2 text-base text-[#000000] font-poppins font-normal">Nama
                    Teruji</label>
                <p id="nama" class="text-sm text-[#000000] font-poppins font-normal w-2/3 text-justify">
                    Rangga Ndaru Anggoro
                </p>
            </div>
        </div>
        <div class="w-full px-5 py-2">
            <div>
                <label for="judul_tugas_akhir" class="block mb-2 text-base text-[#000000] font-poppins font-normal">Judul
                    Tugas Akhir</label>
                <p id="judul_tugas_akhir" class="text-sm text-[#000000] font-poppins font-normal w-2/3 text-justify">
                    RANCANG BANGUN SISTEM INFORMASI PENILAIAN DAN BERITA ACARA PENILAIAN TUGAS AKHIR BERBASIS WEB
                    MENGGUNAKAN METODE DSDM (Studi Kasus : Prodi Teknik Informatika ITERA)
                </p>
            </div>
        </div>
        <div class="w-full px-5 flex py-2 gap-2">
            <div class="w-1/2">
                <label for="tanggal_sidang" class="block mb-2 text-base text-[#000000] font-poppins font-normal">Tanggal
                    Sidang</label>
                <p id="tanggal_sidang" class="text-sm text-[#000000] font-poppins font-normal w-2/3 text-justify">
                    12 - 10 -2024
                </p>
            </div>
            <div class="w-1/2">
                <label for="waktu_sidang" class="block mb-2 text-base text-[#000000] font-poppins font-normal">Waktu
                    Sidang</label>
                <p id="waktu_sidang" class="text-sm text-[#000000] font-poppins font-normal w-2/3 text-justify">
                    13:00
                </p>
            </div>
        </div>
        <div class="w-full px-5 flex py-2 gap-2">
            <div class="w-1/2">
                <label for="posisi" class="block mb-2 text-base text-[#000000] font-poppins font-normal">Posisi Dalam
                    Sidang</label>
                <p id="posisi" class="text-sm text-[#000000] font-poppins font-normal w-2/3 text-justify">
                    Pembimbing 1
                </p>
            </div>
            <div class="w-1/2">
                <label for="jenis_sidang" class="block mb-2 text-base text-[#000000] font-poppins font-normal">Jenis
                    Sidang</label>
                <p id="jenis_sidang" class="text-sm text-[#000000] font-poppins font-normal w-2/3 text-justify">
                    Seminar Proposal
                </p>
            </div>
        </div>
        <div class="w-full px-5 flex py-2 gap-2">
            <form action="" class="w-full">
                <div class="w-full lg:w-1/2 flex flex-col">
                    <label for="revisi" class="block mb-2 text-sm text-[#000000] font-poppins font-normal">Revisi :
                    </label>
                    <textarea
                        class="bg-white border rounded-md border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500"
                        name="revisi" id="revisi" cols="90" rows="5"></textarea>
                </div>
                <div class="w-full flex justify-end gap-x-4 my-3">
                    <button type="submit"
                        class="bg-gold text-white hover:bg-white hover:ring-2 hover:ring-gold hover:text-gold px-4 py-2 w-fit rounded-[5px] font-poppins text-base">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</x-layout-dosen>
