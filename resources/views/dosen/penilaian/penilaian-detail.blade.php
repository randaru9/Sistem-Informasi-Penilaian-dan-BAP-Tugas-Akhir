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
    ];
@endphp

<x-layout-dosen :$breads title="Detail Penilaian">
    <div class="bg-white ring-2 ring-blue1 rounded-[10px] w-full h-full lg:overflow-y-auto">
        <div class="w-full px-5 flex py-2 gap-2">
            <div class="w-1/2">
                <label for="nama" class="block mb-2 text-base text-[#000000] font-poppins font-normal">Nama
                    Teruji</label>
                <p id="nama" class="text-sm text-[#000000] font-poppins font-normal w-2/3 text-justify">
                    {{ $data['penggunas']['nama'] }}
                </p>
            </div>
            <div class="w-1/2">
                <label for="nim" class="block mb-2 text-base text-[#000000] font-poppins font-normal">NIM
                    Teruji</label>
                <p id="nim" class="text-sm text-[#000000] font-poppins font-normal w-2/3 text-justify">
                    {{ $data['penggunas']['nim'] }}
                </p>
            </div>
        </div>
        <div class="w-full px-5 py-2">
            <div>
                <label for="judul_tugas_akhir"
                    class="block mb-2 text-base text-[#000000] font-poppins font-normal">Judul
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
                    @if (auth()->user()->id == $data['pembimbing_1_id'])
                        Pembimbing 1
                    @elseif(auth()->user()->id == $data['pembimbing_2_id'])
                        Pembimbing 2
                    @elseif(auth()->user()->id == $data['penguji_1_id'])
                        Penguji 1
                    @elseif(auth()->user()->id == $data['penguji_2_id'])
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
            <div class="w-1/2">
                <label for="status_penilaian"
                    class="block mb-2 text-base text-[#000000] font-poppins font-normal">Status
                    Penilaian</label>
                <p id="status_penilaian" class="text-sm text-[#000000] font-poppins font-normal w-2/3 text-justify">
                    @if ($data['count_penilaian'] == 0)
                        Belum Diberikan
                    @else
                        {{ $data['penilaians'][0]['status_penilaians']['keterangan'] }}
                    @endif
                </p>
            </div>
            <div class="w-1/2">
                <label for="status_revisi" class="block mb-2 text-base text-[#000000] font-poppins font-normal">Status
                    Revisi</label>
                <p id="status_revisi" class="text-sm text-[#000000] font-poppins font-normal w-2/3 text-justify">
                    @if ($data['count_revisi'] == 0)
                        Belum Diberikan
                    @else
                        {{ $data['revisis'][0]['status_revisis']['keterangan'] }}
                    @endif
                </p>
            </div>
        </div>
        <div class="w-full px-5 flex py-2 gap-2">
            <div class="w-1/2">
                <label for="berkas_yudisium"
                    class="block mb-2 text-base text-[#000000] font-poppins font-normal">Draft</label>
                <a href="{{ route('penilaian-unduh-draft', ['path' => $data['draft'], 'jenis' => $data['jenis_seminar_id'], 'id' => $data['id']]) }}"
                    id="berkas_yudisium"
                    class="bg-gold text-white hover:bg-white hover:ring-2 hover:ring-gold hover:text-gold px-4 py-1 w-fit rounded-[5px] font-poppins text-base">
                    Unduh
                </a>
            </div>
        </div>
        <div class="w-full px-5 flex justify-end items-center py-2 gap-2">
            @if ($data['count_penilaian'] == 0 || $data['penilaians'][0]['status_penilaian_id'] == 2)
                <a href="{{ route('penilaian-tambah', ['id' => $data['id']]) }}"
                    class="bg-gold text-white hover:bg-white hover:ring-2 hover:ring-gold hover:text-gold px-4 py-2 w-fit rounded-[5px] font-poppins text-base">Beri
                    Nilai</a>
            @elseif($data['count_penilaian'] !== 0 && $data['penilaians'][0]['status_penilaian_id'] !== 2)
                <a href="{{ route('bap-unduh-form-penilaian-dosen', ['id' => $data['penilaians'][0]['id']]) }}"
                    class="bg-gold text-white hover:bg-white hover:ring-2 hover:ring-gold hover:text-gold px-4 py-2 w-fit rounded-[5px] font-poppins text-base">
                    Unduh Form Penilaian
                </a>
                <a href="{{ route('penilaian-cek-nilai', ['id' => $data['id']]) }}"
                    class="bg-gold text-white hover:bg-white hover:ring-2 hover:ring-gold hover:text-gold px-4 py-2 w-fit rounded-[5px] font-poppins text-base">Cek
                    Nilai</a>
            @endif
            @if ($data['count_revisi'] == 0)
                <a href="{{ route('penilaian-revisi-tambah', ['id' => $data['id']]) }}"
                    class="bg-gold text-white hover:bg-white hover:ring-2 hover:ring-gold hover:text-gold px-4 py-2 w-fit rounded-[5px] font-poppins text-base">Beri
                    Revisi</a>
            @else
                <a href="{{ route('penilaian-cek-revisi', ['id' => $data['id']]) }}"
                    class="bg-gold text-white hover:bg-white hover:ring-2 hover:ring-gold hover:text-gold px-4 py-2 w-fit rounded-[5px] font-poppins text-base">Cek
                    Revisi</a>
            @endif
        </div>
    </div>
</x-layout-dosen>
