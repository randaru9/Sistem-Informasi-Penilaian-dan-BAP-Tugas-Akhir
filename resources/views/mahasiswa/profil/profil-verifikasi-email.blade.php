@php
    $breads = [
        [
            'href' => '/mahasiswa/profil',
            'title' => 'Profil',
        ],
        [
            'href' => '/mahasiswa/profil/verifikasi-email',
            'title' => 'Verifikasi Email',
        ],
    ];
@endphp

<x-layout-mahasiswa :$breads title="Verifikasi Email">
    <div class="bg-white ring-2 ring-blue1 rounded-[10px] w-full h-full overflow-y-auto">
        <form action="{{ route('profil-verifikasi-email-mahasiswa-post') }}" method="POST">
            @csrf
            <div class="w-full px-5 flex py-2 gap-2">
                <div class="w-1/2">
                    <p for="nama" class="block mb-2 text-xl text-[#000000] font-poppins font-bold">Verifikasi Email
                    </p>
                </div>
            </div>
            <div class="w-full px-5 flex py-2 gap-2">
                <div class="w-1/2">
                    <label for="email" class="block mb-2 text-sm text-[#000000] font-poppins font-normal">Masukan
                        kode
                        OTP yang dikirim ke email </label>
                    <input type="text" id="otp" name="otp"
                        class="bg-white border rounded-md border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block p-1 w-full "
                        minlength="6" required />
                </div>
            </div>
            @if (Session::has('otp'))
                <div class="w-full px-5 flex py-2 gap-2">
                    <p class="text-red-500 text-xs mt-1">{{ Session::get('otp') }}</p>
                </div>
            @endif
            <div class="w-full px-5 flex py-2 gap-2">
                <div class="w-1/2 flex space-x-2">
                    <p class="text-sm text-[#000000] font-poppins font-normal">Tidak menerima kode OTP ?</p>
                    <a class="text-sm text-red-500 font-poppins font-normal" href="{{route('resend-otp-mahasiswa')}}">Kirim ulang</a>
                </div>
            </div>
            <div class="w-full px-5 flex justify-end items-center py-2 gap-2">
                <button type="submit"
                    class="bg-gold text-white hover:bg-white hover:ring-2 hover:ring-gold hover:text-gold px-4 py-2 w-fit rounded-[5px] font-poppins text-base">Verifikasi</button>
            </div>
        </form>
    </div>
</x-layout-mahasiswa>
