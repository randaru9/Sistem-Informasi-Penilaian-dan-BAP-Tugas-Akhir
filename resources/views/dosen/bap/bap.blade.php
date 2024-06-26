@php
    $breads = [
        [
            'href' => '/dosen/bap',
            'title' => 'BAP',
        ],
    ];

    $tablehead = ['No', 'Nama', 'Jenis Seminar', 'Tanggal/Waktu', 'Status Tanda Tangan', 'Aksi'];

    $data = [
        'array' => [
            [
                'nama' => 'Rangga Ndaru Anggoro',
                'jenis_seminar' => 'Seminar Proposal',
                'tanggal' => '12-10-2024',
                'waktu' => '13:00',
                'status_tanda_tangan' => 'Belum Di Tandatangani',
            ],
            [
                'nama' => 'Rangga Ndaru Anggoro',
                'tanggal' => '12-10-2024',
                'waktu' => '13:00',
                'jenis_seminar' => 'Seminar Proposal',
                'status_tanda_tangan' => 'Belum Di Tandatangani',
            ],
            [
                'nama' => 'Rangga Ndaru Anggoro',
                'tanggal' => '12-10-2024',
                'waktu' => '13:00',
                'jenis_seminar' => 'Seminar Proposal',
                'status_tanda_tangan' => 'Sudah Di Tandatangani',
            ],
        ],
        'page' => 3,
        'current' => 1,
    ];
@endphp

<x-layout-dosen :$breads title="BAP">
    <div class="flex justify-start mb-4">
        <form action="" class="w-full flex space-x-4">
            <input type="text" id="search"
                class="bg-white border rounded-md border-gold text-gray-900 text-sm focus:ring-gold focus:border-gold block p-1 sm:w-1/2 lg:w-3/12 font-poppins font-normal"
                minlength="9" required placeholder="Cari nama mahasiswa" />
            <button type="submit" class="py-2 px-4 font-poppins font-medium text-white bg-gold rounded-[4px] hover:bg-white hover:text-gold hover:ring-2 hover:ring-gold"> Cari
            </button>
        </form>
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
                            <td class="px-6 py-4 font-semibold font-poppins text-base">
                                {{ $item['jenis_seminar'] }}
                            </td>
                            <td scope="row" class="px-6 py-4 font-poppins text-base font-normal">
                                {{ $item['tanggal'] }} / {{ $item['waktu'] }}
                            </td>
                            <td
                                class="px-6 py-4 font-poppins text-base font-normal {{ $item['status_tanda_tangan'] == 'Belum Di Tandatangani' ? 'text-red-500' : 'text-green-500' }}">
                                {{ $item['status_tanda_tangan'] }}
                            </td>
                            @if ($item['status_tanda_tangan'] == 'Sudah Di Tandatangani')
                                <td class="px-6 py-4 font-poppins text-base font-normal">
                                    <a href="/dosen/penilaian/detail"
                                        class="font-medium text-blue1 hover:text-[#0F548D] dark:text-blue-500 underline">Detail</a>
                                </td>
                            @else
                                <td class="px-6 py-4 font-poppins text-base font-normal">
                                    <a href="/dosen/bap/tambah-tanda-tangan"
                                        class="font-medium text-blue1 hover:text-[#0F548D] dark:text-blue-500 underline">Beri Tanda Tangan</a>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="mt-4 flex justify-end">
        <x-pagination :pages="$data['page']" :current="$data['current']" />
    </div>
</x-layout-dosen>
