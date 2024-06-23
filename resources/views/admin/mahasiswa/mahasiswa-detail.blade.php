@php
    $breads = [
        [
            'href' => '/admin/mahasiswa',
            'title' => 'Mahasiswa',
        ],
        [
            'href' => route('mahasiswa-detail', ['id' => request()->query('id')]),
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
                    {{ $data['nama'] }}
                </p>
            </div>
        </div>
        <div class="w-full px-5 flex py-2 gap-2">
            <div class="w-1/2">
                <label for="nim" class="block mb-2 text-base text-[#000000] font-poppins font-normal">NIM</label>
                <p id="nim" class="text-sm text-[#000000] font-poppins font-normal w-2/3 text-justify">
                    {{ $data['nim'] }}
                </p>
            </div>
        </div>
        <div class="w-full px-5 flex py-2 gap-2">
            <div class="w-1/2">
                <label for="email" class="block mb-2 text-base text-[#000000] font-poppins font-normal">Email</label>
                <p id="email" class="text-sm text-[#000000] font-poppins font-normal w-2/3 text-justify">
                    @if ($data['email'])
                        {{ $data['email'] }}
                    @else
                        -
                    @endif
                </p>
            </div>
        </div>
        <div class="w-full px-5 flex py-2 gap-2">
            <div class="w-1/2">
                <label for="katasandi"
                    class="block mb-2 text-base text-[#000000] font-poppins font-normal">Katasandi</label>
                <a href="{{route('mahasiswa-ubah-katasandi', ['id' => $data['id']])}}"
                    class="bg-gold text-white hover:bg-white hover:ring-2 hover:ring-gold hover:text-gold px-4 py-2 w-fit rounded-[5px] font-poppins text-base">
                    Ubah Katasandi
                </a>
            </div>
        </div>
        <div class="w-full px-5 flex py-2 gap-2">
            <div class="w-1/2">
                <label for="hapus_akun" class="block mb-2 text-base text-[#000000] font-poppins font-normal">Hapus
                    Akun</label>
                <button data-modal-target="konfirmasi_hapus_akun" data-modal-toggle="konfirmasi_hapus_akun"
                    class="bg-gold text-white hover:bg-white hover:ring-2 hover:ring-gold hover:text-gold px-4 py-2 w-fit rounded-[5px] font-poppins text-base">
                    Hapus Akun
                </button>
            </div>
        </div>
    </div>

    <div id="konfirmasi_hapus_akun" tabindex="-1"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow">
                <button type="button"
                    class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                    data-modal-hide="konfirmasi_hapus_akun">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <form class="p-4 md:p-5 text-center" action="">
                    <svg class="mx-auto mb-4 text-gold w-12 h-12" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <h3 class="mb-5 text-lg font-normal text-black">Anda Yakin Ingin Menghapus Akun Ini?</h3>
                    <button data-modal-hide="konfirmasi_hapus_akun" type="submit" 
                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                        Ya, Hapus
                    </button>
                    <button data-modal-hide="konfirmasi_hapus_akun" type="button"
                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">Tidak,
                        Batal</button>
                </form>
            </div>
        </div>
    </div>
</x-layout-admin>
