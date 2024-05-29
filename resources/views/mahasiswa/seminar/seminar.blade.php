@php
    $breads = [
        [
            'href' => '/mahasiswa/seminar',
            'title' => 'Seminar',
        ],
    ];

    $tablehead = ['No', 'Tanggal/Waktu Seminar', 'Status Seminar', 'Status Revisi', 'Aksi'];

    $data = [
        'array' => [
            [
                'Tanggal' => '10-10-2022',
                'Waktu' => '13.00',
                'Status Seminar' => 'Seminar Proposal',
                'Status Revisi' => 'Belum Selesai',
            ],
            [
                'Tanggal' => '10-10-2022',
                'Waktu' => '13.00',
                'Status Seminar' => 'Seminar Proposal',
                'Status Revisi' => 'Belum Selesai',
            ],
        ],
        'page' => 3,
        'current' => 1,
    ];
@endphp

<x-layout-mahasiswa :$breads title="Seminar">
    <div class="flex justify-end mb-4">
        <a href="/mahasiswa/seminar/tambah" class="py-2 px-4 font-poppins font-medium text-white bg-gold rounded-[4px] hover:bg-white hover:text-gold hover:ring-2 hover:ring-gold">Buat
            Jadwal Seminar</a>
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
                            <td scope="row" class="px-6 py-4 font-poppins text-base font-normal">
                                {{ $item['Tanggal'] }} / {{ $item['Waktu'] }}
                            </td>
                            <td class="px-6 py-4 font-semibold font-poppins text-base">
                                {{ $item['Status Seminar'] }}
                            </td>
                            <td class="px-6 py-4 font-poppins text-base font-normal {{$item['Status Revisi'] == 'Belum Selesai' ? 'text-red-500' : 'text-green-500'}}">
                                {{ $item['Status Revisi'] }}
                            </td>
                            <td class="px-6 py-4 font-poppins text-base font-normal">
                                <a href="/mahasiswa/seminar/detail"
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
</x-layout-mahasiswa>
