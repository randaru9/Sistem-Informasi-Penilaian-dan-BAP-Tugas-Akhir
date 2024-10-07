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
            'href' => route('penilaian-ubah-nilai', ['id' => request()->query('id')]),
            'title' => 'Ubah Nilai',
        ],
    ];
@endphp

<x-layout-dosen :$breads title="Ubah Nilai">
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
            <form action="{{route('penilaian-ubah-nilai-post', ['id' => request()->query('id')])}}" method="POST" class="w-full">
                @csrf
                <div class="w-full lg:flex gap-x-4">
                    <div class="lg:w-1/3">
                        <label for="penulisan"
                            class="block mb-2 text-sm text-[#000000] font-poppins font-normal">Penulisan Draft Tugas
                            Akhir dan PPT</label>
                        <input type="text" id="penulisan" name="penulisan"
                            class="bg-white border rounded-md border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block p-1 w-full "
                            required value="{{ $data['penilaians'][0]['penulisan_draft_tugas_akhir_dan_ppt'] }}" />
                        @error('penulisan')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="lg:w-1/3">
                        <label for="presentasi"
                            class="block mb-2 text-sm text-[#000000] font-poppins font-normal">Penyajian/Presentasi
                        </label>
                        <input type="text" id="presentasi" name="penyajian"
                            class="bg-white border rounded-md border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block p-1 w-full "
                            required value="{{ $data['penilaians'][0]['penyajian_atau_presentasi'] }}" />
                        @error('penyajian')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="lg:w-1/3">
                        <label for="penguasaan"
                            class="block mb-2 text-sm text-[#000000] font-poppins font-normal">Penguasaan Materi</label>
                        <input type="text" id="penguasaan" name="penguasaan"
                            class="bg-white border rounded-md border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block p-1 w-full "
                            required value="{{ $data['penilaians'][0]['penguasaan_materi'] }}" />
                        @error('penguasaan')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="w-full lg:flex gap-x-4 my-3">
                    <div class="lg:w-1/3">
                        <label for="kemampuan_menjawab"
                            class="block mb-2 text-sm text-[#000000] font-poppins font-normal">Kemampuan
                            Menjawab</label>
                        <input type="text" id="kemampuan_menjawab" name="kemampuan_menjawab"
                            class="bg-white border rounded-md border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block p-1 w-full "
                            required value="{{ $data['penilaians'][0]['kemampuan_menjawab'] }}" />
                        @error('kemampuan_menjawab')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="lg:w-1/3">
                        <label for="etika" class="block mb-2 text-sm text-[#000000] font-poppins font-normal">Etika
                            dan Sopan Santuan</label>
                        <input type="text" id="etika" name="etika"
                            class="bg-white border rounded-md border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block p-1 w-full "
                            required value="{{ $data['penilaians'][0]['etika_dan_sopan_santun'] }}" />
                        @error('etika')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="lg:w-1/3">
                        <label for="bimbingan" class="block mb-2 text-sm text-[#000000] font-poppins font-normal">Nilai
                            Bimbingan</label>
                        <input type="text" id="bimbingan" name="bimbingan"
                            class="bg-white border rounded-md border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block p-1 w-full "
                            value="{{ $data['penilaians'][0]['nilai_bimbingan'] }}" />
                        @error('bimbingan')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="w-full flex flex-col my-4">
                    <label for="tandatangan" class="block mb-2 text-sm text-[#000000] font-poppins font-normal">Tanda
                        Tangan
                    </label>
                    <div class="flex space-x-2">
                        <label for="tandatangan"
                            class="bg-gold text-white hover:bg-white hover:ring-2 hover:ring-gold hover:text-gold px-4 py-1 w-fit rounded-[5px] font-poppins text-base">
                            <input type="file" id="tandatangan" accept=".jpg,.jpeg,.png" name="ttd" class="hidden" />
                            Unggah
                        </label>
                        <p id="files_label" class="font-poppins text-base text-[#B7B7B7]">Unggah tanda tangan</p>
                    </div>
                    <script>
                        document.getElementById('tandatangan').addEventListener('change', function(event) {
                            var fileName = event.target.files[0] ? event.target.files[0].name : 'Unggah tanda tangan';
                            document.getElementById('files_label').textContent = fileName;
                        });
                    </script>
                    @error('ttd')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="w-full flex justify-end gap-x-4 my-3">
                    <button type="submit"
                        class="bg-gold text-white hover:bg-white hover:ring-2 hover:ring-gold hover:text-gold px-4 py-2 w-fit rounded-[5px] font-poppins text-base">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</x-layout-dosen>
