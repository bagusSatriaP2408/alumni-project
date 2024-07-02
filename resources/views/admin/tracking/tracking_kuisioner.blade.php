<x-Admin-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center max-w-7xl mx-auto px-4">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Tracking') }}
            </h2>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 py-6">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Data Tracking Hasil Kuisioner</h3>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white table-auto">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="px-4 py-2 text-left text-gray-600">Nama Kuisioner</th>
                            <th class="px-4 py-2 text-left text-gray-600">Responden</th>
                            <th class="px-4 py-2 text-left text-gray-600">Hasil</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @foreach ($kuisioner as $k)
                        <tr class="border-b">
                            <td class="px-4 py-2">{{ $k->kuisioner }}</td>
                            <td class="px-4 py-2">{{ $count_respondan }}</td>
                            <td class="px-4 py-2">
                                @foreach ($tracking as $t)
                                    @if ($k->id_kuisioner == $t->id_kuisioner)
                                        <p>{{ $t->inputan }}: {{ $t->hasil_kuisioner->count() }}</p>
                                    @endif
                                @endforeach
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-Admin-layout>