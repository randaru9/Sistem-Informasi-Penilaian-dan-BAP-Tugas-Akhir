    <div class="w-full h-20 hidden md:flex p-0 items-center justify-between border-b-2">
        <img src="{{ url(asset('storage/assets/logo_dashboard_login.svg')) }}"
            class="h-full w-1/2 md:w-fit hidden lg:flex lg:flex-col" alt="logo_prodi">
        <div class="flex space-x-5 justify-center items-center mr-6">
            <button data-modal-target={{ $modal }} data-modal-toggle={{ $modal }}>
                <img src="{{ url(asset('storage/assets/logo_notif.svg')) }}" alt="logo_notif">
            </button>
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
