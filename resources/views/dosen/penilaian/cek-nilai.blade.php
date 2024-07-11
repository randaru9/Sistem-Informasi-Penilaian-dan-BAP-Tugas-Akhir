@php
    $breads = [
        [
            'href' => '/dosen/penilaian',
            'title' => 'Penilaian',
        ],
        [
            'href' => route('penilaian-detail', ['id' => request()->query('id')]),
            'title' => 'Detail',
        ],
        [
            'href' => route('penilaian-cek-nilai', ['id' => request()->query('id')]),
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
                    {{ $data['penggunas']['nama'] }}
                </p>
            </div>
        </div>
        <div class="w-full px-5 py-2">
            <div>
                <label for="judul_tugas_akhir" class="block mb-2 text-base text-[#000000] font-poppins font-normal">Judul
                    Tugas Akhir</label>
                <p id="judul_tugas_akhir" class="text-sm text-[#000000] font-poppins font-normal w-2/3 text-justify">
                    {{ $data['judul'] }}
                </p>
            </div>
        </div>
        <div class="w-full px-5 flex py-2 gap-2">
            <div class="w-1/2">
                <label for="tanggal_sidang" class="block mb-2 text-base text-[#000000] font-poppins font-normal">Tanggal
                    Sidang</label>
                <p id="tanggal_sidang" class="text-sm text-[#000000] font-poppins font-normal w-2/3 text-justify">
                    @php
                        $data['tanggal'] = date('d-m-Y', strtotime($data['tanggal']));
                    @endphp
                    {{ $data['tanggal'] }}
                </p>
            </div>
            <div class="w-1/2">
                <label for="waktu_sidang" class="block mb-2 text-base text-[#000000] font-poppins font-normal">Waktu
                    Sidang</label>
                <p id="waktu_sidang" class="text-sm text-[#000000] font-poppins font-normal w-2/3 text-justify">
                    @php
                        $data['waktu'] = date('H:i', strtotime($data['waktu']));
                    @endphp
                    {{ $data['waktu'] }}
                </p>
            </div>
        </div>
        <div class="w-full px-5 flex py-2 gap-2">
            <div class="w-1/2">
                <label for="posisi" class="block mb-2 text-base text-[#000000] font-poppins font-normal">Posisi Dalam
                    Sidang</label>
                <p id="posisi" class="text-sm text-[#000000] font-poppins font-normal w-2/3 text-justify">
                    @if (auth()->user()->id === $data['pembimbing_1_id'])
                        Pembimbing 1
                    @elseif(auth()->user()->id === $data['pembimbing_2_id'])
                        Pembimbing 2
                    @elseif(auth()->user()->id === $data['penguji_1_id'])
                        Penguji 1
                    @elseif(auth()->user()->id === $data['penguji_2_id'])
                        Penguji 2
                    @endif
                </p>
            </div>
            <div class="w-1/2">
                <label for="jenis_sidang" class="block mb-2 text-base text-[#000000] font-poppins font-normal">Jenis
                    Sidang</label>
                <p id="jenis_sidang" class="text-sm text-[#000000] font-poppins font-normal w-2/3 text-justify">
                    {{ $data['jenis_seminars']['keterangan'] }}
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
                            {{ $data['penilaians'][0]['penulisan_draft_tugas_akhir_dan_ppt'] }}
                        </p>
                    </div>
                    <div class="lg:w-1/3">
                        <label for="presentasi"
                            class="block lg:mb-2 text-sm text-[#000000] font-poppins font-normal">Penyajian/Presentasi
                        </label>
                        <p id="presentasi" class="text-sm text-[#000000] font-poppins font-normal w-2/3 text-justify">
                            {{ $data['penilaians'][0]['penyajian_atau_presentasi'] }}
                        </p>
                    </div>
                    <div class="lg:w-1/3">
                        <label for="penguasaan"
                            class="block lg:mb-2 text-sm text-[#000000] font-poppins font-normal">Penguasaan
                            Materi</label>
                        <p id="penguasaan" class="text-sm text-[#000000] font-poppins font-normal w-2/3 text-justify">
                            {{ $data['penilaians'][0]['penguasaan_materi'] }}
                        </p>
                    </div>
                </div>
                <div class="w-full lg:flex gap-x-4 lg:my-3">
                    <div class="lg:w-1/3">
                        <label for="kemampuan_menjawab"
                            class="block lg:mb-2 text-sm text-[#000000] font-poppins font-normal">Kemampuan
                            Menjawab</label>
                        <p id="kemampuan_menjawab"
                            class="text-sm text-[#000000] font-poppins font-normal w-2/3 text-justify">
                            {{ $data['penilaians'][0]['kemampuan_menjawab'] }}
                        </p>
                    </div>
                    <div class="lg:w-1/3">
                        <label for="etika"
                            class="block lg:mb-2 text-sm text-[#000000] font-poppins font-normal">Etika
                            dan Sopan Santuan</label>
                        <p id="etika" class="text-sm text-[#000000] font-poppins font-normal w-2/3 text-justify">
                            {{ $data['penilaians'][0]['etika_dan_sopan_santun'] }}
                        </p>
                    </div>
                    <div class="lg:w-1/3">
                        <label for="bimbingan"
                            class="block lg:mb-2 text-sm text-[#000000] font-poppins font-normal">Nilai
                            Bimbingan</label>
                        <p id="bimbinga" class="text-sm text-[#000000] font-poppins font-normal w-2/3 text-justify">
                            {{ $data['penilaians'][0]['nilai_bimbingan'] }}
                        </p>
                    </div>
                </div>
                <div class="w-full flex flex-col lg:my-3">
                    <label for="tandatangan" class="block lg:mb-2 text-sm text-[#000000] font-poppins font-normal">Tanda
                        Tangan
                    </label>
                    <a href="{{ route('penilaian-unduh-ttd', ['path' => $data['penilaians'][0]['ttd'], 'id' => $data['id'], 'jenis' => $data['jenis_seminar_id']]) }}"
                        id="ttd"
                        class="bg-gold text-white hover:bg-white hover:ring-2 hover:ring-gold hover:text-gold px-4 py-1 w-fit rounded-[5px] font-poppins text-base">
                        Unduh
                    </a>
                </div>
                <div class="w-full flex justify-end gap-x-4 my-3">
                    <a href="{{ route('penilaian-ubah-nilai', ['id' => $data['id']]) }}"
                        class="bg-gold text-white hover:bg-white hover:ring-2 hover:ring-gold hover:text-gold px-4 py-2 w-fit rounded-[5px] font-poppins text-base">Ubah</a>
                </div>
            </div>
        </div>
    </div>
</x-layout-dosen>
