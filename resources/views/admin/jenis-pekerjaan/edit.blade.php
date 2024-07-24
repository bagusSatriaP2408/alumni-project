<x-Admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Jenis Pekerjaan') }}
        </h2>
    </x-slot>
    <div class="container mx-auto px-4 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <a href="{{ route('jenis-pekerjaan.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
            Kembali
        </a>
    </div>
    <div class="container mx-auto px-4 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-center">
            <div class="w-full max-wt-2xl">
                <div class="bg-white shadow-md rounded my-6 p-6">
                    <form id="editJobTypeForm" action="{{ route('jenis-pekerjaan.update', $jobType->id_jenis_pekerjaan) }}" method="POST" class="space-y-4">
                        @csrf
                        @method('PUT')
                        <div>
                            <label for="nama_pekerjaan" class="block text-sm font-medium text-gray-700">Nama Pekerjaan</label>
                            <input type="text" id="nama_pekerjaan" name="nama_pekerjaan" value="{{ $jobType->nama_pekerjaan }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                        </div>
                        <div class="flex justify-end">
                            <button type="submit" class="px-4 py-2 bg-indigo-500 text-white rounded-md hover:bg-indigo-600">Update Jenis Pekerjaan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-Admin-layout>