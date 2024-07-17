{{-- create.blade.php --}}

<x-Admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Buat Jenis Pekerjaan Baru') }}
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
                    <form id="jobTypeForm" action="{{route('jenis-pekerjaan.store')}}" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <label for="nama_pekerjaan" class="block text-sm font-medium text-gray-700">Nama Jenis Pekerjaan</label>
                            <input type="text" id="nama_pekerjaan" name="nama_pekerjaan" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                        </div>
                        <div>
                            <label for="type" class="block text-sm font-medium text-gray-700">Tipe Pekerjaan</label>
                            <div class="mt-1">
                                <label class="inline-flex items-center">
                                    <input type="radio" name="type" value="1" class="form-radio h-4 w-4 text-indigo-600">
                                    <span class="ml-2">IT</span>
                                </label>
                                <label class="inline-flex items-center ml-6">
                                    <input type="radio" name="type" value="0" class="form-radio h-4 w-4 text-indigo-600">
                                    <span class="ml-2">Non IT</span>
                                </label>
                            </div>
                        </div>
                        <div class="flex justify-end">
                            <button type="submit" class="px-4 py-2 bg-indigo-500 text-white rounded-md hover:bg-indigo-600">Simpan Jenis Pekerjaan</button>
                        </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-Admin-layout>