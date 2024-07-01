<x-Admin-layout>

<div class="container mx-auto px-4 ">
    {{-- <div class="header">
        <div class="flex justify-between items-center py-4 max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-semibold">Daftar Kuisioner</h2>
            <a href="{{route('admin.kuisioner.create')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Tambah
            </a>
        </div>
    </div> --}}
    <x-slot name="header">
        <div class="flex justify-between items-center max-w-7xl mx-auto">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Daftar Kuisioner') }}
            </h2>
            <a href="{{route('admin.kuisioner.create')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Tambah
            </a>
        </div>
    </x-slot>

    <div class="flex justify-center max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="w-full">
            <div class="bg-white shadow-md rounded my-6">
                <table class="min-w-max w-full table-auto">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="py-2 px-4 border-b">No</th>
                            <th class="py-2 px-4 border-b">Subject</th>
                            <th class="py-2 px-4 border-b">Info</th>
                            <th class="py-2 px-4 border-b">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($main_kuisioner as $m)
                            <tr class="border-b">
                                <td class="py-2 px-4">{{ $m->id_main_kuisioner }}</td>
                                <td class="py-2 px-4">{{ ucwords($m->subject) }}</td>
                                <td class="py-2 px-4">
                                    <a href="{{ route('admin.kuisioner.info', ['id' => $m->id_main_kuisioner]) }}" class="inline-flex items-center justify-center bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition duration-150 ease-in-out">Info</a>
                                    <a href="{{ route('admin.kuisioner.hasil', ['id' => $m->id_main_kuisioner]) }}" class="inline-flex items-center justify-center bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition duration-150 ease-in-out">Hasil</a>
                                </td>
                                <td class="py-2 px-4">
                                    <a href="{{ route('admin.kuisioner.output', ['id' => $m->id_main_kuisioner]) }}" class="inline-flex items-center justify-center bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded transition duration-150 ease-in-out">Output</a>
                                    <a href="{{ route('admin.kuisioner.edit', ['id' => $m->id_main_kuisioner]) }}" class="inline-flex items-center justify-center bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded transition duration-150 ease-in-out">Edit</a>
                                    <form action="{{ route('admin.kuisioner.delete',['id' => $m->id_main_kuisioner])}}" method="POST" class="inline-block">
                                        @csrf
                                        <button type="submit" onclick="return confirm('Apakah anda yakin ingin menghapus?')" class="inline-flex items-center justify-center bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded transition duration-150 ease-in-out">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
</div>

    </x-Admin-layout>
