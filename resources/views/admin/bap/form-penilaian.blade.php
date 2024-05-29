<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <title>Form Revisi</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        gold: "#C5A127",
                        blue1: "#2392EC",
                        blue2: "#DCEEFC"
                    },
                    fontFamily: {
                        poppins: ["Poppins", "sans-serif"],
                        tmr: ["Times New Roman", "Times", "serif"]
                    },
                }
            }
        }
    </script>
</head>

<body onload="print()">
        <div id="revisi_form" class="bg-white h-fit ">
            <img src="{{ url(asset('storage/assets/header_surat.png')) }}" alt="" class="w-full">
            <div class="ml-20 mr-10">
                <div class="font-tmr text-center font-[1000] text-xl">
                    <p class="my-2">
                        FORM 05
                    </p>
                    <p class="mb-2">
                        FORM PENILAIAN SIDANG (PROPOSAL/AKHIR)
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
                <div class=" mt-2">
                    <table class="border border-black w-full font-tmr text-base">
                        <thead>
                            <tr >
                                <th class="border border-black p-2">No</th>
                                <th class="border border-black p-2">Poin Penilaian</th>
                                <th class="border border-black p-2">Nilai Angka</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border border-black p-2 text-center font-tmr text-base">1</td>
                                <td class="border border-black p-2 text-center font-tmr text-base">Penulisan Draft Tugas Akhir dan PPT
                                </td>
                                <td class="border border-black p-2 text-center font-tmr text-base"></td>
                            </tr>
                            <tr>
                                <td class="border border-black p-2 text-center font-tmr text-base">2</td>
                                <td class="border border-black p-2 text-center font-tmr text-base">Penyajian/Presentasi</td>
                                <td class="border border-black p-2 text-center font-tmr text-base"></td>
                            </tr>
                            <tr>
                                <td class="border border-black p-2 text-center font-tmr text-base">3</td>
                                <td class="border border-black p-2 text-center font-tmr text-base">Penguasaan Materi
                                </td>
                                <td class="border border-black p-2 text-center font-tmr text-base"></td>
                            </tr>
                            <tr>
                                <td class="border border-black p-2 text-center font-tmr text-base">4</td>
                                <td class="border border-black p-2 text-center font-tmr text-base">Kemampuan Menjawab</td>
                                <td class="border border-black p-2 text-center font-tmr text-base"></td>
                            </tr>
                            <tr>
                                <td class="border border-black p-2 text-center font-tmr text-base">5</td>
                                <td class="border border-black p-2 text-center font-tmr text-base">Etika dan Sopan Santuan</td>
                                <td class="border border-black p-2 text-center font-tmr text-base"></td>
                            </tr>
                            <tr>
                                <td class="border border-black p-2 text-center font-tmr text-base">6</td>
                                <td class="border border-black p-2 text-center font-tmr text-base">Nilai Bimbingan</td>
                                <td class="border border-black p-2 text-center font-tmr text-base"></td>
                            </tr>
                            <tr>
                                <td class="border border-black p-2 text-center font-tmr text-base font-semibold" colspan="2">Total</td>
                                <td class="border border-black p-2 text-center font-tmr text-base"></td>
                            </tr>
                            <tr>
                                <td class="border border-black p-2 text-center font-tmr text-base font-semibold" colspan="2">Rata-rata</td>
                                <td class="border border-black p-2 text-center font-tmr text-base"></td>
                            </tr>
                        </tbody>
                    </table>
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
            </div>
            <div class="h-3 mt-5">
                <img src="{{ url(asset('storage/assets/footer_surat.svg')) }}" alt="">
            </div>
        </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>
</html>
