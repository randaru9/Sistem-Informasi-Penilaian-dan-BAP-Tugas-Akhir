@php
    $breads = [
        [
            'href' => '/mahasiswa/seminar',
            'title' => 'Seminar',
        ],
        [
            'href' => '/mahasiswa/seminar/detail',
            'title' => 'Detail',
        ],
        [
            'href' => '/mahasiswa/seminar/ubah',
            'title' => 'Ubah',
        ],
    ];
@endphp

<x-layout-mahasiswa :$breads title="Tambah Seminar">
    <form action="">
        <div class="bg-white ring-2 ring-blue1 rounded-[10px] w-full h-full overflow-hidden">
            <div class="w-full px-5 py-2">
                <div>
                    <label for="judul_tugas_akhir"
                        class="block mb-2 text-sm text-[#000000] font-poppins font-normal">Judul
                        Tugas Akhir</label>
                    <input type="text" id="judul_tugas_akhir"
                        class="bg-white border rounded-md border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block p-1 w-full "
                        minlength="9" required />
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
                        <option value=""></option>
                    </select>
                </div>
                <div class="w-1/2">
                    <label for="pembimbing2"
                        class="block mb-2 text-sm text-[#000000] font-poppins font-normal">Pembimbing
                        1</label>
                    <select
                        class="bg-white border rounded-md border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block p-1 w-full"
                        name="pembimbing2" id="pembimbing2">
                        <option value=""></option>
                    </select>
                </div>
            </div>
            <div class="w-full px-5 flex py-2 gap-2">
                <div class="w-1/2">
                    <label for="penguji1" class="block mb-2 text-sm text-[#000000] font-poppins font-normal">Penguji
                        1</label>
                    <select
                        class="bg-white border rounded-md border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block p-1 w-full"
                        name="penguji1" id="penguji1">
                        <option value=""></option>
                    </select>
                </div>
                <div class="w-1/2">
                    <label for="penguji2" class="block mb-2 text-sm text-[#000000] font-poppins font-normal">Penguji
                        2</label>
                    <select
                        class="bg-white border rounded-md border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block p-1 w-full"
                        name="penguji2" id="penguji2">
                        <option value=""></option>
                    </select>
                </div>
            </div>
            <div class="w-full px-5 flex py-2 gap-2">
                <div class="w-1/2">
                    <label for="pimpinan" class="block mb-2 text-sm text-[#000000] font-poppins font-normal">Pimpinan
                        Sidang</label>
                    <select
                        class="bg-white border rounded-md border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block p-1 w-full"
                        name="pimpinan" id="pimpinan">
                        <option value=""></option>
                    </select>
                </div>
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
                        class="block mb-2 text-sm text-[#000000] font-poppins font-normal">Tanggal Sidang</label>
                    <input type="date" id="tanggal_seminar"
                        class="bg-white border rounded-md border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block p-1 w-full "
                        minlength="9" required />
                </div>
                <div class="w-1/2">
                    <label for="waktu_seminar" class="block mb-2 text-sm text-[#000000] font-poppins font-normal">Waktu
                        Sidang</label>
                    <input type="time" id="waktu_seminar"
                        class="bg-white border rounded-md border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block p-1 w-full "
                        minlength="9" required />
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
                            <input type="file" id="draft_seminar" class="hidden" minlength="9" required />
                            Unggah
                        </label>
                        <p class="font-poppins text-base text-[#B7B7B7]">Unggah draft</p>
                    </div>
                </div>
            </div>
            <div class="w-full px-5 flex justify-end items-center py-2 gap-2">
                <button type="submit"
                    class="bg-gold text-white hover:bg-white hover:ring-2 hover:ring-gold hover:text-gold px-4 py-2 w-fit rounded-[5px] font-poppins text-base">Simpan</button>
            </div>
        </div>
    </form>
</x-layout-mahasiswa>
