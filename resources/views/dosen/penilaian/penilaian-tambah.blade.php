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
            'href' => '/dosen/penilaian/penilaian-tambah',
            'title' => 'Beri Nilai',
        ],
    ];
@endphp

<x-layout-dosen :$breads title="Beri Penilaian">
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
                <div class="w-full lg:flex gap-x-4">
                    <div class="lg:w-1/3">
                        <label for="penulisan"
                            class="block mb-2 text-sm text-[#000000] font-poppins font-normal">Penulisan Draft Tugas
                            Akhir dan PPT</label>
                        <input type="text" id="penulisan"
                            class="bg-white border rounded-md border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block p-1 w-full "
                            minlength="9" required />
                    </div>
                    <div class="lg:w-1/3">
                        <label for="presentasi"
                            class="block mb-2 text-sm text-[#000000] font-poppins font-normal">Penyajian/Presentasi
                        </label>
                        <input type="text" id="presentasi"
                            class="bg-white border rounded-md border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block p-1 w-full "
                            minlength="9" required />
                    </div>
                    <div class="lg:w-1/3">
                        <label for="penguasaan"
                            class="block mb-2 text-sm text-[#000000] font-poppins font-normal">Penguasaan Materi</label>
                        <input type="text" id="penguasaan"
                            class="bg-white border rounded-md border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block p-1 w-full "
                            minlength="9" required />
                    </div>
                </div>
                <div class="w-full lg:flex gap-x-4 my-3">
                    <div class="lg:w-1/3">
                        <label for="kemampuan_menjawab"
                            class="block mb-2 text-sm text-[#000000] font-poppins font-normal">Kemampuan
                            Menjawab</label>
                        <input type="text" id="kemampuan_menjawab"
                            class="bg-white border rounded-md border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block p-1 w-full "
                            minlength="9" required />
                    </div>
                    <div class="lg:w-1/3">
                        <label for="etika" class="block mb-2 text-sm text-[#000000] font-poppins font-normal">Etika
                            dan Sopan Santuan</label>
                        <input type="text" id="etika"
                            class="bg-white border rounded-md border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block p-1 w-full "
                            minlength="9" required />
                    </div>
                    <div class="lg:w-1/3">
                        <label for="bimbingan" class="block mb-2 text-sm text-[#000000] font-poppins font-normal">Nilai
                            Bimbingan</label>
                        <input type="text" id="bimbingan"
                            class="bg-white border rounded-md border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block p-1 w-full "
                            minlength="9" required />
                    </div>
                </div>
                <div class="w-full flex flex-col my-4">
                    <label for="tandatangan" class="block mb-2 text-sm text-[#000000] font-poppins font-normal">Tanda
                        Tangan
                    </label>
                    <div class="flex space-x-2">
                        <label for="tandatangan"
                            class="bg-gold text-white hover:bg-white hover:ring-2 hover:ring-gold hover:text-gold px-4 py-1 w-fit rounded-[5px] font-poppins text-base">
                            <input type="file" id="tandatangan" class="hidden" minlength="9" required />
                            Unggah
                        </label>
                        <p class="font-poppins text-base text-[#B7B7B7]">Unggah tanda tangan</p>
                    </div>
                </div>
                <div class="w-full flex justify-end gap-x-4 my-3">
                    <button type="submit"
                        class="bg-gold text-white hover:bg-white hover:ring-2 hover:ring-gold hover:text-gold px-4 py-2 w-fit rounded-[5px] font-poppins text-base">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</x-layout-dosen>
