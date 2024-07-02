<x-Admin-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center max-w-7xl mx-auto px-4">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __("Tracking Pekerjaan $jenis->nama_pekerjaan") }}
            </h2>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 py-6">
        <div class="flex flex-col items-center justify-center my-6">
            <div class="w-full overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="py-3 px-6">Nama Alumni</th>
                            <th scope="col" class="py-3 px-6">Nama Perusahaan</th>
                            <th scope="col" class="py-3 px-6">Alamat Perusahaan</th>
                            <th scope="col" class="py-3 px-6">Mulai Bekerja</th>
                            <th scope="col" class="py-3 px-6">Selesai Bekerja</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($temp as $item)
                            <tr class="hover:bg-gray-100">
                                <td class="py-4 px-6">{{ $item->user->name ?? 'Nama tidak tersedia' }}</td>
                                <td class="py-4 px-6">{{ $item->nama_perusahaan }}</td>
                                <td class="py-4 px-6">{{ $item->alamat_perusahaan }}</td>
                                <td class="py-4 px-6">{{ $item->mulai_bekerja }}</td>
                                <td class="py-4 px-6">{{ $item->done ? $item->selesai_bekerja : 'Sedang Bekerja' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-Admin-layout>