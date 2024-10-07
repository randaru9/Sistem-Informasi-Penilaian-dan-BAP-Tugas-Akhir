@php
    $breads = [
        [
            'href' => '/admin/bap',
            'title' => 'BAP',
        ],
        [
            'href' => route('bap-detail', ['id' => request()->query('id')]),
            'title' => 'Detail',
        ],
        [
            'href' => '/admin/bap/lihat-bap2',
            'title' => 'Lihat BAP 2',
        ],
    ];
@endphp

<x-layout-admin :$breads title="Lihat BAP 2">
    <div class="bg-white ring-2 ring-blue1 rounded-[10px] w-full h-fit lg:overflow-y-auto">
        <div class="p-4">
            <div class="border border-black">
                <div id="revisi_form" class="bg-white h-fit ">
                    <img src="{{ url(asset('storage/assets/header_surat.png')) }}" alt="" class="w-full">
                    <div class="ml-20 mr-10">
                        <div class="font-tmr text-center font-[1000] text-xl">
                            <p class="my-2">
                                FORM 04 - (BAP 2)
                            </p>
                            @if ($collection['jenis_seminar_id'] == 1)
                                <p class="mb-2">
                                    BERITA ACARA SIDANG (PROPOSAL/<s>AKHIR</s>)
                                </p>
                            @else
                                <p class="mb-2">
                                    BERITA ACARA SIDANG (<s>PROPOSAL</s>/AKHIR)
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
                        <div class="flex flex-col mt-2 font-tmr font-normal text-base">
                            @php
                                $formattedDay = Carbon\Carbon::parse($collection['tanggal'])->translatedFormat('l');
                                $formattedDate = Carbon\Carbon::parse($collection['tanggal'])->translatedFormat('j F');
                                $formattedYear = Carbon\Carbon::parse($collection['tanggal'])->translatedFormat('Y');
                                $waktuSelesai = Carbon\Carbon::parse($collection['waktu'])
                                    ->addHour()
                                    ->format('H.i');
                                $collection['waktu'] = date('H.i', strtotime($collection['waktu']));
                            @endphp
                            <p>Pada hari <span class="font-tmr font-semibold text-base"> {{ $formattedDay }} tanggal
                                    {{ $formattedDate }} </span>
                                tahun {{ $formattedYear }} Pukul <span class="font-tmr font-semibold text-base">
                                    {{ $collection['waktu'] }} - {{ $waktuSelesai }} </span>
                                telah dilaksanakan
                                Ujian Sidang
                                @if ($collection['jenis_seminar_id'] == 1)
                                    (**Proposal/ <s>Akhir</s>)
                                @else
                                    (** <s>Proposal</s>/Akhir)
                                @endif
                                mahasiswa:
                            </p>
                        </div>
                        <div class="my-2 space-y-1">
                            <div class="font-tmr font-normal text-base flex space-x-1">
                                <p class="whitespace-nowrap w-32">Nama</p>
                                <p> : </p>
                                <p>{{ $collection['penggunas']['nama'] }}</p>
                            </div>
                            <div class="font-tmr font-normal text-base flex space-x-1">
                                <p class="whitespace-nowrap w-32">NIM</p>
                                <p> : </p>
                                <p>{{ $collection['penggunas']['nim'] }}</p>
                            </div>
                            <div class="font-tmr font-medium text-base flex space-x-1">
                                <p class="whitespace-nowrap w-32">Judul Tugas Akhir</p>
                                <p>:</p>
                                <p>{{ $collection['judul'] }}</p>
                            </div>
                        </div>
                        <div class="flex flex-col font-tmr mt-2 font-normal text-base">
                            <p>Setelah melihat, mendengar dan memperhatikan jalannya Ujian Sidang @if ($collection['jenis_seminar_id'] == 1)
                                    ** (Proposal/ <s>Akhir</s>)
                                @else
                                    ** (<s>Proposal</s>/Akhir)
                                @endif, maka
                                tim penguji :</p>
                        </div>
                        <div class="ml-12 mt-2">
                            <table class="border border-black w-10/12 font-tmr text-base">
                                <thead>
                                    <tr>
                                        <th class="border border-black">No</th>
                                        <th class="border border-black">Nama</th>
                                        <th class="border border-black">Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="border border-black text-center font-tmr text-base">1</td>
                                        <td class="border border-black text-center font-tmr text-base">
                                            {{ $collection['pembimbing1s']['nama'] }}</td>
                                        </td>
                                        <td class="border border-black text-center font-tmr text-base">Pembimbing 1</td>
                                    </tr>
                                    <tr>
                                        <td class="border border-black text-center font-tmr text-base">2</td>
                                        <td class="border border-black text-center font-tmr text-base">
                                            {{ $collection['pembimbing2s']['nama'] }}</td>
                                        </td>
                                        <td class="border border-black text-center font-tmr text-base">Pembimbing 2</td>
                                    </tr>
                                    <tr>
                                        <td class="border border-black text-center font-tmr text-base">3</td>
                                        <td class="border border-black text-center font-tmr text-base">
                                            {{ $collection['penguji1s']['nama'] }}</td>
                                        </td>
                                        <td class="border border-black text-center font-tmr text-base">Penguji 1</td>
                                    </tr>
                                    <tr>
                                        <td class="border border-black text-center font-tmr text-base">4</td>
                                        <td class="border border-black text-center font-tmr text-base">
                                            {{ $collection['penguji2s']['nama'] }}</td>
                                        </td>
                                        <td class="border border-black text-center font-tmr text-base">Penguji 2</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        @php
                            $avgPembimbing1 =
                                ($collection['penilaian_pembimbing_1']['penulisan_draft_tugas_akhir_dan_ppt'] +
                                    $collection['penilaian_pembimbing_1']['penyajian_atau_presentasi'] +
                                    $collection['penilaian_pembimbing_1']['penguasaan_materi'] +
                                    $collection['penilaian_pembimbing_1']['kemampuan_menjawab'] +
                                    $collection['penilaian_pembimbing_1']['etika_dan_sopan_santun'] +
                                    $collection['penilaian_pembimbing_1']['nilai_bimbingan']) /
                                6;
                            $avgPembimbing1 = number_format($avgPembimbing1, 2, '.', '');

                            $avgPembimbing2 =
                                ($collection['penilaian_pembimbing_2']['penulisan_draft_tugas_akhir_dan_ppt'] +
                                    $collection['penilaian_pembimbing_2']['penyajian_atau_presentasi'] +
                                    $collection['penilaian_pembimbing_2']['penguasaan_materi'] +
                                    $collection['penilaian_pembimbing_2']['kemampuan_menjawab'] +
                                    $collection['penilaian_pembimbing_2']['etika_dan_sopan_santun'] +
                                    $collection['penilaian_pembimbing_2']['nilai_bimbingan']) /
                                6;

                            $avgPembimbing2 = number_format($avgPembimbing2, 2, '.', '');

                            $avgPenguji1 =
                                ($collection['penilaian_penguji_1']['penulisan_draft_tugas_akhir_dan_ppt'] +
                                    $collection['penilaian_penguji_1']['penyajian_atau_presentasi'] +
                                    $collection['penilaian_penguji_1']['penguasaan_materi'] +
                                    $collection['penilaian_penguji_1']['kemampuan_menjawab'] +
                                    $collection['penilaian_penguji_1']['etika_dan_sopan_santun']) /
                                5;

                            $avgPenguji1 = number_format($avgPenguji1, 2, '.', '');

                            $avgPenguji2 =
                                ($collection['penilaian_penguji_2']['penulisan_draft_tugas_akhir_dan_ppt'] +
                                    $collection['penilaian_penguji_2']['penyajian_atau_presentasi'] +
                                    $collection['penilaian_penguji_2']['penguasaan_materi'] +
                                    $collection['penilaian_penguji_2']['kemampuan_menjawab'] +
                                    $collection['penilaian_penguji_2']['etika_dan_sopan_santun']) /
                                5;

                            $avgPenguji2 = number_format($avgPenguji2, 2, '.', '');

                            $avg =
                                ((($avgPembimbing1 + $avgPembimbing2) * 60) / 100 +
                                    (($avgPenguji1 + $avgPenguji2) * 40) / 100) /
                                2;
                        @endphp
                        <div class="flex flex-col font-tmr mt-2 font-normal text-base">
                            <p>Berdasarkan nilai yang diperoleh, maka diputuskan bahwa mahasiswa tersebut dinyatakan:
                            </p>
                            <p> <span class="font-tmr font-semibold text-base">
                                    @if ($avg >= 60)
                                        LULUS/ <s>TIDAK LULUS</s>
                                    @else
                                        <s>LULUS</s>/ TIDAK LULUS
                                    @endif
                                </span></p>
                        </div>
                        <div class="mt-4 space-y-1 flex justify-end">
                            <div class="w-fit">
                                <div class="font-tmr text-left text-base">
                                    <p class="font-normal">Lampung Selatan,        </p>
                                    <p class="font-bold">Koordinator Tugas Akhir</p>
                                    <div class="w-[100px] h-[100px]">

                                    </div>
                                    <p class="font-bold"> {{$collection['b_a_p2s']['koordinators']['nama']}}
                                    </p>
                                    <p class="font-normal"> NIP. {{$collection['b_a_p2s']['koordinators']['nip']}}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col font-tmr mt-2 font-normal text-xs">
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
                <a href="{{route('bap-unduh-bap2', ['id' => request()->query('id') ])}}"
                    class="bg-gold text-white hover:bg-white hover:ring-2 hover:ring-gold hover:text-gold px-4 py-1 w-fit rounded-[5px] font-poppins text-base">
                    Unduh
                </a>
            </div>
        </div>
    </div>
</x-layout-admin>
