@php
    $breads = [
        [
            'href' => '/admin/bap',
            'title' => 'BAP',
        ],
        [
            'href' => '/admin/bap/detail',
            'title' => 'Detail',
        ],
    ];
@endphp

<x-layout-admin :$breads title="Detail BAP">
    <div class="bg-white ring-2 ring-blue1 rounded-[10px] w-full h-fit lg:overflow-y-auto">
        <div class="w-full px-5 py-2">
            <div>
                <label for="nama_teruji" class="block mb-2 text-base text-[#000000] font-poppins font-normal">Nama
                    Teruji</label>
                <p id="nama_teruji" class="text-sm text-[#000000] font-poppins font-normal w-2/3 text-justify">
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
                <label for="pembimbing1" class="block mb-2 text-base text-[#000000] font-poppins font-normal">Pembimbing
                    1</label>
                <p id="pembimbing1" class="text-sm text-[#000000] font-poppins font-normal w-2/3 text-justify">
                    Ilham Firman Ashari, S.Kom., M.T.
                </p>
            </div>
            <div class="w-1/2">
                <label for="pembimbing2" class="block mb-2 text-base text-[#000000] font-poppins font-normal">Pembimbing
                    2</label>
                <p id="pembimbing2" class="text-sm text-[#000000] font-poppins font-normal w-2/3 text-justify">
                    Andika Setiawan, S.Kom., M.Cs.
                </p>
            </div>
        </div>
        <div class="w-full px-5 flex py-2 gap-2">
            <div class="w-1/2">
                <label for="penguji1" class="block mb-2 text-base text-[#000000] font-poppins font-normal">Penguji
                    1</label>
                <p id="penguji1" class="text-sm text-[#000000] font-poppins font-normal w-2/3 text-justify">
                    Ir. Mugi Praseptiawan, S.T., M.Kom.
                </p>
            </div>
            <div class="w-1/2">
                <label for="penguji2" class="block mb-2 text-base text-[#000000] font-poppins font-normal">Penguji
                    2</label>
                <p id="penguji2" class="text-sm text-[#000000] font-poppins font-normal w-2/3 text-justify">
                    Miranti Verdiana, M.Si.
                </p>
            </div>
        </div>
        <div class="w-full px-5 flex py-2 gap-2">
            <div class="w-1/2">
                <label for="pimpinan" class="block mb-2 text-base text-[#000000] font-poppins font-normal">Pimpinan
                    Sidang</label>
                <p id="pimpinan" class="text-sm text-[#000000] font-poppins font-normal w-2/3 text-justify">
                    Ilham Firman Ashari, S.Kom., M.T.
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
            <div class="w-1/2">
                <label for="status_penilaian"
                    class="block mb-2 text-base text-[#000000] font-poppins font-normal">Status
                    Penilaian</label>
                <p id="status_penilaian" class="text-sm text-[#000000] font-poppins font-normal w-2/3 text-justify">
                    Belum Diberikan
                </p>
            </div>
            <div class="w-1/2">
                <label for="status_revisi" class="block mb-2 text-base text-[#000000] font-poppins font-normal">Status
                    Revisi</label>
                <p id="status_revisi" class="text-sm text-[#000000] font-poppins font-normal w-2/3 text-justify">
                    Belum Selesai
                </p>
            </div>
        </div>
        <div class="w-full px-5 flex py-2 gap-2">
            <div class="w-1/2">
                <label for="status_penilaian"
                    class="block mb-2 text-base text-[#000000] font-poppins font-normal">Status
                    Tanda Tangan</label>
                <p id="status_penilaian" class="text-sm text-[#000000] font-poppins font-normal w-2/3 text-justify">
                    Belum Diberikan
                </p>
            </div>
        </div>
        <div class="w-full px-5 flex justify-end items-center py-2 gap-2">
            <a href="/admin/bap/detail-proses"
                class="bg-gold text-white hover:bg-white hover:ring-2 hover:ring-gold hover:text-gold px-4 py-2 w-fit rounded-[5px] font-poppins text-base">Detail
                Proses</a>
            <a href="/admin/bap/lihat-bap1"
                class="bg-gold text-white hover:bg-white hover:ring-2 hover:ring-gold hover:text-gold px-4 py-2 w-fit rounded-[5px] font-poppins text-base">Lihat
                BAP 1</a>
            <a href="/admin/bap/lihat-bap2"
                class="bg-gold text-white hover:bg-white hover:ring-2 hover:ring-gold hover:text-gold px-4 py-2 w-fit rounded-[5px] font-poppins text-base">Lihat
                BAP 2</a>
        </div>
    </div>
</x-layout-admin>
