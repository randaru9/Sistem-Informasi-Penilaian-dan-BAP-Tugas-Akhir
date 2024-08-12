@php
    $breads = [
        [
            'href' => '/mahasiswa/seminar',
            'title' => 'Seminar',
        ],
        [
            'href' => route('seminar-detail', ['id' => $data['seminars']['id']]),
            'title' => 'Detail',
        ],
        [
            'href' => route('seminar-cek-revisi', ['id' => $data['seminars']['id']]),
            'title' => 'Cek Revisi',
        ],
        [
            'href' => route('seminar-cek-revisi-detail', ['id' => $data['seminars']['id']]),
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
                                <p>{{ $data['seminars']['penggunas']['nama'] }}
                                <p>
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
                                        $data['seminars']['tanggal'] = date(
                                            'd-m-Y',
                                            strtotime($data['seminars']['tanggal']),
                                        );
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
                                    <p class="font-normal"> NIP. {{ $data['penggunas']['nip'] }}</p>
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
                <a href="{{route('seminar-form-revisi', ['id' => request()->query('id')])}}"
                    class="bg-gold text-white hover:bg-white hover:ring-2 hover:ring-gold hover:text-gold px-4 py-1 w-fit rounded-[5px] font-poppins text-base">
                    Unduh
                </a>
            </div>
        </div>
    </div>
</x-layout-mahasiswa>
