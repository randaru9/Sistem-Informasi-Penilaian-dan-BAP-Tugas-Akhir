@php
    $breads = [
        [
            'href' => '/dosen/profil',
            'title' => 'Profil',
        ],
    ];
@endphp

<x-layout-dosen :$breads title="Profil">
    <div class="bg-white ring-2 ring-blue1 rounded-[10px] w-full h-full overflow-y-auto">
        <div class="w-full px-5 flex py-2 gap-2">
            <div class="w-1/2">
                <label for="nama" class="block mb-2 text-base text-[#000000] font-poppins font-normal">Nama</label>
                <p id="nama" class="text-sm text-[#000000] font-poppins font-normal w-2/3 text-justify">
                    {{$data['nama']}}
                </p>
            </div>
        </div>
        <div class="w-full px-5 flex py-2 gap-2">
            <div class="w-1/2">
                <label for="nip" class="block mb-2 text-base text-[#000000] font-poppins font-normal">NIP</label>
                <p id="nip" class="text-sm text-[#000000] font-poppins font-normal w-2/3 text-justify">
                    {{$data['nip']}}
                </p>
            </div>
        </div>
        <div class="w-full px-5 flex py-2 gap-2">
            <div class="w-1/2">
                <a href="{{route('profil-ubah-biodata-dosen')}}"
                    class="bg-gold text-white hover:bg-white hover:ring-2 hover:ring-gold hover:text-gold px-4 py-2 w-fit rounded-[5px] font-poppins text-base">
                    Ubah Biodata
                </a>
            </div>
        </div>
        <div class="w-full px-5 flex py-2 gap-2">
            <div class="w-1/2">
                <label for="email" class="block mb-2 text-base text-[#000000] font-poppins font-normal">Email</label>
                <p id="email" class="text-sm text-[#000000] font-poppins font-normal w-2/3 text-justify">
                    {{$data['email']}}
                </p>
            </div>
        </div>
        <div class="w-full px-5 flex py-2 gap-2">
            <div class="w-1/2">
                <a href="{{route('profil-ubah-email-dosen')}}"
                    class="bg-gold text-white hover:bg-white hover:ring-2 hover:ring-gold hover:text-gold px-4 py-2 w-fit rounded-[5px] font-poppins text-base">
                    Ubah Email
                </a>
            </div>
        </div>
        <div class="w-full px-5 flex py-2 gap-2">
            <div class="w-1/2">
                <label for="katasandi"
                    class="block mb-2 text-base text-[#000000] font-poppins font-normal">Katasandi</label>
                <a href="{{route('profil-ubah-katasandi-dosen')}}"
                    class="bg-gold text-white hover:bg-white hover:ring-2 hover:ring-gold hover:text-gold px-4 py-2 w-fit rounded-[5px] font-poppins text-base">
                    Ubah Katasandi
                </a>
            </div>
        </div>
    </div>
</x-layout-dosen>
