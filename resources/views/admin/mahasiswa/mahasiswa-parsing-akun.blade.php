@php
    $breads = [
        [
            'href' => '/admin/mahasiswa',
            'title' => 'Mahasiswa',
        ],
        [
            'href' => '/admin/mahasiswa/parsing-akun',
            'title' => 'Parsing Akun Mahasiswa',
        ],
    ];
@endphp

<x-layout-admin :$breads title="Parsing Akun Mahasiswa">
    <div class="bg-white ring-2 ring-blue1 rounded-[10px] w-full h-full overflow-y-auto">
        <form action="{{route('mahasiswa-parsing-akun-post')}}" method="POST" enctype="multipart/form-data">
            <div class="w-full px-5 flex py-2 gap-2">
                <div class="w-1/2">
                    <p for="nama" class="block mb-2 text-xl text-[#000000] font-poppins font-bold">Parsing Akun Mahasiswa
                    </p>
                </div>
            </div>
            <div class="w-full px-5 flex py-2 gap-2">
                <div class="w-1/2">
                    <label for="berkas" class="block mb-2 text-sm text-[#000000] font-poppins font-normal">Data Mahasiswa
                        (Dalam Format Excel)</label>
                    <div class="flex space-x-2 items-center">
                        <label for="berkas"
                            class="bg-gold text-white hover:bg-white hover:ring-2 hover:ring-gold hover:text-gold px-4 py-1 w-fit rounded-[5px] font-poppins text-base">
                            <input type="file" id="berkas" accept=".xls,.xlsx" name="file" class="hidden"/>
                            Unggah
                        </label>
                        <p id="files_label" class="font-poppins text-base text-[#B7B7B7]">Unggah data mahasiswa</p>
                        <script>
                            document.getElementById('berkas').addEventListener('change', function(event) {
                                var fileName = event.target.files[0] ? event.target.files[0].name : 'Unggah draft';
                                document.getElementById('files_label').textContent = fileName;
                            });
                        </script>
                        @error('file')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="w-full px-5 flex justify-end items-center py-2 gap-2">
                <button type="submit"
                    class="bg-gold text-white hover:bg-white hover:ring-2 hover:ring-gold hover:text-gold px-4 py-2 w-fit rounded-[5px] font-poppins text-base">Simpan</button>
            </div>
        </form>
    </div>
</x-layout-admin>
