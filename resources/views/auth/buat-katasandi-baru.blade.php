<x-layout-login title="Buat Katasandi Baru">
    <div class="p-10 w-full xl:w-fit space-y-3 flex flex-col justify-center items-center">
        <p class="font-poppins font-semibold text-3xl text-[#000000]">Buat Kata Sandi Baru</p>
        <p class="font-poppins font-normal text-lg text-[#000000]">Minimal menggunakan 8 Karakter Huruf</p>
        <form class="w-full space-y-2" action="">
            <div>
                <label for="katasandi-baru" class="block ml-1 text-base text-[#000000] font-poppins font-normal">Kata sandi baru</label>
                <input type="password" id="katasandi-baru " class="bg-gray-50 border rounded-md border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block p-1.5 w-full " placeholder="********" minlength="8" required />
            </div>
            <div>
                <label for="konfirmasi-katasandi-baru" class="block ml-1 text-base text-[#000000] font-poppins font-normal">Konfirmasi kata sandi baru</label>
                <input type="password" id="konfirmasi-katasandi-baru " class="bg-gray-50 border rounded-md border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block p-1.5 w-full " placeholder="********" minlength="8" required />
            </div>
            <div>
                <button type="button" class="bg-gold w-full font-poppins font-semibold text-white text-base py-2 me-2 mb-2 rounded-lg hover:ring-4 hover:ring-yellow-500 ">Login</button>
            </div>
            <div class="flex justify-center">
                <a class="text-sm text-[#000000] font-poppins font-normal" href="/login">Kembali ke Halaman Login</a>
            </div>
        </form>
    </div>
</x-layout-login>