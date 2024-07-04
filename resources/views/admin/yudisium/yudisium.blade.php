@php
    $breads = [
        [
            'href' => '/admin/yudisium',
            'title' => 'Yudisium',
        ],
    ];

    $tablehead = ['No', 'Nama', 'Periode Wisuda', 'Status Validasi', 'Aksi'];
@endphp

<x-layout-admin :$breads title="Yudisium">
    <div class="flex justify-start mb-4">
        <form action="" class="w-full flex space-x-4">
            <input type="text" id="search" name="search"
                class="bg-white border rounded-md border-gold text-gray-900 text-sm focus:ring-gold focus:border-gold block p-1 sm:w-1/2 lg:w-3/12 font-poppins font-normal"
                placeholder="Cari yudisium" value="{{ request()->query('search') }}" />
            <button type="submit"
                class="py-2 px-4 font-poppins font-medium text-white bg-gold rounded-[4px] hover:bg-white hover:text-gold hover:ring-2 hover:ring-gold">
                Cari
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
                    @foreach ($data['data'] as $item)
                        <tr class="bg-white border-b font-poppins text-base font-normal">
                            <td class="px-6 py-4 w-fit">
                                {{ $loop->index + 1 }}
                            </td>
                            <td class="px-6 py-4 font-normal font-poppins text-base">
                                {{ $item['penggunas']['nama'] }}
                            </td>
                            <td class="px-6 py-4 font-semibold font-poppins text-base">
                                {{ $item['periode_wisudas']['keterangan'] }}
                            </td>
                            @if ($item['status_yudisium_id'] == 1)
                                <td class="px-6 py-4 font-poppins text-base font-normal text-yellow-500">
                                    Perlu Validasi
                                </td>
                            @elseif ($item['status_yudisium_id'] == 2)
                                <td class="px-6 py-4 font-poppins text-base font-normal text-red-500">
                                    Ditolak
                                </td>
                            @else
                                <td class="px-6 py-4 font-poppins text-base font-normal text-green-500">
                                    Diterima
                                </td>
                            @endif
                            <td class="px-6 py-4 font-poppins text-base font-normal">
                                <a href="{{ route('yudisium-detail', ['id' => $item['id']]) }}"
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
</x-layout-admin>
