@php
    $breads = [
        [
            'href' => '/admin/dosen',
            'title' => 'Dosen',
        ],
        [
            'href' => route('dosen-detail', ['id' => request()->query('id')]),
            'title' => 'Detail',
        ],
        [
            'href' => route('dosen-ubah-katasandi', ['id' => request()->query('id')]),
            'title' => 'Ubah Katasandi',
        ],
    ];
@endphp

<x-layout-admin :$breads title="Ubah Katasandi">
    <div class="bg-white ring-2 ring-blue1 rounded-[10px] w-full h-full overflow-y-auto">
        <form action="{{ route('dosen-ubah-katasandi-post', ['id' => request()->query('id')]) }}" method="POST">
            @csrf
            <div class="w-full px-5 flex py-2 gap-2">
                <div class="w-1/2">
                    <p for="nama" class="block mb-2 text-xl text-[#000000] font-poppins font-bold">Ubah Katasandi</p>
                </div>
            </div>
            <div class="w-full px-5 flex py-2 gap-2">
                <div class="w-1/2">
                    <label for="katasandi"
                        class="block mb-2 text-sm text-[#000000] font-poppins font-normal">Katasandi</label>
                    <input type="password" id="katasandi" name="katasandi"
                        class="bg-white border rounded-md border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block p-1 w-full "
                        minlength="9" required />
                </div>
                <div class="w-1/2">
                    <label for="konfirmasi_katasandi"
                        class="block mb-2 text-sm text-[#000000] font-poppins font-normal">Konfirmasi katasandi</label>
                    <input type="password" id="konfirmasi_katasandi" name="konfirmasi_katasandi"
                        class="bg-white border rounded-md border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block p-1 w-full "
                        minlength="9" required />
                    @if (Session::has('katasandi'))
                        <p class="text-red-500">{{ Session::get('katasandi') }}</p>
                    @endif
                </div>
            </div>
            @if (Session::has('pengguna'))
                <div class="w-full px-5 flex justify-end items-center py-2 gap-2">
                    <p class="text-red-500">{{ Session::get('pengguna') }}</p>
                </div>
            @endif
            <div class="w-full px-5 flex justify-end items-center py-2 gap-2">
                <button type="submit"
                    class="bg-gold text-white hover:bg-white hover:ring-2 hover:ring-gold hover:text-gold px-4 py-2 w-fit rounded-[5px] font-poppins text-base">Simpan</button>
            </div>
        </form>
    </div>
</x-layout-admin>
