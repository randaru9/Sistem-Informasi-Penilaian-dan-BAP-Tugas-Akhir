@php
    $breads = [
        [
            'href' => '/admin/mahasiswa',
            'title' => 'Mahasiswa',
        ],
    ];

    $tablehead = ['No', 'Nama', 'NIM', 'Aksi'];
@endphp

<x-layout-admin :$breads title="Mahasiswa">
    <div class="flex justify-start mb-4">
        <form action="" class="w-full flex space-x-4">
            @csrf
            <input type="text" id="search" name="search"
                class="bg-white border rounded-md border-gold text-gray-900 text-sm focus:ring-gold focus:border-gold block p-1 sm:w-1/2 lg:w-3/12 font-poppins font-normal"
                placeholder="Cari nama mahasiswa" value="{{ request()->query('search') }}" />
            <button type="submit"
                class="py-2 px-4 font-poppins font-medium text-white bg-gold rounded-[4px] hover:bg-white hover:text-gold hover:ring-2 hover:ring-gold">
                Cari
            </button>
        </form>
    </div>
    <div class="flex space-x-3 justify-end mb-4">
        <a class="py-2 px-4 font-poppins font-medium text-white bg-gold rounded-[4px] hover:bg-white hover:text-gold hover:ring-2 hover:ring-gold"
            href="/admin/mahasiswa/buat-akun">
            Buat Akun Mahasiswa
        </a>
        <a class="py-2 px-4 font-poppins font-medium text-white bg-gold rounded-[4px] hover:bg-white hover:text-gold hover:ring-2 hover:ring-gold"
            href="/admin/mahasiswa/parsing-akun">
            Parsing Akun Mahasiswa
        </a>
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
                                {{ $item['nama'] }}
                            </td>
                            <td class="px-6 py-4 font-normal font-poppins text-base">
                                {{ $item['nim'] }}
                            </td>
                            <td class="px-6 py-4 font-poppins text-base font-normal">
                                <a href="{{route('mahasiswa-detail', ['id' => $item['id']])}}"
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
</x-layout-admin>
