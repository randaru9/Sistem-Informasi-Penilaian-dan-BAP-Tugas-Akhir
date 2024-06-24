<x-layout-login title="Verifikasi OTP">
    <div class="p-10 w-full xl:w-4/5 flex flex-col justify-center items-center">
        <p class="font-poppins font-semibold text-3xl text-[#000000]">Verifikasi</p>
        <p class=" font-poppins font-normal text-lg text-[#000000]">Masukan kode OTP yang dikirim ke email</p>
        <p class="font-poppins font-bold text-lg text-[#000000]">{{ request()->query('email') }}</p>
        <form class="w-full space-y-4 mt-4" action="{{ route('verifikasi-otp', ['email' => request()->query('email')]) }}"
            method="POST">
            <div>
                <input type="text" id="otp" name="otp"
                    class="bg-gray-50 border rounded-md border-gray-300 text-gray-900 text-sm text-center focus:ring-blue-500 focus:border-blue-500 block p-1.5 w-full "
                    placeholder="123456" minlength="6" maxlength="6" required />
            </div>
            @if (Session::has('error'))
                <div class="flex justify-center">
                    <p class="text-red-500">{{ Session::get('error') }}</p>
                </div>
            @endif
            <div>
                <button type="submit"
                    class="bg-gold w-full font-poppins font-semibold text-white text-base py-2 me-2 mb-2 rounded-lg hover:ring-4 hover:ring-yellow-500 ">Login</button>
            </div>
            <div class="flex justify-center space-x-1">
                <p class="text-sm text-[#000000] font-poppins font-normal">Tidak menerima kode OTP ?</p>
                <form action="">
                    <button class="text-sm text-red-500 font-poppins font-normal" href="/login">Kirim ulang</button>
                </form>
            </div>
        </form>

    </div>
</x-layout-login>
