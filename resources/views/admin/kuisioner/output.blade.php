<x-Admin-layout>
    <div class="container mx-auto px-4">
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('List Kuisioner') }}
            </h2>
        </x-slot>
        <div class="container mx-auto px-4 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <a href="{{ route('admin.kuisioner') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
            Kembali
        </a>
        </div>

        <div class="flex justify-center max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="w-full">
                <div class="bg-white shadow-md rounded my-6 overflow-x-auto">
                    <table class="min-w-max w-full table-auto text-center">
                        <thead class="bg-gray-200">
                            <tr>
                                <th class="py-2 px-4 border-b">No</th>
                                <th class="py-2 px-4 border-b">Subject</th>
                                <th class="py-2 px-4 border-b">Output</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kuisioner as $n)
                                <tr class="border-b">
                                    <td class="py-2 px-4">{{ $n->id_kuisioner }}</td>
                                    <td class="py-2 px-4">{{ ucwords($n->kuisioner) }}</td>
                                    <td class="py-2 px-4">
                                        <a href="{{ route('admin.kuisioner.output_create', ['id' => $n->id_kuisioner,'id_main'=>$n->id_main_kuisioner]) }}" class="inline-flex items-center justify-center bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded transition duration-150 ease-in-out">Tambah</a>
                                        <a href="{{ route('admin.kuisioner.output_edit', ['id' => $n->id_kuisioner,'id_main'=>$n->id_main_kuisioner]) }}" class="inline-flex items-center justify-center bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition duration-150 ease-in-out">Edit</a>
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
