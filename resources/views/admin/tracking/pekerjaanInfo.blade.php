{{-- @dd($temp) --}}
<x-Admin-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center max-w-7xl mx-auto px-4">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __("Tracking Pekerjaan $jenis->nama_pekerjaan") }}
            </h2>
        </div>
    </x-slot>

    <div class="container mx-auto px-4 py-6">
        <div class="flex items-center justify-center my-6">
            <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
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
                    <tbody>
    
                    @foreach ($temp as $item)
                    @if ($item->done==1) 
                        <tr class="bg-white border-b">
                            <td class="py-4 px-6">{{ App\Models\User::find($item->user_id)->name }}</td>
                            <td class="py-4 px-6">{{ $item->nama_perusahaan }}</td>
                            <td class="py-4 px-6">{{ $item->alamat_perusahaan }}</td>
                            <td class="py-4 px-6">{{ $item->mulai_bekerja }}</td>
                            <td class="py-4 px-6">{{ $item->selesai_bekerja }}</td>
                        </tr>
                    @else
                        <tr class="bg-white border-b">
                            <td class="py-4 px-6">{{ App\Models\User::find($item->user_id)->name }}</td>
                            <td class="py-4 px-6">{{ $item->nama_perusahaan }}</td>
                            <td class="py-4 px-6">{{ $item->alamat_perusahaan }}</td>
                            <td class="py-4 px-6">{{ $item->mulai_bekerja }}</td>
                            <td class="py-4 px-6">Sekarang</td>
                        </tr>
                    @endif
                    @endforeach
                    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-Admin-layout>
