@php
    $breads = [
        [
            'href' => '/mahasiswa/yudisium',
            'title' => 'Yudisium',
        ],
    ];

    $tablehead = ['No', 'Periode Wisuda', 'Status Validasi', 'Aksi'];

@endphp

<x-layout-mahasiswa :$breads title="Yudisium">
    <div class="flex justify-end mb-4">
        <a href="/mahasiswa/yudisium/tambah"
            class="py-2 px-4 font-poppins font-medium text-white bg-gold rounded-[4px] hover:bg-white hover:text-gold hover:ring-2 hover:ring-gold">Tambah
            Berkas Yudisium</a>
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
                            <td class="px-6 py-4 font-semibold font-poppins text-base">
                                {{ $item['periode_wisudas']['keterangan'] }}
                            </td>
                            @if ($item['status_yudisiums']['id'] == '1')
                                <td class="px-6 py-4 font-poppins text-base font-normal text-yellow-500">
                                    {{ $item['status_yudisiums']['keterangan'] }}
                                </td>
                            @elseif ($item['status_yudisiums']['id'] == '2')
                                <td class="px-6 py-4 font-poppins text-base font-normal text-red-500">
                                    {{ $item['status_yudisiums']['keterangan'] }}
                                </td>
                            @else
                                <td class="px-6 py-4 font-poppins text-base font-normal text-green-500">
                                    {{ $item['status_yudisiums']['keterangan'] }}
                                </td>
                            @endif
                            <td class="px-6 py-4 font-poppins text-base font-normal">
                                <a href="{{ route('yudisium-detail-mahasiswa', ['id' => $item['id']]) }}"
                                    class="font-medium text-blue1 bg-blue1 text-white px-2 py-1 rounded-md hover:bg-blue-600">Detail</a>
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
