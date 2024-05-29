@php
    $breads = [
        [
            'href' => '/mahasiswa/yudisium',
            'title' => 'Yudisium',
        ],
    ];

    $tablehead = ['No', 'Periode Wisuda', 'Status Validasi', 'Aksi'];

    $data = [
        'array' => [
            [
                'periode_wisuda' => 'November',
                'status_validasi' => 'Diterima',
            ],
            [
                'periode_wisuda' => 'November',
                'status_validasi' => 'Perlu Validasi',
            ],
            [
                'periode_wisuda' => 'November',
                'status_validasi' => 'Ditolak',
            ],
            [
                'periode_wisuda' => 'November',
                'status_validasi' => 'Ditolak',
            ],
        ],
        'page' => 3,
        'current' => 1,
    ];
@endphp

<x-layout-mahasiswa :$breads title="Yudisium">
    <div class="flex justify-end mb-4">
        <a href="/mahasiswa/yudisium/tambah" class="py-2 px-4 font-poppins font-medium text-white bg-gold rounded-[4px] hover:bg-white hover:text-gold hover:ring-2 hover:ring-gold">Tambah Berkas Yudisium</a>
    </div>
    <div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg ring-2 ring-blue1">
            <table class="w-full text-sm text-left rtl:text-right">
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
                            <td class="px-6 py-4">
                                {{ $loop->index + 1 }}
                            </td>
                            <td class="px-6 py-4 font-semibold font-poppins text-base">
                                {{ $item['periode_wisuda'] }}
                            </td>
                            <td class="px-6 py-4 font-poppins text-base font-normal {{$item['status_validasi'] == 'Diterima' ? 'text-green-500' : ($item['status_validasi'] == 'Perlu Validasi' ? 'text-blue-500' : 'text-red-500')}}">
                                {{ $item['status_validasi'] }}
                            </td>
                            <td class="px-6 py-4 font-poppins text-base font-normal">
                                <a href="/mahasiswa/yudisium/detail"
                                    class="font-medium text-blue1 hover:text-[#0F548D] dark:text-blue-500 underline">Detail</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layout-mahasiswa>
