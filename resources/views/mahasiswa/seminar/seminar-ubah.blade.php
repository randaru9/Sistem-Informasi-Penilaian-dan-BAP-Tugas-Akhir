@php
    $breads = [
        [
            'href' => '/mahasiswa/seminar',
            'title' => 'Seminar',
        ],
        [
            'href' => route('seminar-detail', ['id' => request()->query('id')]),
            'title' => 'Detail',
        ],
        [
            'href' => route('seminar-ubah', ['id' => request()->query('id')]),
            'title' => 'Ubah',
        ],
    ];
@endphp

<x-layout-mahasiswa :$breads title="Tambah Seminar">
    <form action="{{ route('seminar-ubah-post', ['id' => request()->query('id')]) }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        <div class="bg-white ring-2 ring-blue1 rounded-[10px] w-full h-full overflow-y-auto">
            <div class="w-full px-5 py-2">
                <div>
                    <label for="judul" class="block mb-2 text-sm text-[#000000] font-poppins font-normal">Judul
                        Tugas Akhir</label>
                    <input type="text" id="judul" name="judul" value="{{ $data['judul'] }}"
                        class="bg-white border rounded-md border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block p-1 w-full "
                        minlength="9" required />
                    @error('judul')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="w-full px-5 flex py-2 gap-2">
                <div class="w-1/2">
                    <label for="pembimbing1"
                        class="block mb-2 text-sm text-[#000000] font-poppins font-normal">Pembimbing
                        1</label>
                    <select
                        class="bg-white border rounded-md border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block p-1 w-full"
                        name="pembimbing1" id="pembimbing1">
                        @foreach ($dosen as $item)
                            <option value="{{ $item->id }}" @selected($item->id == $data['pembimbing_1_id'])>{{ $item->nama }}</option>
                        @endforeach
                    </select>
                    @error('pembimbing1')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="w-1/2">
                    <label for="pembimbing2"
                        class="block mb-2 text-sm text-[#000000] font-poppins font-normal">Pembimbing
                        1</label>
                    <select
                        class="bg-white border rounded-md border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block p-1 w-full"
                        name="pembimbing2" id="pembimbing2">
                        @foreach ($dosen as $item)
                            <option value="{{ $item->id }}" @selected($item->id == $data['pembimbing_2_id'])>{{ $item->nama }}</option>
                        @endforeach
                    </select>
                    @error('pembimbing2')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="w-full px-5 flex py-2 gap-2">
                <div class="w-1/2">
                    <label for="penguji1" class="block mb-2 text-sm text-[#000000] font-poppins font-normal">Penguji
                        1</label>
                    <select
                        class="bg-white border rounded-md border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block p-1 w-full"
                        name="penguji1" id="penguji1">
                        @foreach ($dosen as $item)
                            <option value="{{ $item->id }}" @selected($item->id == $data['penguji_1_id'])>{{ $item->nama }}</option>
                        @endforeach
                    </select>
                    @error('penguji1')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="w-1/2">
                    <label for="penguji2" class="block mb-2 text-sm text-[#000000] font-poppins font-normal">Penguji
                        2</label>
                    <select
                        class="bg-white border rounded-md border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block p-1 w-full"
                        name="penguji2" id="penguji2">
                        @foreach ($dosen as $item)
                            <option value="{{ $item->id }}" @selected($item->id == $data['penguji_2_id'])>{{ $item->nama }}</option>
                        @endforeach
                    </select>
                    @error('penguji2')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="w-full px-5 flex py-2 gap-2">
                <div class="w-1/2">
                    <label for="pimpinan" class="block mb-2 text-sm text-[#000000] font-poppins font-normal">Pimpinan
                        Sidang</label>
                    <select
                        class="bg-white border rounded-md border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block p-1 w-full"
                        name="pimpinan" id="pimpinan">
                        @foreach ($dosen as $item)
                            <option value="{{ $item->id }}" @selected($item->id == $data['pimpinan_sidang_id'])>{{ $item->nama }}</option>
                        @endforeach
                    </select>
                    @error('pembimbing2')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="w-1/2">
                    <label for="jenis" class="block mb-2 text-sm text-[#000000] font-poppins font-normal">Jenis
                        Sidang</label>
                    <select
                        class="bg-white border rounded-md border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block p-1 w-full"
                        name="jenis" id="jenis">
                        @foreach ($jenis as $item)
                            <option value="{{ $item->id }}" @selected($item->id == $data['jenis_seminar_id'])>{{ $item->keterangan }}</option>
                        @endforeach
                    </select>
                    @error('jenis')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="w-full px-5 flex py-2 gap-2">
                <div class="w-1/2">
                    <label for="tanggal" class="block mb-2 text-sm text-[#000000] font-poppins font-normal">Tanggal
                        Sidang</label>
                    @php
                        $date = date_create($data['tanggal']);
                        $data['tanggal'] = date_format($date, 'Y-m-d');
                    @endphp
                    <input type="date" id="tanggal" name="tanggal"
                        class="bg-white border rounded-md border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block p-1 w-full "
                        minlength="9" required value="{{ $data['tanggal'] }}" />
                    @error('tanggal')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="w-1/2">
                    <label for="waktu" class="block mb-2 text-sm text-[#000000] font-poppins font-normal">Waktu
                        Sidang</label>
                    <input type="time" id="waktu" name="waktu"
                        class="bg-white border rounded-md border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block p-1 w-full "
                        value="{{ $data['waktu'] }}" minlength="9" required />
                    @error('waktu')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="w-full px-5 flex py-2 gap-2">
                <div class="flex flex-col w-1/2">
                    <label for="tanggal_seminar"
                        class="block mb-2 text-sm text-[#000000] font-poppins font-normal">Draft
                        Tugas Akhir
                    </label>
                    <div class="flex space-x-2 items-center">
                        <label for="draft"
                            class="bg-gold text-white hover:bg-white hover:ring-2 hover:ring-gold hover:text-gold px-4 py-1 w-fit rounded-[5px] font-poppins text-base">
                            <input type="file" accept=".zip,.rar" id="draft" name="draft" class="hidden" minlength="9" />
                            Unggah
                        </label>
                        <p id="files_label" class="font-poppins text-base text-[#B7B7B7]">Unggah draft</p>
                    </div>
                    <script>
                        document.getElementById('draft').addEventListener('change', function(event) {
                            var fileName = event.target.files[0] ? event.target.files[0].name : 'Unggah draft';
                            document.getElementById('files_label').textContent = fileName;
                        });
                    </script>
                    @error('draft')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="w-full px-5 flex justify-end items-center py-2 gap-2">
                <button type="submit"
                    class="bg-gold text-white hover:bg-white hover:ring-2 hover:ring-gold hover:text-gold px-4 py-2 w-fit rounded-[5px] font-poppins text-base">Simpan</button>
            </div>
        </div>
    </form>
</x-layout-mahasiswa>
