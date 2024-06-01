@php
    $breads = [
        [
            'href' => '/admin/bap',
            'title' => 'BAP',
        ],
        [
            'href' => '/admin/bap/rekap-nilai',
            'title' => 'Unduh Rekap Nilai Mahasiswa',
        ],
    ];
@endphp

<x-layout-admin :$breads title="Unduh Rekap Nilai Mahasiswa">
    <div class="bg-white ring-2 ring-blue1 rounded-[10px] w-full h-full overflow-y-auto">
        <form action="">
            <div class="w-full px-5 flex py-2 gap-2">
                <div class="w-1/2">
                    <p for="nama" class="block mb-2 text-xl text-[#000000] font-poppins font-bold">Unduh Rekap Nilai Mahasiswa
                    </p>
                </div>
            </div>

            <div class="w-full px-5 flex py-2 gap-2">
                <div class="w-1/2">
                    <label for="jenis_sidang" class="block mb-2 text-sm text-[#000000] font-poppins font-normal">Jenis
                        Sidang</label>
                    <select
                        class="bg-white border rounded-md border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block p-1 w-full"
                        name="jenis_sidang" id="jenis_sidang">
                        <option value=""></option>
                    </select>
                </div>
            </div>

            <div class="w-full px-5 flex py-2 gap-2">
                <div class="w-1/2">
                    <label for="tanggal_seminar"
                        class="block mb-2 text-sm text-[#000000] font-poppins font-normal">Bulan Sidang</label>
                    <input type="month" id="tanggal_seminar"
                        class="bg-white border rounded-md border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block p-1 w-full "
                        minlength="9" required />
                </div>
            </div>
            
            <div class="w-full px-5 flex justify-end items-center py-2 gap-2">
                <button type="submit"
                    class="bg-gold text-white hover:bg-white hover:ring-2 hover:ring-gold hover:text-gold px-4 py-2 w-fit rounded-[5px] font-poppins text-base">Unduh</button>
            </div>
        </form>
    </div>
</x-layout-admin>
