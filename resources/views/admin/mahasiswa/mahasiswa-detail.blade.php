@php
    $breads = [
        [
            'href' => '/admin/mahasiswa',
            'title' => 'Mahasiswa',
        ],
        [
            'href' => '/admin/mahasiswa/detail',
            'title' => 'Detail',
        ],
    ];
@endphp

<x-layout-admin :$breads title="Detail Akun Mahasiswa">
    <div class="bg-white ring-2 ring-blue1 rounded-[10px] w-full h-full overflow-y-auto">
        <div class="w-full px-5 flex py-2 gap-2">
            <div class="w-1/2">
                <label for="nama" class="block mb-2 text-base text-[#000000] font-poppins font-normal">Nama</label>
                <p id="nama" class="text-sm text-[#000000] font-poppins font-normal w-2/3 text-justify">
                    Rangga Ndaru Anggoro
                </p>
            </div>
        </div>
        <div class="w-full px-5 flex py-2 gap-2">
            <div class="w-1/2">
                <label for="nim" class="block mb-2 text-base text-[#000000] font-poppins font-normal">NIM</label>
                <p id="nim" class="text-sm text-[#000000] font-poppins font-normal w-2/3 text-justify">
                    120140019
                </p>
            </div>
        </div>
        <div class="w-full px-5 flex py-2 gap-2">
            <div class="w-1/2">
                <label for="email" class="block mb-2 text-base text-[#000000] font-poppins font-normal">Email</label>
                <p id="email" class="text-sm text-[#000000] font-poppins font-normal w-2/3 text-justify">
                    Ndaruanggoro123@gmail.com
                </p>
            </div>
        </div>
        <div class="w-full px-5 flex py-2 gap-2">
            <div class="w-1/2">
                <label for="katasandi"
                    class="block mb-2 text-base text-[#000000] font-poppins font-normal">Katasandi</label>
                <a href="/admin/mahasiswa/ubah-katasandi"
                    class="bg-gold text-white hover:bg-white hover:ring-2 hover:ring-gold hover:text-gold px-4 py-2 w-fit rounded-[5px] font-poppins text-base">
                    Ubah Katasandi
                </a>
            </div>
        </div>
    </div>
</x-layout-admin>
