@php
    $breads = [
        [
            'href' => '/mahasiswa/yudisium',
            'title' => 'Yudisium',
        ],
        [
            'href' => '/mahasiswa/yudisium/detail',
            'title' => 'Detail',
        ],
        [
            'href' => '/mahasiswa/yudisium/ubah',
            'title' => 'Ubah',
        ],
    ];
@endphp

<x-layout-mahasiswa :$breads title="Ubah Berkas Yudisium">
    <div class="bg-white ring-2 ring-blue1 rounded-[10px] w-full h-full overflow-y-auto">
        <form action="">
            <div class="w-full px-5 flex py-2 gap-2">
                <div class="w-1/2">
                    <label for="periode_wisuda" class="block mb-2 text-sm text-[#000000] font-poppins font-normal">Periode
                        Wisuda</label>
                    <select
                        class="bg-white border rounded-md border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block p-1 w-full"
                        name="periode_wisuda" id="periode_wisuda">
                        <option value=""></option>
                    </select>
                </div>
            </div>
            <div class="w-full px-5 flex py-2 gap-2">
                <div class="w-1/2">
                    <label for="tempat_kerja" class="block mb-2 text-sm text-[#000000] font-poppins font-normal">Tempat
                        dan Bidang Kerja (Apabila Sudah Bekerja)</label>
                    <input type="text" id="tempat_kerja"
                        class="bg-white border rounded-md border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block p-1 w-full "
                        minlength="9" required />
                </div>
            </div>
            <div class="w-full px-5 flex py-2 gap-2">
                <div class="w-1/2 flex flex-col">
                    <label for="saran" class="block mb-2 text-sm text-[#000000] font-poppins font-normal">Saran Dan
                        Kritik</label>
                    <textarea
                        class="bg-white border rounded-md border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500"
                        name="saran" id="saran" cols="90" rows="5"></textarea>
                </div>
            </div>
            <div class="w-full px-5 flex py-2 gap-2">
                <div class="w-4/5">
                    <label for="saran" class="block mb-2 text-base text-[#000000] font-poppins font-normal">Catatan
                        Perbaikan :</label>
                    <p id="saran" class="text-sm text-[#000000] font-poppins font-normal w-2/3 text-justify">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laborum at dolores beatae sed sit
                        quisquam
                        in quae. Facilis, ipsum. Illo velit at repellendus. Atque fugiat commodi nemo consequuntur
                        quidem
                        tenetur.
                    </p>
                </div>
            </div>
            <div class="w-full px-5 flex py-2 gap-2">
                <div class="flex flex-col w-1/2">
                    <label for="berkas" class="block mb-2 text-sm text-[#000000] font-poppins font-normal">Berkas
                        Yudisium
                    </label>
                    <div class="flex space-x-2 items-center">
                        <label for="berkas"
                            class="bg-gold text-white hover:bg-white hover:ring-2 hover:ring-gold hover:text-gold px-4 py-1 w-fit rounded-[5px] font-poppins text-base">
                            <input type="file" id="berkas" class="hidden" minlength="9" required />
                            Unggah
                        </label>
                        <p class="font-poppins text-base text-[#B7B7B7]">Unggah berkas</p>
                    </div>
                </div>
            </div>
            <div class="w-full px-5 flex py-2 gap-2">
                <p class="text-sm text-[#000000] font-poppins font-base">
                    *Berkas Yudisium wajib berisi (Jadikan dalam satu file RAR/ZIP) : <br>
                    1. Scan Lembar Pengesahan Asli (di ttd semua dosen pembimbing dan penguji) dan disertai foto <br>
                    2. Abstrak Indonesia dan English (pdf dan docx) <br>
                    3. Laporan Akhir (pdf dan docx) <br>
                    4. Program/ Prototype/ Model <br>
                    5. Transkrip nilai akhir (pdf) <br>
                    6. Berita Acara Sidang Akhir (pdf) <br>

                </p>
            </div>
            <div class="w-full px-5 flex justify-end items-center py-2 gap-2">
                <button type="submit"
                    class="bg-gold text-white hover:bg-white hover:ring-2 hover:ring-gold hover:text-gold px-4 py-2 w-fit rounded-[5px] font-poppins text-base">Simpan</button>
            </div>
        </form>
    </div>
</x-layout-mahasiswa>