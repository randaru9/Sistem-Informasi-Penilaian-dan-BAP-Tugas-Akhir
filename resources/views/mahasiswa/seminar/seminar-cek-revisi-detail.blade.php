@php
    $breads = [
        [
            'href' => '/mahasiswa/seminar',
            'title' => 'Seminar',
        ],
        [
            'href' => '/mahasiswa/seminar/detail',
            'title' => 'Detail',
        ],
        [
            'href' => '/mahasiswa/seminar/cek-revisi',
            'title' => 'Cek Revisi',
        ],
        [
            'href' => '/mahasiswa/seminar/cek-revisi/detail',
            'title' => 'Detail Revisi',
        ],
    ];
@endphp

<x-layout-mahasiswa :$breads title="Detail Seminar">
    <div class="bg-white ring-2 ring-blue1 rounded-[10px] w-full h-fit lg:overflow-y-auto">
        <div class="p-4">
            <div class="border border-black">
                <div id="revisi_form" class="bg-white h-fit ">
                    <img src="{{ url(asset('storage/assets/header_surat.png')) }}" alt="" class="w-full">
                    <div class="ml-20 mr-10">
                        <div class="font-tmr text-center font-[1000] text-xl">
                            <p class="mt-2 mb-2">
                                FORM 06
                            </p>
                            <p>
                                Form Revisi Sidang Proposal / Akhir
                            </p>
                        </div>
                        <div class="mt-2 space-y-1">
                            <div class="font-tmr font-normal text-base flex space-x-1">
                                <p class="whitespace-nowrap w-16">Nama</p>
                                <p> : </p>
                                <p>Rangga Ndaru Anggoro</p>
                            </div>
                            <div class="font-tmr font-normal text-base flex space-x-1">
                                <p class="whitespace-nowrap w-16">NIM</p>
                                <p> : </p>
                                <p>120140019</p>
                            </div>
                            <div class="font-tmr font-medium text-base flex space-x-1">
                                <p class="whitespace-nowrap w-16">Judul TA</p>
                                <p>:</p>
                                <p class="w-11/12">RANCANG BANGUN SISTEM INFORMASI PENILAIAN DAN BERITA
                                    ACARA PENILAIAN TUGAS AKHIR BERBASIS WEB MENGGUNAKAN METODE
                                    DSDM (Studi Kasus : Prodi Teknik Informatika ITERA)</p>
                            </div>
                        </div>
                        <div class="flex flex-col mt-12 font-tmr font-normal text-base h-[350px]">
                            <p>Bahwa teruji perlu melakukan perbaikan dalam hal : </p>
                            <div class="border border-black w-full p-4 h-full font-tmr font-medium text-base">
                            </div>
                        </div>
                        <div class="mt-4 space-y-1 flex justify-end">
                            <div class="w-fit">
                                <div class="font-tmr text-left text-base">
                                    <p class="font-normal">Lampung Selatan, 2 April 2024</p>
                                    <p class="font-bold">Pembimbing 1</p>
                                    <div class="w-[100px] h-[100px]">

                                    </div>
                                    <p class="font-bold"> Ilham Firman Ashari, S.Kom., M.T.
                                    </p>
                                    <p class="font-normal"> NIP. 19930314 201903 1 018
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="h-12 mt-14">
                        <img src="{{ url(asset('storage/assets/footer_surat.svg')) }}" alt="">
                    </div>
                </div>
            </div>
            <div class="flex justify-center mt-4">
                <a href="/mahasiswa/seminar/cek-revisi/detail/unduh"
                    class="bg-gold text-white hover:bg-white hover:ring-2 hover:ring-gold hover:text-gold px-4 py-1 w-fit rounded-[5px] font-poppins text-base">
                    Unduh
                </a>
            </div>
        </div>
    </div>
</x-layout-mahasiswa>
