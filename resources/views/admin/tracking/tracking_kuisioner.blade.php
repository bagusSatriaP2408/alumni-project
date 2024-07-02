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
                            <th class="w-1/4 px-4 py-2">Responden</th>
                            <th class="w-1/4 px-4 py-2">Hasil</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Data Kuisioner -->
                         @foreach ( $kuisioner as $k )
                         <tr>
                           
                            <td class="border px-4 py-2">{{ $k->kuisioner }}</td>
                            <td class="border px-4 py-2">{{ $count_respondan }}</td>
                            
                            <td class="border px-4 py-2">
                            @foreach ( $tracking as $t )
                            @if ($k->id_kuisioner==$t->id_kuisioner)
                                <p>{{$t->inputan}}={{$t->hasil_kuisioner->count()}}</p>
                            @endif
                                
                            @endforeach
                            </td>
                            
                         @endforeach
                        
                         </tr>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-Admin-layout>
