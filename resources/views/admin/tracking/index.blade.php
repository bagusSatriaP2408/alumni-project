<x-Admin-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center max-w-7xl mx-auto px-4">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Tracking') }}
            </h2>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto px-12 py-6">
        <!-- Konten Tracking -->
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Data Tracking Hasil Kuisioner</h3>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Kuisioner</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($main_kuisioner as $result)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <a href="{{route('tracking.kuisioner',['id'=>$result->id_main_kuisioner])}}" class="text-indigo-600 hover:text-indigo-900">{{ $result->subject }}</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <h3 class="text-lg font-medium text-gray-900 mt-6 mb-4">Data Tracking Pekerjaan</h3>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Pekerjaan</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jumlah Alumni</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($jenisPekerjaan as $jp)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <a href="{{route('tracking.pekerjaan',['id'=>$jp->id_jenis_pekerjaan])}}" class="text-indigo-600 hover:text-indigo-900">{{ $jp->nama_pekerjaan }}</a>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $pekerjaan->where('jenis_pekerjaan_id', $jp->id_jenis_pekerjaan)->count() }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-Admin-layout>