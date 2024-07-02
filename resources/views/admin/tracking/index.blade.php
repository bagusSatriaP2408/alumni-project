
<x-Admin-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center max-w-7xl mx-auto px-4">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Tracking') }}
            </h2>
        </div>
    </x-slot>

    <div class="container mx-auto px-4 py-6">
        <!-- Konten Tracking -->
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Data Tracking Hasil Kuisioner</h3>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white">
                    <thead>
                        <tr>
                            <th class="w-1/4 px-4 py-2">Nama Kuisioner</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Data Kuisioner -->
                        @foreach($main_kuisioner as $result)
                            <tr>
                                <td class="border px-4 py-2">
                                <a href="{{route('tracking.kuisioner',['id'=>$result->id_main_kuisioner])}}">{{ $result->subject }}</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <h3 class="text-lg font-medium text-gray-900 mt-6 mb-4">Data Tracking Pekerjaan</h3>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white">
                    <thead>
                        <tr>
                            <td class="w-1/4 px-4 py-2">Nama Pekerjaan</td>
                            <td class="w-1/4 px-4 py-2">Jumlah Alumni</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jenisPekerjaan as $jp)
                            <tr>
                                <td><a href="{{route('tracking.pekerjaan',['id'=>$jp->id_jenis_pekerjaan])}}">{{ $jp->nama_pekerjaan }}</a></td>
                                @php
                                    $count=0
                                @endphp
                                @foreach ($pekerjaan as $jum)
                                    @if ($jp->id_jenis_pekerjaan == $jum->jenis_pekerjaan_id)
                                        @php
                                            $count++
                                        @endphp
                                    @endif
                                @endforeach
                                <td>{{ $count }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-Admin-layout>
