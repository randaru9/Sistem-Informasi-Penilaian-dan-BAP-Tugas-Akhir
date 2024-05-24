@php
    $breads = [
        [
            'href' => '/dosen/bap',
            'title' => 'BAP',
        ],
        [
            'href' => '/dosen/tambah-tanda-tangan',
            'title' => 'Beri Tanda Tangan',
        ],
    ];
@endphp

<x-layout-dosen :$breads title="Beri Tanda Tangan">
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
                            <p>Pada hari Selasa tanggal 2 April tahun 2024 Pukul 11.00 - 12.00 telah dilaksanakan
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
                            <p>LULUS/ TIDAK LULUS dengan nilai :</p>
                            <p>Nilai Huruf : A / AB / B / BC / C / D / E </p>
                        </div>
                        {{-- <div class="flex flex-col mt-12 font-tmr font-normal text-base h-[350px]">
                            <p>Bahwa teruji perlu melakukan perbaikan dalam hal : </p>
                            <div class="border border-black w-full p-4 h-full font-tmr font-medium text-base">
                            </div>
                        </div> --}}
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
                            <p>(A = 80 – 100 ; AB = 75 – 79 ; B = 70 – 74 ; BC = 65 – 69 ; C = 60 – 64)
                            </p>
                            <p>** Coret salah satu</p>
                            <p>* Diketik mahasiswa</p>
                        </div>
                    </div>
                    <img src="{{ url(asset('storage/assets/footer_surat.png')) }}" alt="">
                </div>
            </div>
            <div class="flex justify-center mt-4">
                <a href="/dosen/bap/unduh"
                    class="bg-gold text-white hover:bg-white hover:ring-2 hover:ring-gold hover:text-gold px-4 py-1 w-fit rounded-[5px] font-poppins text-base">
                    Unduh
                </a>
            </div>
        </div>
    </div>
    <script>
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>
</x-layout-dosen>
