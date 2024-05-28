@php
    $breads = [
        [
            'href' => '/admin/dosen',
            'title' => 'Dosen',
        ],
        [
            'href' => '/admin/dosen/parsing-akun',
            'title' => 'Parsing Akun Dosen',
        ],
    ];
@endphp

<x-layout-admin :$breads title="Parsing Akun Dosen">
    <div class="bg-white ring-2 ring-blue1 rounded-[10px] w-full h-full overflow-y-auto">
        <form action="">
            <div class="w-full px-5 flex py-2 gap-2">
                <div class="w-1/2">
                    <p for="nama" class="block mb-2 text-xl text-[#000000] font-poppins font-bold">Parsing Akun Dosen
                    </p>
                </div>
            </div>
            <div class="w-full px-5 flex py-2 gap-2">
                <div class="w-1/2">
                    <label for="data_dosen" class="block mb-2 text-sm text-[#000000] font-poppins font-normal">Data Dosen
                        (Dalam Format Excel)</label>
                    <div class="flex space-x-2 items-center">
                        <label for="berkas"
                            class="bg-gold text-white hover:bg-white hover:ring-2 hover:ring-gold hover:text-gold px-4 py-1 w-fit rounded-[5px] font-poppins text-base">
                            <input type="file" id="berkas" class="hidden" minlength="9" required />
                            Unggah
                        </label>
                        <p class="font-poppins text-base text-[#B7B7B7]">Unggah data dosen</p>
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
