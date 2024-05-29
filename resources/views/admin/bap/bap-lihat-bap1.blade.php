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
        [
            'href' => '/admin/bap/lihat-bap1',
            'title' => 'Lihat BAP 1',
        ],
    ];
@endphp

<x-layout-admin :$breads title="Lihat BAP 1">
    <div class="bg-white ring-2 ring-blue1 rounded-[10px] w-full h-fit lg:overflow-y-auto">
        <div class="p-4">
            <div class="border border-black">
                <div id="revisi_form" class="bg-white h-fit ">
                    <img src="{{ url(asset('storage/assets/header_surat.png')) }}" alt="" class="w-full">
                    <div class="ml-20 mr-10">
                        <div class="font-tmr text-center font-[1000] text-xl">
                            <p class="my-2">
                                FORM 04 - (BAP 1)
                            </p>
                            <p class="mb-2">
                                BERITA ACARA SIDANG (PROPOSAL/AKHIR)
                            </p>
                            <p class="mb-2">
                                PROGRAM STUDI TEKNIK INFORMATIKA
                            </p>
                            <p class="mb-2">
                                FAKULTAS TEKNOLOGI INDUSTRI
                            </p>
                            <p class="mb-2">
                                INSTITUT TEKNOLOGI SUMATERA
                            </p>
                        </div>
                        <div class="flex flex-col mt-2 font-tmr font-normal text-base">
                            <p>Pada hari <span class="font-tmr font-semibold text-base"> Selasa tanggal 2 April </span> tahun 2024 Pukul <span class="font-tmr font-semibold text-base"> 11.00 - 12.00 </span> telah dilaksanakan
                                Ujian Sidang
                                (**Proposal/ Akhir) mahasiswa:</p>
                        </div>
                        <div class="my-2 space-y-1">
                            <div class="font-tmr font-normal text-base flex space-x-1">
                                <p class="whitespace-nowrap w-32">Nama</p>
                                <p> : </p>
                                <p>Rangga Ndaru Anggoro</p>
                            </div>
                            <div class="font-tmr font-normal text-base flex space-x-1">
                                <p class="whitespace-nowrap w-32">NIM</p>
                                <p> : </p>
                                <p>120140019</p>
                            </div>
                            <div class="font-tmr font-medium text-base flex space-x-1">
                                <p class="whitespace-nowrap w-32">Judul Tugas Akhir</p>
                                <p>:</p>
                                <p class="w-10/12">RANCANG BANGUN SISTEM INFORMASI PENILAIAN DAN BERITA
                                    ACARA PENILAIAN TUGAS AKHIR BERBASIS WEB MENGGUNAKAN METODE
                                    DSDM (Studi Kasus : Prodi Teknik Informatika ITERA)</p>
                            </div>
                        </div>
                        <div class="flex flex-col font-tmr mt-2 font-normal text-base">
                            <p>Setelah melihat, mendengar dan memperhatikan jalannya Ujian Sidang ** (Proposal/
                                Akhir), maka
                                tim penguji :</p>
                        </div>
                        <div class="ml-12 mt-2">
                            <table class="border border-black w-10/12 font-tmr text-base">
                                <thead>
                                    <tr>
                                        <th class="border border-black">No</th>
                                        <th class="border border-black">Nama</th>
                                        <th class="border border-black">Keterangan</th>
                                        <th class="border border-black">Nilai Angka</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="border border-black text-center font-tmr text-base">1</td>
                                        <td class="border border-black text-center font-tmr text-base">Ilham Firman
                                            Ashari, S.Kom., M.T</td>
                                        <td class="border border-black text-center font-tmr text-base">Pembimbing 1</td>
                                        <td class="border border-black text-center font-tmr text-base"></td>
                                    </tr>
                                    <tr>
                                        <td class="border border-black text-center font-tmr text-base">2</td>
                                        <td class="border border-black text-center font-tmr text-base">Andika Setiawan,
                                            S.Kom., M.Cs</td>
                                        <td class="border border-black text-center font-tmr text-base">Pembimbing 2</td>
                                        <td class="border border-black text-center font-tmr text-base"></td>
                                    </tr>
                                    <tr>
                                        <td class="border border-black text-center font-tmr text-base">3</td>
                                        <td class="border border-black text-center font-tmr text-base">Mugi
                                            Praseptiawan, S.T., M.Kom</td>
                                        <td class="border border-black text-center font-tmr text-base">Penguji 1</td>
                                        <td class="border border-black text-center font-tmr text-base"></td>
                                    </tr>
                                    <tr>
                                        <td class="border border-black text-center font-tmr text-base">4</td>
                                        <td class="border border-black text-center font-tmr text-base">Miranti Verdiana,
                                            M.Si.</td>
                                        <td class="border border-black text-center font-tmr text-base">Penguji 2</td>
                                        <td class="border border-black text-center font-tmr text-base"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="flex flex-col font-tmr mt-2 font-normal text-base">
                            <p>Berdasarkan nilai yang diperoleh, maka diputuskan bahwa mahasiswa tersebut dinyatakan:
                            </p>
                            <p> <span class="font-tmr font-semibold text-base"> LULUS/ TIDAK LULUS </span> dengan nilai :</p>
                            <p>Nilai Huruf : <span class="font-tmr font-semibold text-base"> A / AB / B / BC / C / D / E </span> </p>
                        </div>
                        <div class="mt-4 space-y-1 flex justify-end">
                            <div class="w-fit">
                                <div class="font-tmr text-left text-base">
                                    <p class="font-normal">Lampung Selatan, 2 April 2024</p>
                                    <p class="font-bold">Ketua Sidang Proposal,</p>
                                    <div class="w-[100px] h-[100px]">

                                    </div>
                                    <p class="font-bold"> Ilham Firman Ashari, S.Kom., M.T.
                                    </p>
                                    <p class="font-normal"> NIP. 19930314 201903 1 018
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col font-tmr mt-2 font-normal text-xs">
                            <p>( <span class="font-tmr font-semibold"> A </span> = 80 – 100 ; <span class="font-tmr font-semibold"> AB </span> = 75 – 79 ; <span class="font-tmr font-semibold"> B </span> = 70 – 74 ; <span class="font-tmr font-semibold"> BC </span> = 65 – 69 ; <span class="font-tmr font-semibold"> C </span> = 60 – 64)
                            </p>
                            <p class="font-semibold">&bull; ** Coret salah satu</p>
                            <p class="font-semibold">&bull; * Diketik mahasiswa</p>
                        </div>
                    </div>
                    <div class="h-3 mt-5">
                        <img src="{{ url(asset('storage/assets/footer_surat.svg')) }}" alt="">
                    </div>
                </div>
            </div>
            <div class="flex justify-center mt-4">
                <a href="/admin/bap/unduh-bap1"
                    class="bg-gold text-white hover:bg-white hover:ring-2 hover:ring-gold hover:text-gold px-4 py-1 w-fit rounded-[5px] font-poppins text-base">
                    Unduh
                </a>
            </div>
        </div>
    </div>
</x-layout-admin>
