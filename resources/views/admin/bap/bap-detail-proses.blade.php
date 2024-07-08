@php
    $breads = [
        [
            'href' => '/admin/bap',
            'title' => 'BAP',
        ],
        [
            'href' => route('bap-detail', ['id' => request()->query('id')]),
            'title' => 'Detail',
        ],
        [
            'href' => route('bap-detail-proses', ['id' => request()->query('id')]),
            'title' => 'Detail Proses',
        ],
    ];

    $tablehead = ['No', 'Dosen', 'Posisi Dosen', 'Status Revisi', 'Status Penilaian', 'Aksi'];
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

                    {{-- // Pembimbing 1 --}}

                    <tr class="bg-white border-b font-poppins text-base font-normal">
                        <td class="px-6 py-4 w-fit">
                            1
                        </td>
                        <td class="px-6 py-4 font-normal font-poppins text-base">
                            {{ $collection['pembimbing1s']['nama'] }}
                        </td>
                        <td class="px-6 py-4 font-semibold font-poppins text-base">
                            Pembimbing 1
                        </td>
                        @if ($collection['revisi_pembimbing_1'] === [])
                            <td class="px-6 py-4 font-poppins text-base font-normal text-blue-500">
                                Belum Diberikan
                            </td>
                        @else
                            @if ($collection['revisi_pembimbing_1']['status_revisi_id'] === 1)
                                <td class="px-6 py-4 font-poppins text-base font-normal text-yellow-500">
                                    Belum Selesai
                                </td>
                            @else
                                <td class="px-6 py-4 font-poppins text-base font-normal text-green-500">
                                    Selesai
                                </td>
                            @endif
                        @endif
                        @if ($collection['penilaian_pembimbing_1'] === [])
                            <td class="px-6 py-4 font-poppins text-base font-normal text-blue-500">
                                Belum Diberikan
                            </td>
                        @else
                            @if ($collection['penilaian_pembimbing_1']['status_penilaian_id'] === 1)
                                <td class="px-6 py-4 font-poppins text-base font-normal text-green-500">
                                    Selesai
                                </td>
                            @elseif ($collection['penilaian_pembimbing_1']['status_penilaian_id'] === 2)
                                <td class="px-6 py-4 font-poppins text-base font-normal text-red-500">
                                    Terlambat
                                </td>
                            @else
                                <td class="px-6 py-4 font-poppins text-base font-normal text-yellow-500">
                                    Belum Selesai
                                </td>
                            @endif
                        @endif
                        @if ($collection['penilaian_pembimbing_1'] === [])
                            <td class="px-6 py-4 font-poppins text-base font-normal">
                                <p
                                    class="font-medium text-gray-500 whitespace-nowrap">
                                    Penilaian Belum Ada</p>
                            </td>
                        @else
                            <td class="px-6 py-4 font-poppins text-base font-normal">
                                <a href="{{ route('bap-form-penilaian', ['id' => $collection['penilaian_pembimbing_1']['id']]) }}"
                                    class="font-medium text-blue1 hover:text-[#0F548D] dark:text-blue-500 underline whitespace-nowrap">Lihat
                                    Penilaian</a>
                            </td>
                        @endif
                    </tr>

                    {{-- // Pembimbing 2 --}}

                    <tr class="bg-white border-b font-poppins text-base font-normal">
                        <td class="px-6 py-4 w-fit">
                            2
                        </td>
                        <td class="px-6 py-4 font-normal font-poppins text-base">
                            {{ $collection['pembimbing2s']['nama'] }}
                        </td>
                        <td class="px-6 py-4 font-semibold font-poppins text-base">
                            Pembimbing 2
                        </td>
                        @if ($collection['revisi_pembimbing_2'] === [])
                            <td class="px-6 py-4 font-poppins text-base font-normal text-blue-500">
                                Belum Diberikan
                            </td>
                        @else
                            @if ($collection['revisi_pembimbing_2']['status_revisi_id'] === 1)
                                <td class="px-6 py-4 font-poppins text-base font-normal text-yellow-500">
                                    Belum Selesai
                                </td>
                            @else
                                <td class="px-6 py-4 font-poppins text-base font-normal text-green-500">
                                    Selesai
                                </td>
                            @endif
                        @endif
                        @if ($collection['penilaian_pembimbing_2'] === [])
                            <td class="px-6 py-4 font-poppins text-base font-normal text-blue-500">
                                Belum Diberikan
                            </td>
                        @else
                            @if ($collection['penilaian_pembimbing_2']['status_penilaian_id'] === 1)
                                <td class="px-6 py-4 font-poppins text-base font-normal text-green-500">
                                    Selesai
                                </td>
                            @elseif ($collection['penilaian_pembimbing_2']['status_penilaian_id'] === 2)
                                <td class="px-6 py-4 font-poppins text-base font-normal text-red-500">
                                    Terlambat
                                </td>
                            @else
                                <td class="px-6 py-4 font-poppins text-base font-normal text-yellow-500">
                                    Belum Selesai
                                </td>
                            @endif
                        @endif
                        @if ($collection['penilaian_pembimbing_2'] === [])
                            <td class="px-6 py-4 font-poppins text-base font-normal">
                                <p
                                    class="font-medium text-gray-500 whitespace-nowrap">
                                    Penilaian Belum Ada</p>
                            </td>
                        @else
                            <td class="px-6 py-4 font-poppins text-base font-normal">
                                <a href="{{ route('bap-form-penilaian', ['id' => $collection['penilaian_pembimbing_2']['id']]) }}"
                                    class="font-medium text-blue1 hover:text-[#0F548D] dark:text-blue-500 underline whitespace-nowrap">Lihat
                                    Penilaian</a>
                            </td>
                        @endif
                    </tr>

                    {{-- // Penguji 1 --}}

                    <tr class="bg-white border-b font-poppins text-base font-normal">
                        <td class="px-6 py-4 w-fit">
                            3
                        </td>
                        <td class="px-6 py-4 font-normal font-poppins text-base">
                            {{ $collection['penguji1s']['nama'] }}
                        </td>
                        <td class="px-6 py-4 font-semibold font-poppins text-base">
                            Penguji 1
                        </td>
                        @if ($collection['revisi_penguji_1'] === [])
                            <td class="px-6 py-4 font-poppins text-base font-normal text-blue-500">
                                Belum Diberikan
                            </td>
                        @else
                            @if ($collection['revisi_penguji_1']['status_revisi_id'] === 1)
                                <td class="px-6 py-4 font-poppins text-base font-normal text-yellow-500">
                                    Belum Selesai
                                </td>
                            @else
                                <td class="px-6 py-4 font-poppins text-base font-normal text-green-500">
                                    Selesai
                                </td>
                            @endif
                        @endif
                        @if ($collection['penilaian_penguji_1'] === [])
                            <td class="px-6 py-4 font-poppins text-base font-normal text-blue-500">
                                Belum Diberikan
                            </td>
                        @else
                            @if ($collection['penilaian_penguji_1']['status_penilaian_id'] === 1)
                                <td class="px-6 py-4 font-poppins text-base font-normal text-green-500">
                                    Selesai
                                </td>
                            @elseif ($collection['penilaian_penguji_1']['status_penilaian_id'] === 2)
                                <td class="px-6 py-4 font-poppins text-base font-normal text-red-500">
                                    Terlambat
                                </td>
                            @else
                                <td class="px-6 py-4 font-poppins text-base font-normal text-yellow-500">
                                    Belum Selesai
                                </td>
                            @endif
                        @endif
                        @if ($collection['penilaian_penguji_1'] === [])
                            <td class="px-6 py-4 font-poppins text-base font-normal">
                                <p
                                    class="font-medium text-gray-500 whitespace-nowrap">
                                    Penilaian Belum Ada</p>
                            </td>
                        @else
                            <td class="px-6 py-4 font-poppins text-base font-normal">
                                <a href="{{ route('bap-form-penilaian', ['id' => $collection['penilaian_penguji_1']['id']]) }}"
                                    class="font-medium text-blue1 hover:text-[#0F548D] dark:text-blue-500 underline whitespace-nowrap">Lihat
                                    Penilaian</a>
                            </td>
                        @endif
                    </tr>

                    {{-- Penguji 2 --}}

                    <tr class="bg-white border-b font-poppins text-base font-normal">
                        <td class="px-6 py-4 w-fit">
                            4
                        </td>
                        <td class="px-6 py-4 font-normal font-poppins text-base">
                            {{ $collection['penguji2s']['nama'] }}
                        </td>
                        <td class="px-6 py-4 font-semibold font-poppins text-base">
                            Penguji 2
                        </td>
                        @if ($collection['revisi_penguji_2'] === [])
                            <td class="px-6 py-4 font-poppins text-base font-normal text-blue-500">
                                Belum Diberikan
                            </td>
                        @else
                            @if ($collection['revisi_penguji_2']['status_revisi_id'] === 1)
                                <td class="px-6 py-4 font-poppins text-base font-normal text-yellow-500">
                                    Belum Selesai
                                </td>
                            @else
                                <td class="px-6 py-4 font-poppins text-base font-normal text-green-500">
                                    Selesai
                                </td>
                            @endif
                        @endif
                        @if ($collection['penilaian_penguji_2'] === [])
                            <td class="px-6 py-4 font-poppins text-base font-normal text-blue-500">
                                Belum Diberikan
                            </td>
                        @else
                            @if ($collection['penilaian_penguji_2']['status_penilaian_id'] === 1)
                                <td class="px-6 py-4 font-poppins text-base font-normal text-green-500">
                                    Selesai
                                </td>
                            @elseif ($collection['penilaian_penguji_2']['status_penilaian_id'] === 2)
                                <td class="px-6 py-4 font-poppins text-base font-normal text-red-500">
                                    Terlambat
                                </td>
                            @else
                                <td class="px-6 py-4 font-poppins text-base font-normal text-yellow-500">
                                    Belum Selesai
                                </td>
                            @endif
                        @endif
                        @if ($collection['penilaian_penguji_2'] === [])
                            <td class="px-6 py-4 font-poppins text-base font-normal">
                                <p
                                    class="font-medium text-gray-500 whitespace-nowrap">
                                    Penilaian Belum Ada</p>
                            </td>
                        @else
                            <td class="px-6 py-4 font-poppins text-base font-normal">
                                <a href="{{ route('bap-form-penilaian', ['id' => $collection['penilaian_penguji_2']['id']]) }}"
                                    class="font-medium text-blue1 hover:text-[#0F548D] dark:text-blue-500 underline whitespace-nowrap">Lihat
                                    Penilaian</a>
                            </td>
                        @endif
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-layout-admin>
