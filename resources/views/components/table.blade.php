<div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg ring-2 ring-blue1">
        <table class="w-full text-sm text-left rtl:text-right">
            <thead class="text-xs text-blue1 bg-blue2 border-b-2 border-[#BEDFF9]">
                <tr>
                    @foreach ($tablehead as $item)
                    <th scope="col" class="px-6 py-3">
                        {{ $item }}
                    </th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($data["array"] as $item)
                <tr
                    class="bg-white border-b">
                    <td class="px-6 py-4">
                        {{$loop->index + 1}}
                    </td>
                    <td scope="row" class="px-6 py-4">
                        {{$item['Tanggal']}} / {{$item['Waktu']}}
                    </td>
                    <td class="px-6 py-4 font-medium">
                        {{$item['Status Seminar']}}
                    </td>
                    <td class="px-6 py-4">
                        {{$item['Status Revisi']}}
                    </td>
                    <td class="px-6 py-4 ">
                        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 underline">Detail</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
