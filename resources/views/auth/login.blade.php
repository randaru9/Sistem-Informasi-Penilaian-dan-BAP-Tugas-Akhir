<x-layout-login title="Login">
    <div class="p-10 w-full xl:w-3/5 space-y-3 flex flex-col justify-center items-center">
        <p class="font-poppins font-semibold text-3xl text-[#000000]">Masuk</p>
        <p class="font-poppins font-normal text-lg text-[#000000]">Harap Masukan Data Diri Anda</p>
        
        <form method="POST" action="{{ route('login') }}" class="w-full space-y-2">
            <div>
                <label for="nim_nip" class="block ml-1 text-base text-[#000000] font-poppins font-normal">NIM/NIP</label>
                <input type="text" id="nim_nip" name="nim_nip" class="bg-gray-50 border rounded-md border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block p-1.5 w-full " placeholder="123456789" minlength="9" required />
            </div>
            <div>
                <label for="katasandi" class="block ml-1 text-base text-[#000000] font-poppins font-normal">Kata sandi</label>
                <input type="password" id="katasandi" name="katasandi"  class="bg-gray-50 border rounded-md border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block p-1.5 w-full " placeholder="********" minlength="8" required />
            </div>
            <div class="flex justify-end">
                <a class="text-sm text-[#000000] font-poppins font-normal" href="/lupa-katasandi">Lupa Katasandi</a>
            </div>
            @if (Session::has('error'))
                <div class="flex justify-center">
                    <p class="text-red-500">{{ Session::get('error') }}</p>
                </div>
            @endif
            <div>
                <button type="submit" class="bg-gold w-full font-poppins font-semibold text-white text-base py-2 me-2 mb-2 rounded-lg hover:ring-4 hover:ring-yellow-500 ">Login</button>
            </div>
        </form>

    </div>
</x-layout-login>