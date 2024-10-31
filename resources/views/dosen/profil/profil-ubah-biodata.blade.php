@php
    $breads = [
        [
            'href' => '/dosen/profil',
            'title' => 'Profil',
        ],
        [
            'href' => '/dosen/profil/ubah-biodata',
            'title' => 'Ubah Biodata',
        ],
    ];
@endphp

<x-layout-dosen :$breads title="Ubah Biodata">
    <div class="bg-white ring-2 ring-blue1 rounded-[10px] w-full h-full overflow-y-auto">
        <form action="{{ route('profil-ubah-biodata-dosen-post') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="w-full px-5 flex py-2 gap-2">
                <div class="w-1/2">
                    <p for="nama" class="block mb-2 text-xl text-[#000000] font-poppins font-bold">Ubah Biodata</p>
                </div>
            </div>
            <div class="w-full px-5 flex py-2 gap-2">
                <div class="w-1/2">
                    <label for="nama"
                        class="block mb-2 text-sm text-[#000000] font-poppins font-normal">Nama</label>
                    <input type="text" id="nama" name="nama"
                        class="bg-white border rounded-md border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block p-1 w-full "
                        "
                        />
                    @error('nama')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="w-full px-5 flex py-2 gap-2">
                <div class="w-1/2">
                    <label for="nip" class="block mb-2 text-sm text-[#000000] font-poppins font-normal">NIP</label>
                    <input type="text" id="nip" name="nip"
                        class="bg-white border rounded-md border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block p-1 w-full "
                        "
                        />
                    @error('nip')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="w-full px-5 flex py-2 gap-2">
                <div class="flex flex-col w-1/2">
                    <label for="ttd" class="block mb-2 text-sm text-[#000000] font-poppins font-normal">Tanda Tangan
                    </label>
                    <div class="flex space-x-2 items-center">
                        <label for="ttd"
                            class="bg-gold text-white hover:bg-white hover:ring-2 hover:ring-gold hover:text-gold px-4 py-1 w-fit rounded-[5px] font-poppins text-base">
                            <input type="file" id="ttd" name="ttd" class="hidden" />
                            Unggah
                        </label>
                        <p id="files_label" class="font-poppins text-base text-[#B7B7B7]">Unggah tanda tangan</p>
                    </div>
                    <script>
                        document.getElementById('ttd').addEventListener('change', function(event) {
                            var fileName = event.target.files[0] ? event.target.files[0].name : 'Unggah draft';
                            document.getElementById('files_label').textContent = fileName;
                        });
                    </script>
                    @error('ttd')
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
</x-layout-dosen>
