<x-layout-login title="Lupa Katasandi">
    <div class="p-10 w-full xl:w-4/5 flex flex-col justify-center items-center">
        <p class="font-poppins font-semibold text-3xl text-[#000000]">Lupa Kata Sandi</p>
        <p class="font-poppins font-normal text-lg text-[#000000]">Masukan alamat email anda</p>
        <form class="w-full space-y-4 mt-4" action="{{ route('generate-otp-lupa-katasandi') }}" method="POST">
            @csrf
            <div>
                <input type="email" id="email" name="email"
                    class="bg-gray-50 border rounded-md border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block p-1.5 w-full "
                    placeholder="abcdef@gmail.com" required />
            </div>
            @error('email')
                <div class="flex justify-center">
                    <p class="text-red-500">{{ $message }}</p>
                </div>
            @enderror
            <div>
                <button type="submit"
                    class="bg-gold w-full font-poppins font-semibold text-white text-base py-2 me-2 mb-2 rounded-lg hover:ring-4 hover:ring-yellow-500 ">Kirim OTP</button>
            </div>
            <div class="flex justify-center">
                <a class="text-sm text-[#000000] font-poppins font-normal" href="/login">Kembali ke Halaman Login</a>
            </div>
        </form>

    </div>
</x-layout-login>
