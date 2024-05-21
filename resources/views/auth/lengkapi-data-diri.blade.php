<x-layout-login title="Lengkapi Data Diri">
    <div class="p-10 w-full xl:w-3/5 space-y-3 flex flex-col justify-center items-center">
        <p class="font-poppins font-semibold text-3xl text-[#000000]">Lengkapi Data Diri</p>
        <p class="font-poppins font-normal text-lg text-[#000000]">Harap Masukan Data Diri Anda</p>
        <form class="w-full space-y-2" action="/verifikasi-otp">
            <div>
                <label for="email" class="block ml-1 text-base text-[#000000] font-poppins font-normal">Email</label>
                <input type="email" id="email" class="bg-gray-50 border rounded-md border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block p-1.5 w-full " placeholder="abcdef@gmail.com" required />
            </div>
            <div>
                <label for="katasandi-baru" class="block ml-1 text-base text-[#000000] font-poppins font-normal">Kata sandi baru</label>
                <input type="password" id="katasandi-baru " class="bg-gray-50 border rounded-md border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block p-1.5 w-full " placeholder="********" required />
            </div>
            <div>
                <label for="konfirmasi-katasandi-baru" class="block ml-1 text-base text-[#000000] font-poppins font-normal">Konfirmasi kata sandi baru</label>
                <input type="password" id="konfirmasi-katasandi-baru " class="bg-gray-50 border rounded-md border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block p-1.5 w-full " placeholder="********" required />
            </div>
            <div>
                <button type="submit" class="bg-gold w-full font-poppins font-semibold text-white text-base py-2 me-2 mb-2 rounded-lg hover:ring-4 hover:ring-yellow-500 ">Login</button>
            </div>
        </form>

    </div>
</x-layout-login>