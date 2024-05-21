<div id={{ $modal }} tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white ring-2 ring-blue1 rounded-lg flex flex-col justify-center items-center">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b-2 w-11/12">
                <h3 class="font-poppins text-xl font-semibold text-black">
                    Notifikasi
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-blue1 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide={{ $modal }}>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4 min-w-full max-w-2xl max-h-96 min-h-96 overflow-y-scroll">
                <div class="bg-white ring-2 ring-blue1 p-5 rounded-[10px] space-y-4">
                    <h3 class="font-poppins text-lg font-semibold border-b-2 text-red-500">
                        Tenggat Revisi
                    </h3>
                    <p class="font-poppins font-semibold text-xs text-[#000000]">12 Oktober 2024</p>
                    <p class="font-poppins font-normal text-sm text-[#000000]">
                        Batas waktu revisi untuk Seminar Proposal anda kepada dosen Ilham Firman Ashari, S.Kom., M.T. tersisa 1 hari lagi. Segera selesaikan revisi anda kepada dosen yang berkaitan.
                    </p>
                </div>
                <div class="bg-white ring-2 ring-blue1 p-5 rounded-[10px] space-y-4">
                    <h3 class="font-poppins text-lg font-semibold border-b-2 text-red-500">
                        Berkas Yudisium
                    </h3>
                    <p class="font-poppins font-semibold text-xs text-[#000000]">12 Oktober 2024</p>
                    <p class="font-poppins font-normal text-sm text-[#000000]">
                        Pengajuan berkas yudisium anda ditolak, silahkan cek catatan pada detail pengajuan anda.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>