<x-Admin-layout>

<div class="container mx-auto px-4">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('List Kuisioner') }}
        </h2>
    </x-slot>
    <div class="flex justify-center max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="w-full">
            <div class="bg-white shadow-md rounded my-6">
                <table class="min-w-max w-full table-auto text-center">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="py-2 px-4 border-b">No</th>
                            <th class="py-2 px-4 border-b">Subject</th>
                            <th class="py-2 px-4 border-b">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kuisioner as $n)
                            <tr class="border-b">
                                <td class="py-2 px-4">{{ $loop->iteration }}</td>
                                <td class="py-2 px-4">{{ ucwords($n->kuisioner) }}</td>
                                <td class="py-2 px-4">                                
                                <select name="" id="" class="py-2 border rounded">
                                    <option value="">Opsi</option>
                                    @foreach ($n->main_hasil_kuisioner as $m)
                                        <option value="{{ $m->id_main_hasil_kuisioner }}">{{ $m->inputan }}</option>
                                    @endforeach
                                </select>

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
