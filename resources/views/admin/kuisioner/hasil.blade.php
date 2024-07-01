<x-Admin-layout>
<div class="container mx-auto px-4">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Hasil Kuisioner') }}
        </h2>
    </x-slot>
    <div class="flex justify-center max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="w-full">
            <div class="bg-white shadow-md rounded my-6">
                <table class="min-w-max w-full table-auto text-left">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="py-2 px-4 border-b">Email</th>
                            <th class="py-2 px-4 border-b">nama</th>
                            <th class="py-2 px-4 border-b">Kuisioner</th>
                            <th class="py-2 px-4 border-b">Hasil Kuisioner</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($hasilKuisioner as $h )
                            <tr class="border-b">
                                <td class="py-2 px-4">{{ $h->lulusan->email }}</td>
                                <td class="py-2 px-4">{{ $h->lulusan->name}}</td>
                                <td class="py-2 px-4">{{ $h->kuisioner->kuisioner}}</td>
                                <td class="py-2 px-4 break-words whitespace-pre-line max-w-xs">{{ $h->main_hasil_kuisioner->inputan}}</td>
                                </td>
                            </tr>

                    @endforeach    

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

    </x-Admin-layout>
