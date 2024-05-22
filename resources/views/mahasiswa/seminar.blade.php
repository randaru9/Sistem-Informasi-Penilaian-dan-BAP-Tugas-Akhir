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
        <a href="/mahasiswa/seminar/tambah" class="p-2 font-poppins font-medium text-white bg-gold rounded-[4px]">Buat Jadwal Seminar</a>
    </div>
    <x-table-seminar-mahasiswa :$tablehead :$data />
    <div class="mt-4 flex justify-end">
        <x-pagination :pages="$data['page']" :current="$data['current']"/>
    </div>
</x-layout-mahasiswa>
