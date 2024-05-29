@php
    $breads = [
        [
            'href' => '/admin/dosen',
            'title' => 'Dosen',
        ],
    ];

    $tablehead = ['No', 'Nama', 'NIP', 'Aksi'];

    $data = [
        'array' => [
            [
                'nama' => 'Ilham Firman Ashari, S.Kom., M.T.',
                'nip' => '19930314 201903 1 018',
            ],
            [
                'nama' => 'Andika Setiawan, S.Kom., M.Cs.',
                'nip' => '19911127 2022 03 1 007',
            ],
        ],
        'page' => 3,
        'current' => 1,
    ];
@endphp

<x-layout-admin :$breads title="Dosen">
    <div class="flex justify-start mb-4">
        <form action="" class="w-full flex space-x-4">
            <input type="text" id="search"
                class="bg-white border rounded-md border-gold text-gray-900 text-sm focus:ring-gold focus:border-gold block p-1 sm:w-1/2 lg:w-3/12 font-poppins font-normal"
                minlength="9" required placeholder="Cari nama dosen" />
            <button type="submit" class="py-2 px-4 font-poppins font-medium text-white bg-gold rounded-[4px] hover:bg-white hover:text-gold hover:ring-2 hover:ring-gold"> Cari
            </button>
        </form>
    </div>
    <div class="flex space-x-3 justify-end mb-4">
        <a class="py-2 px-4 font-poppins font-medium text-white bg-gold rounded-[4px] hover:bg-white hover:text-gold hover:ring-2 hover:ring-gold" href="/admin/dosen/buat-akun">
            Buat Akun Dosen
        </a>
        <a class="py-2 px-4 font-poppins font-medium text-white bg-gold rounded-[4px] hover:bg-white hover:text-gold hover:ring-2 hover:ring-gold" href="/admin/dosen/parsing-akun">
            Parsing Akun Dosen
        </a>
    </div>
    <div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg ring-2 ring-blue1">
            <table class="w-full table-auto text-sm text-left rtl:text-right">
                <thead class="text-xs text-blue1 bg-blue2 border-b-2 border-[#BEDFF9]">
                    <tr>
                        @foreach ($tablehead as $item)
                            <th scope="col" class="px-6 py-3 font-semibold font-poppins text-base">
                                {{ $item }}
                            </th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data['array'] as $item)
                        <tr class="bg-white border-b font-poppins text-base font-normal">
                            <td class="px-6 py-4 w-fit">
                                {{ $loop->index + 1 }}
                            </td>
                            <td class="px-6 py-4 font-normal font-poppins text-base">
                                {{ $item['nama'] }}
                            </td>
                            <td class="px-6 py-4 font-normal font-poppins text-base">
                                {{ $item['nip'] }}
                            </td>
                            <td class="px-6 py-4 font-poppins text-base font-normal">
                                <a href="/admin/dosen/detail"
                                    class="font-medium text-blue1 hover:text-[#0F548D] dark:text-blue-500 underline">Detail</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="mt-4 flex justify-end">
        <x-pagination :pages="$data['page']" :current="$data['current']" />
    </div>
</x-layout-admin>
