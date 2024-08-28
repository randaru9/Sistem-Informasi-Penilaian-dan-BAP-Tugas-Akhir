@php
    $breads = [
        [
            'href' => '/mahasiswa/seminar',
            'title' => 'Seminar',
        ],
        [
            'href' => route('seminar-detail', ['id' => request()->query('id')]),
            'title' => 'Detail',
        ],
        [
            'href' => route('seminar-cek-revisi', ['id' => request()->query('id')]),
            'title' => 'Cek Revisi',
        ],
    ];

    $tablehead = ['No', 'Dosen', 'Posisi Dosen', 'Status Revisi', 'Aksi'];
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
                    @foreach ($data[0]['revisis'] as $item)
                        <tr class="bg-white border-b font-poppins text-base font-normal">
                            <td class="px-6 py-4">
                                {{ $loop->index + 1 }}
                            </td>
                            <td class="px-6 py-4 font-poppins text-base font-normal ">
                                {{ $item['penggunas']['nama'] }}
                            </td>
                            @if ($item['pengguna_id'] == $data[0]['pembimbing_1_id'])
                                <td class="px-6 py-4 font-semibold font-poppins text-base">
                                    Pembimbing 1
                                </td>
                            @elseif ($item['pengguna_id'] == $data[0]['pembimbing_2_id'])
                                <td class="px-6 py-4 font-semibold font-poppins text-base">
                                    Pembimbing 2
                                </td>
                            @elseif ($item['pengguna_id'] == $data[0]['penguji_1_id'])
                                <td class="px-6 py-4 font-semibold font-poppins text-base">
                                    Penguji 1
                                </td>
                            @elseif ($item['pengguna_id'] == $data[0]['penguji_2_id'])
                                <td class="px-6 py-4 font-semibold font-poppins text-base">
                                    Penguji 2
                                </td>
                            @endif
                            @if ($item['status_revisis']['id'] === 1)
                                <td class="px-6 py-4 font-poppins text-base font-normal text-red-500">
                                    Belum Selesai
                                </td>
                            @else
                                <td class="px-6 py-4 font-poppins text-base font-normal text-green-500">
                                    Selesai
                                </td>
                            @endif
                            <td class="px-6 py-4 font-poppins text-base font-normal">
                                <a href="{{ route('seminar-cek-revisi-detail', ['id' => $item['id']]) }}"
                                    class="font-medium text-blue1 bg-blue1 text-white px-2 py-1 rounded-md hover:bg-blue-600">Detail
                                    </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layout-mahasiswa>
