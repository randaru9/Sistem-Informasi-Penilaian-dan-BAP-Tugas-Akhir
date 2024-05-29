@php
    $breads = [
        [
            'href' => '/admin/bap',
            'title' => 'BAP',
        ],
        [
            'href' => '/admin/bap/detail',
            'title' => 'Detail',
        ],
        [
            'href' => '/admin/bap/detail-proses',
            'title' => 'Detail Proses',
        ],
    ];

    $tablehead = ['No', 'Dosen', 'Posisi Dosen', 'Status Revisi', 'Status Penilaian', 'Aksi'];

    $data = [
        'array' => [
            [
                'nama' => 'Ilham Firman Ashari, S.Kom., M.T.',
                'posisi_dosen' => 'Pembimbing 1',
                'status_revisi' => 'Belum Diberikan',
                'status_penilaian' => 'Belum Dinilai',
            ],
            [
                'nama' => 'Andika Setiawan, S.Kom., M.Cs.',
                'posisi_dosen' => 'Pembimbing 2',
                'status_revisi' => 'Belum Selesai',
                'status_penilaian' => 'Terlambat',
            ],
            [
                'nama' => 'Ir. Mugi Praseptiawan, S.T., M.Kom.',
                'posisi_dosen' => 'Penguji 1',
                'status_revisi' => 'Selesai',
                'status_penilaian' => 'Belum Dinilai',
            ],
            [
                'nama' => 'Miranti Verdiana, M.Si.',
                'posisi_dosen' => 'Penguji 2',
                'status_revisi' => 'Belum Diberikan',
                'status_penilaian' => 'Selesai',
            ],
        ],
        'page' => 3,
        'current' => 1,
    ];
@endphp

<x-layout-admin :$breads title="Detail Proses BAP">
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
                            <td class="px-6 py-4 font-semibold font-poppins text-base">
                                {{ $item['posisi_dosen'] }}
                            </td>
                            <td
                                class="px-6 py-4 font-poppins text-base font-normal {{ $item['status_revisi'] == 'Belum Diberikan' ? 'text-yellow-500' : ($item['status_revisi'] == 'Belum Selesai' ? 'text-red-500' : 'text-green-500') }}">
                                {{ $item['status_revisi'] }}
                            </td>
                            <td
                                class="px-6 py-4 font-poppins text-base font-normal {{ $item['status_penilaian'] == 'Belum Dinilai' ? 'text-yellow-500' : ($item['status_penilaian'] == 'Terlambat' ? 'text-red-500' : 'text-green-500') }}">
                                {{ $item['status_penilaian'] }}
                            </td>
                            <td class="px-6 py-4 font-poppins text-base font-normal">
                                <a href="/admin/bap/form-penilaian"
                                    class="font-medium text-blue1 hover:text-[#0F548D] dark:text-blue-500 underline whitespace-nowrap">Lihat Form</a>
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
