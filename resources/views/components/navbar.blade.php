    <div class="w-full h-20 hidden md:flex p-0 items-center justify-between border-b-2">
        <img src="{{ url(asset('storage/assets/logo_dashboard_login.svg')) }}"
            class="h-full w-1/2 md:w-fit hidden lg:flex lg:flex-col" alt="logo_prodi">
        <div class="flex space-x-5 justify-center items-center mr-6">
            @if (Auth::user()->role_id == 2)
                <button class="relative" data-modal-target='notif' data-modal-toggle='notif'>
                    <img src="{{ url(asset('storage/assets/logo_notif.svg')) }}" alt="logo_notif">
                    @if($data !== [])
                    <div class="p-1 bg-red-500 rounded-full absolute top-0 right-0 animate-ping duration-1000"></div>
                    @endif
                </button>
            @endif
            <div>
                <p class="font-poppins font-semibold text-base">
                    {{ Auth::user()->nama }}
                </p>
                @if (Auth::user()->role_id == 1)
                    <p class="font-poppins font-normal text-xs">Admin</p>
                @elseif(Auth::user()->role_id == 2)
                    <p class="font-poppins font-normal text-xs">Dosen</p>
                @elseif(Auth::user()->role_id == 3)
                    <p class="font-poppins font-normal text-xs">Mahasiswa</p>
                @endif
            </div>
            <img src="{{ url(asset('storage/assets/logo_profil.svg')) }}" alt="logo_profil">
        </div>
    </div>
    <div id='notif' tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white ring-2 ring-blue1 rounded-lg flex flex-col justify-center items-center">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b-2 w-11/12">
                    <h3 class="font-poppins text-xl font-semibold text-black">
                        Notifikasi
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-blue1 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide='notif'>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4 min-w-full max-w-2xl max-h-96 min-h-96 overflow-y-scroll">
                    @foreach ($data as $item)
                    <div class="bg-white ring-2 ring-blue1 p-5 rounded-[10px] space-y-4">
                        <h3 class="font-poppins text-lg font-semibold border-b-2 text-red-500">
                            Tenggat Penilaian
                        </h3>
                        <p class="font-poppins font-semibold text-xs text-[#000000]">
                            @php
                                $item['updated_at'] = Carbon\Carbon::parse($item['updated_at'])->translatedFormat('l j F');
                            @endphp
                            {{ $item['updated_at'] }}
                        </p>
                        <p class="font-poppins font-normal text-sm text-[#000000]">
                            Batas waktu penilaian untuk Seminar Proposal mahasiswa atas nama {{$item['seminars']['penggunas']['nama']}} sudah melewati batas waktu 2 hari. Segera berikan penilaian anda kepada mahasiswa yang berkaitan.
                        </p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
