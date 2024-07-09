@php
    $breads = [
        [
            'href' => '/admin/bap',
            'title' => 'BAP',
        ],
        [
            'href' => route('bap-detail', ['id' => $data['seminars']['id']]),
            'title' => 'Detail',
        ],
        [
            'href' => route('bap-detail-proses', ['id' => $data['seminars']['id']]),
            'title' => 'Detail Proses',
        ],
        [
            'href' => route('bap-form-penilaian', ['id' => request()->query('id')]),
            'title' => 'Lihat Form Penilaian',
        ],
    ];
@endphp

<x-layout-admin :$breads title="Form Penilaian">
    <div class="bg-white ring-2 ring-blue1 rounded-[10px] w-full h-fit lg:overflow-y-auto">
        <div class="p-4">
            <div class="border border-black">
                <div id="revisi_form" class="bg-white h-fit ">
                    <img src="{{ url(asset('storage/assets/header_surat.png')) }}" alt="" class="w-full">
                    <div class="ml-20 mr-10">
                        <div class="font-tmr text-center font-[1000] text-xl">
                            <p class="my-2">
                                FORM 05
                            </p>
                            @if ($data['seminars']['jenis_seminar_id'] == 1)
                                <p class="mb-2">
                                    FORM PENILAIAN SIDANG (PROPOSAL/<s>AKHIR</s>)
                                </p>
                            @else
                                <p class="mb-2">
                                    FORM PENILAIAN SIDANG (<s>PROPOSAL</s>/AKHIR)
                                </p>
                            @endif
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
                                <p>{{ $data['seminars']['penggunas']['nama'] }}</p>
                            </div>
                            <div class="font-tmr font-normal text-base flex space-x-1">
                                <p class="whitespace-nowrap w-32">NIM</p>
                                <p> : </p>
                                <p>{{ $data['seminars']['penggunas']['nim'] }}</p>
                            </div>
                            <div class="font-tmr font-medium text-base flex space-x-1">
                                <p class="whitespace-nowrap w-32">Judul Tugas Akhir</p>
                                <p>:</p>
                                <p class="w-10/12">{{ $data['seminars']['judul'] }}</p>
                            </div>
                        </div>
                        <div class=" mt-2">
                            <table class="border border-black w-full font-tmr text-base">
                                <thead>
                                    <tr>
                                        <th class="border border-black p-2">No</th>
                                        <th class="border border-black p-2">Poin Penilaian</th>
                                        <th class="border border-black p-2">Nilai Angka</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="border border-black p-2 text-center font-tmr text-base">1</td>
                                        <td class="border border-black p-2 text-center font-tmr text-base">Penulisan
                                            Draft Tugas Akhir dan PPT
                                        </td>
                                        <td class="border border-black p-2 text-center font-tmr text-base">
                                            {{ $data['penulisan_draft_tugas_akhir_dan_ppt'] }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border border-black p-2 text-center font-tmr text-base">2</td>
                                        <td class="border border-black p-2 text-center font-tmr text-base">
                                            Penyajian/Presentasi</td>
                                        <td class="border border-black p-2 text-center font-tmr text-base">
                                            {{ $data['penyajian_atau_presentasi'] }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border border-black p-2 text-center font-tmr text-base">3</td>
                                        <td class="border border-black p-2 text-center font-tmr text-base">Penguasaan
                                            Materi
                                        </td>
                                        <td class="border border-black p-2 text-center font-tmr text-base">
                                            {{ $data['penguasaan_materi'] }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border border-black p-2 text-center font-tmr text-base">4</td>
                                        <td class="border border-black p-2 text-center font-tmr text-base">Kemampuan
                                            Menjawab</td>
                                        <td class="border border-black p-2 text-center font-tmr text-base">
                                            {{ $data['kemampuan_menjawab'] }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border border-black p-2 text-center font-tmr text-base">5</td>
                                        <td class="border border-black p-2 text-center font-tmr text-base">Etika dan
                                            Sopan Santuan</td>
                                        <td class="border border-black p-2 text-center font-tmr text-base">
                                            {{ $data['etika_dan_sopan_santun'] }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border border-black p-2 text-center font-tmr text-base">6</td>
                                        <td class="border border-black p-2 text-center font-tmr text-base">Nilai
                                            Bimbingan</td>
                                        <td class="border border-black p-2 text-center font-tmr text-base">
                                            {{ $data['nilai_bimbingan'] }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border border-black p-2 text-center font-tmr text-base font-semibold"
                                            colspan="2">Total</td>
                                        <td class="border border-black p-2 text-center font-tmr text-base">
                                            @php
                                                $total =
                                                    $data['penulisan_draft_tugas_akhir_dan_ppt'] +
                                                    $data['penyajian_atau_presentasi'] +
                                                    $data['penguasaan_materi'] +
                                                    $data['kemampuan_menjawab'] +
                                                    $data['etika_dan_sopan_santun'] +
                                                    $data['nilai_bimbingan'];
                                            @endphp
                                            {{ $total }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border border-black p-2 text-center font-tmr text-base font-semibold"
                                            colspan="2">Rata-rata</td>
                                        <td class="border border-black p-2 text-center font-tmr text-base">
                                            @php
                                                $average = $total / 6;
                                                if ($data['nilai_bimbingan'] === 0) {
                                                    $average = $total / 5;
                                                }
                                                $average = number_format($average, 2, '.', '');
                                            @endphp
                                            {{ $average }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-4 space-y-1 flex justify-end">
                            <div class="w-fit">
                                <div class="font-tmr text-left text-base">
                                    @php
                                        $data['created_at'] = date('d-m-Y', strtotime($data['created_at']));
                                    @endphp
                                    <p class="font-normal">Lampung Selatan, {{ $data['created_at'] }}</p>
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
                    <div class="h-3 mt-5">
                        <img src="{{ url(asset('storage/assets/footer_surat.svg')) }}" alt="">
                    </div>
                </div>
            </div>
            <div class="flex justify-center mt-4">
                <a href="{{route('bap-unduh-form-penilaian', ['id' => request()->query('id')])}}"
                    class="bg-gold text-white hover:bg-white hover:ring-2 hover:ring-gold hover:text-gold px-4 py-1 w-fit rounded-[5px] font-poppins text-base">
                    Unduh
                </a>
            </div>
        </div>
    </div>
</x-layout-admin>
