@php
    $breads = [
        [
            'href' => '/mahasiswa/seminar',
            'title' => 'Seminar',
        ],
        [
            'href' => '/mahasiswa/seminar/tambah',
            'title' => 'Tambah',
        ],
    ];
@endphp

<x-layout-mahasiswa :$breads title="Tambah Seminar">
    <div class="bg-white ring-2 ring-blue1 rounded-[10px] w-full h-full overflow-y-auto">
        <form action="{{ route('seminar-tambah-post') }}" method="POST" enctype="multipart/form-data">
            <div class="w-full px-5 py-2">
                <div>
                    <label for="judul_tugas_akhir"
                        class="block mb-2 text-sm text-[#000000] font-poppins font-normal">Judul
                        Tugas Akhir</label>
                    <input type="text" id="judul_tugas_akhir" name="judul"
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
                        <option disabled selected hidden> Pilih Pembimbing 1 </option>
                        @foreach ($dosen as $item)
                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                        @endforeach
                    </select>
                    @error('pembimbing1')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="w-1/2">
                    <label for="pembimbing2"
                        class="block mb-2 text-sm text-[#000000] font-poppins font-normal">Pembimbing
                        2</label>
                    <select
                        class="bg-white border rounded-md border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block p-1 w-full"
                        name="pembimbing2" id="pembimbing2">
                        <option disabled selected hidden> Pilih Pembimbing 2 </option>
                        @foreach ($dosen as $item)
                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
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
                        <option disabled selected hidden> Pilih Penguji 1 </option>
                        @foreach ($dosen as $item)
                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
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
                        <option disabled selected hidden> Pilih Penguji 2 </option>
                        @foreach ($dosen as $item)
                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
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
                        <option disabled selected hidden> Pilih Pimpinan Sidang </option>
                        @foreach ($dosen as $item)
                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                        @endforeach
                    </select>
                    @error('pimpinan')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="w-1/2">
                    <label for="jenis_sidang" class="block mb-2 text-sm text-[#000000] font-poppins font-normal">Jenis
                        Sidang</label>
                    <select
                        class="bg-white border rounded-md border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block p-1 w-full"
                        name="jenis" id="jenis_sidang">
                        <option disabled selected hidden> Pilih Jenis Sidang </option>
                        @foreach ($jenis as $item)
                            <option value="{{ $item->id }}">{{ $item->keterangan }}</option>
                        @endforeach
                    </select>
                    @error('jenis')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="w-full px-5 flex py-2 gap-2">
                <div class="w-1/2">
                    <label for="tanggal_seminar"
                        class="block mb-2 text-sm text-[#000000] font-poppins font-normal">Tanggal Sidang</label>
                    <input type="date" id="tanggal_seminar" name="tanggal"
                        class="bg-white border rounded-md border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block p-1 w-full "
                        minlength="9" required />
                    @error('tanggal')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="w-1/2">
                    <label for="waktu_seminar" class="block mb-2 text-sm text-[#000000] font-poppins font-normal">Waktu
                        Sidang</label>
                    <input type="time" id="waktu_seminar" name="waktu"
                        class="bg-white border rounded-md border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block p-1 w-full "
                        minlength="9" required />
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
                        <label for="draft_seminar"
                            class="bg-gold text-white hover:bg-white hover:ring-2 hover:ring-gold hover:text-gold px-4 py-1 w-fit rounded-[5px] font-poppins text-base">
                            <input type="file" accept=".zip,.rar" name="draft" id="draft_seminar" class="hidden"
                                />
                            Unggah
                        </label>
                        <p class="font-poppins text-base text-[#B7B7B7]">Unggah draft</p>
                    </div>
                    @error('draft')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="w-full px-5 flex justify-end items-center py-2 gap-2">
                <button type="submit"
                    class="bg-gold text-white hover:bg-white hover:ring-2 hover:ring-gold hover:text-gold px-4 py-2 w-fit rounded-[5px] font-poppins text-base">Simpan</button>
            </div>
        </form>
    </div>
</x-layout-mahasiswa>
