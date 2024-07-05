@php
    $breads = [
        [
            'href' => '/mahasiswa/seminar',
            'title' => 'Seminar',
        ],
    ];

    $tablehead = ['No', 'Tanggal/Waktu Seminar', 'Status Seminar', 'Status Revisi', 'Aksi'];

@endphp

<x-layout-mahasiswa :$breads title="Seminar">
    <div class="flex justify-end mb-4">
        <a href="/mahasiswa/seminar/tambah"
            class="py-2 px-4 font-poppins font-medium text-white bg-gold rounded-[4px] hover:bg-white hover:text-gold hover:ring-2 hover:ring-gold">Buat
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
                    @foreach ($data['data'] as $item)
                        <tr class="bg-white border-b font-poppins text-base font-normal">
                            <td class="px-6 py-4">
                                {{ $loop->index + 1 }}
                            </td>
                            <td scope="row" class="px-6 py-4 font-poppins text-base font-normal">
                                @php
                                    $item['tanggal'] = date('d-m-Y', strtotime($item['tanggal']));
                                    $item['waktu'] = date('H:i', strtotime($item['waktu']));
                                @endphp
                                {{ $item['tanggal'] }} / {{ $item['waktu'] }}
                            </td>
                            <td class="px-6 py-4 font-semibold font-poppins text-base">
                                {{ $item['jenis_seminars']['keterangan'] }}
                            </td>
                            @if ($item['count_revisi'] === 0)
                                <td class="px-6 py-4 font-poppins text-base font-normal text-red-500 ">
                                    Belum Diberikan
                                </td>
                            @elseif($item['count_revisi_selesai'] === 4)
                                <td class="px-6 py-4 font-poppins text-base font-normal text-green-500 ">
                                    Selesai
                                </td>
                            @else
                                <td class="px-6 py-4 font-poppins text-base font-normal text-yellow-500 ">
                                    Belum Selesai
                                </td>
                            @endif
                            <td class="px-6 py-4 font-poppins text-base font-normal">
                                <a href="{{route('seminar-detail', ['id' => $item['id']])}}"
                                    class="font-medium text-blue1 hover:text-[#0F548D] dark:text-blue-500 underline">Detail</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @if ($data['last_page'] > 1)
    <div class="mt-4 flex justify-end">
        <x-pagination :pages="$data['last_page']" :current="$data['current_page']" />
    </div>
    @endif
</x-layout-mahasiswa>
