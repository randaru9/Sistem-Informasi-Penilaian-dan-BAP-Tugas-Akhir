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

<body onload="print()" class="bg-blue1">
    <div id="revisi_form" class="bg-white h-fit ">
        <img src="{{ url(asset('storage/assets/header_surat.png')) }}" alt="" class="w-full">
        <div class="ml-20 mr-10">
            <div class="font-tmr text-center font-[1000] text-xl">
                <p class="mt-2 mb-2">
                    FORM 06
                </p>
                @if ($data['seminars']['jenis_seminar_id'] == 1)
                    <p>
                        Form Revisi Sidang Proposal / <s> Akhir </s>
                    </p>
                @else
                    <p>
                        Form Revisi Sidang <s> Proposal </s> / Akhir
                    </p>
                @endif
            </div>
            <div class="mt-2 space-y-1">
                <div class="font-tmr font-normal text-base flex space-x-1">
                    <p class="whitespace-nowrap w-16">Nama</p>
                    <p> : </p>
                    <p>{{ $data['seminars']['penggunas']['nama'] }}</p>
                </div>
                <div class="font-tmr font-normal text-base flex space-x-1">
                    <p class="whitespace-nowrap w-16">NIM</p>
                    <p> : </p>
                    <p>{{ $data['seminars']['penggunas']['nim'] }}</p>
                </div>
                <div class="font-tmr font-medium text-base flex space-x-1">
                    <p class="whitespace-nowrap w-16">Judul TA</p>
                    <p>:</p>
                    <p class="w-11/12">{{ $data['seminars']['judul'] }}</p>
                </div>
            </div>
            <div class="flex flex-col mt-12 font-tmr font-normal text-base h-[350px]">
                <p>Bahwa teruji perlu melakukan perbaikan dalam hal : </p>
                <div class="border border-black w-full p-4 h-full font-tmr font-medium text-base whitespace-pre-line"><p>{{ $data['keterangan'] }}</p></div>
            </div>
            <div class="mt-4 space-y-1 flex justify-end">
                <div class="w-fit">
                    <div class="font-tmr text-left text-base">
                        @php
                            $data['seminars']['tanggal'] = date('d-m-Y', strtotime($data['seminars']['tanggal']));
                        @endphp
                        <p class="font-normal">Lampung Selatan, {{ $data['seminars']['tanggal'] }}</p>
                        @if ($data['pengguna_id'] == $data['seminars']['pembimbing_1_id'])
                            <p class="font-bold">Pembimbing 1</p>
                        @elseif($data['pengguna_id'] == $data['seminars']['pembimbing_2_id'])
                            <p class="font-bold">Pembimbing 2</p>
                        @elseif($data['pengguna_id'] == $data['seminars']['penguji_1_id'])
                            <p class="font-bold">Penguji 1</p>
                        @elseif($data['pengguna_id'] == $data['seminars']['penguji_2_id'])
                            <p class="font-bold">Penguji 2</p>
                        @endif
                        <div class="w-[100px] h-[100px]">
                        </div>
                        <p class="font-bold"> {{ $data['penggunas']['nama'] }}
                        </p>
                        <p class="font-normal"> NIP. {{ $data['penggunas']['nip'] }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-14">
            <img src="{{ url(asset('storage/assets/footer_surat.svg')) }}" alt="">
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>

</html>
