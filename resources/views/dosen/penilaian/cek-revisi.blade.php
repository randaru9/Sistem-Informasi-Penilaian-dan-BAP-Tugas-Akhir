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
            'href' => route('penilaian-cek-revisi', ['id' => request()->query('id')]),
            'title' => 'Cek Revisi',
        ],
    ];
@endphp

<x-layout-dosen :$breads title="Cek Revisi">
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
            <form action="{{route('penilaian-ubah-status-revisi-post', ['id' => request()->query('id')])}}"  method="POST" class="w-full">
                @csrf
                <div class="w-2/3 flex flex-col">
                    <label for="revisi" class="block mb-2 text-sm text-[#000000] font-poppins font-normal">Revisi :
                    </label>
                    <p id="revisi" class="text-sm rounded-md border border-gray-300 text-[#000000] font-poppins font-normal whitespace-pre-line p-3 h-28 overflow-y-auto">{{ $data['revisis'][0]['keterangan'] }}
                    </p>
                </div>
                <div class="w-full flex justify-end gap-x-4 my-3">
                    <a href="{{ route('penilaian-ubah-revisi', ['id' => $data['id']]) }}"
                        class="bg-gold text-white hover:bg-white hover:ring-2 hover:ring-gold hover:text-gold px-4 py-2 w-fit rounded-[5px] font-poppins text-base">Ubah</a>
                    <button type="submit"
                        class="bg-gold text-white hover:bg-white hover:ring-2 hover:ring-gold hover:text-gold px-4 py-2 w-fit rounded-[5px] font-poppins text-base">Tandai
                        Selesai</button>
                </div>
            </form>
        </div>
    </div>
</x-layout-dosen>
