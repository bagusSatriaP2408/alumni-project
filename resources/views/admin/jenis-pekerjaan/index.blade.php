<x-Admin-layout>
    <div class="container mx-auto px-4">
        <x-slot name="header">
            <div class="flex justify-between items-center max-w-7xl mx-auto">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Daftar Jenis Pekerjaan') }}
                </h2>
                <a href="{{ route('jenis-pekerjaan.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Tambah Jenis Pekerjaan
                </a>
            </div>
        </x-slot>

        <div class="flex justify-center max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="w-full">
                <div class="bg-white shadow-md rounded my-6 overflow-x-auto">
                    <table class="min-w-max w-full table-auto text-center">
                        <thead class="bg-gray-200">
                            <tr>
                                <th class="py-2 px-4 border-b">No</th>
                                <th class="py-2 px-4 border-b">Jenis Pekerjaan</th>
                                <th class="py-2 px-4 border-b">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pekerjaans as $pekerjaan)
                                <tr class="border-b">
                                    <td class="py-2 px-4">{{ $loop->iteration }}</td>
                                    <td class="py-2 px-4">{{ ucwords($pekerjaan->nama_pekerjaan) }}</td>
                                    <td class="py-2 px-4">
                                        <div class="flex flex-col sm:flex-row sm:justify-center sm:items-center">
                                            <a href="{{ route('jenis-pekerjaan.edit', $pekerjaan->id_jenis_pekerjaan) }}" class="mb-2 sm:mb-0 sm:mr-2 inline-flex items-center justify-center bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded transition duration-150 ease-in-out">Edit</a>
                                            <form action="{{ route('jenis-pekerjaan.destroy', $pekerjaan) }}" method="POST" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Apakah anda yakin ingin menghapus?')" class="inline-flex items-center justify-center bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded transition duration-150 ease-in-out">Delete</button>
                                            </form>
                                        </div>
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
