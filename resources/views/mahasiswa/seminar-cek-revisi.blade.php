@php
    $breads = [
        [
            'href' => '/mahasiswa/seminar',
            'title' => 'Seminar',
        ],
        [
            'href' => '/mahasiswa/seminar/detail',
            'title' => 'Detail',
        ],
        [
            'href' => '/mahasiswa/cek-revisi',
            'title' => 'Cek Revisi',
        ],
    ];

    $tablehead = ['No', 'Dosen', 'Posisi Dosen', 'Status Revisi', 'Aksi'];

    $data = [
        'array' => [
            [
                'Dosen' => 'Ilham Firman Ashari, S.Kom., M.T.',
                'Posisi_dosen' => 'Pembimbing 1',
                'Status Revisi' => 'Selesai',
            ],
            [
                'Dosen' => 'Andika Setiawan, S.Kom., M.Cs.',
                'Posisi_dosen' => 'Pembimbing 2',
                'Status Revisi' => 'Belum Selesai',
            ],
            [
                'Dosen' => 'Ir. Mugi Praseptiawan, S.T., M.Kom.',
                'Posisi_dosen' => 'Penguji 1',
                'Status Revisi' => 'Belum Selesai',
            ],
            [
                'Dosen' => 'Miranti Verdiana, M.Si.',
                'Posisi_dosen' => 'Penguji 2',
                'Status Revisi' => 'Belum Selesai',
            ],
        ],
        'page' => 3,
        'current' => 1,
    ];
@endphp

<x-layout-mahasiswa :$breads title="Cek Revisi">
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
                            <td class="px-6 py-4 font-poppins text-base font-normal ">
                                {{ $item['Dosen'] }}
                            </td>
                            <td class="px-6 py-4 font-semibold font-poppins text-base">
                                {{ $item['Posisi_dosen'] }}
                            </td>
                            <td class="px-6 py-4 font-poppins text-base font-normal {{$item['Status Revisi'] == 'Belum Selesai' ? 'text-red-500' : 'text-green-500'}}">
                                {{ $item['Status Revisi'] }}
                            </td>
                            <td class="px-6 py-4 font-poppins text-base font-normal">
                                <a href="/mahasiswa/seminar/cek-revisi/detail"
                                    class="font-medium text-blue1 hover:text-[#0F548D] dark:text-blue-500 underline">Detail Revisi</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layout-mahasiswa>
