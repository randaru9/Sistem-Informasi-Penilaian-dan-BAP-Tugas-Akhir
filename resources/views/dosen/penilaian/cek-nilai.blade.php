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
            'href' => '/dosen/penilaian/cek-nilai',
            'title' => 'Cek Nilai',
        ],
    ];
@endphp

<x-layout-dosen :$breads title="Cek Nilai">
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
            <div class="w-full">
                <div class="w-full lg:flex gap-x-4">
                    <div class="lg:w-1/3">
                        <label for="penulisan"
                            class="block lg:mb-2 text-sm text-[#000000] font-poppins font-normal">Penulisan Draft Tugas
                            Akhir dan PPT</label>
                        <p id="penulisan" class="text-sm text-[#000000] font-poppins font-normal w-2/3 text-justify">
                            80
                        </p>
                    </div>
                    <div class="lg:w-1/3">
                        <label for="presentasi"
                            class="block lg:mb-2 text-sm text-[#000000] font-poppins font-normal">Penyajian/Presentasi
                        </label>
                        <p id="presentasi" class="text-sm text-[#000000] font-poppins font-normal w-2/3 text-justify">
                            80
                        </p>
                    </div>
                    <div class="lg:w-1/3">
                        <label for="penguasaan"
                            class="block lg:mb-2 text-sm text-[#000000] font-poppins font-normal">Penguasaan Materi</label>
                            <p id="penguasaan" class="text-sm text-[#000000] font-poppins font-normal w-2/3 text-justify">
                                80
                            </p>
                    </div>
                </div>
                <div class="w-full lg:flex gap-x-4 lg:my-3">
                    <div class="lg:w-1/3">
                        <label for="kemampuan_menjawab"
                            class="block lg:mb-2 text-sm text-[#000000] font-poppins font-normal">Kemampuan
                            Menjawab</label>
                            <p id="kemampuan_menjawab" class="text-sm text-[#000000] font-poppins font-normal w-2/3 text-justify">
                                80
                            </p>
                    </div>
                    <div class="lg:w-1/3">
                        <label for="etika" class="block lg:mb-2 text-sm text-[#000000] font-poppins font-normal">Etika
                            dan Sopan Santuan</label>
                            <p id="etika" class="text-sm text-[#000000] font-poppins font-normal w-2/3 text-justify">
                                80
                            </p>
                    </div>
                    <div class="lg:w-1/3">
                        <label for="bimbingan" class="block lg:mb-2 text-sm text-[#000000] font-poppins font-normal">Nilai
                            Bimbingan</label>
                            <p id="bimbinga" class="text-sm text-[#000000] font-poppins font-normal w-2/3 text-justify">
                                80
                            </p>
                    </div>
                </div>
                <div class="w-full flex flex-col lg:my-3">
                    <label for="tandatangan" class="block lg:mb-2 text-sm text-[#000000] font-poppins font-normal">Tanda
                        Tangan
                    </label>
                    <button class="bg-gold text-white hover:bg-white hover:ring-2 hover:ring-gold hover:text-gold px-4 py-1 w-fit rounded-[5px] font-poppins text-base">
                        Unduh
                    </button>
                </div>
                <div class="w-full flex justify-end gap-x-4 my-3">
                    <a href="/dosen/penilaian/ubah-nilai"
                        class="bg-gold text-white hover:bg-white hover:ring-2 hover:ring-gold hover:text-gold px-4 py-2 w-fit rounded-[5px] font-poppins text-base">Ubah</a>
                </div>
            </div>
        </div>
    </div>
</x-layout-dosen>
