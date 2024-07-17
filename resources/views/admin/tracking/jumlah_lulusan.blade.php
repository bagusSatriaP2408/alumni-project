<x-Admin-layout>
    
    <x-slot name="header">
        <div class="flex justify-between items-center max-w-7xl mx-auto px-4">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Tracking') }}
            </h2>
        </div>
    </x-slot>
    <div class="container mx-auto px-4 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <a href="{{ route('tracking.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
            Kembali
        </a>
    </div>
<div class="search p-5">
        <div class="text_search text-center mb-5">
            <h1 class="text-3xl font-semibold">Cari Lulusan</h1>
        </div>
        <div class="w-9/12 px-3 mx-auto"> <!-- Menyesuaikan lebar dan posisi tengah -->
            <form class="flex" action="{{ route('tracking.search.search') }}" method="post">
                @csrf
                <div class="flex items-center w-full"> <!-- Menggunakan w-full untuk memenuhi lebar form -->
                    <input name="search" class="w-full px-3 py-2 rounded-lg border-2 border-gray-200 focus:outline-none focus:border-blue-500"
                        type="search" placeholder="Name" aria-label="Search">
                    <input name="tahun_masuk" class="ml-2 w-40 px-3 py-2 rounded-lg border-2 border-gray-200 focus:outline-none focus:border-blue-500"
                        type="search" placeholder="Tahun Masuk" aria-label="Search">

                    <select name="prodi" class="ml-2 w-40 px-3 py-2 rounded-lg border-2 border-gray-200 focus:outline-none focus:border-blue-500">
                        <option value="" selected>Semua Prodi</option>
                        @foreach ($prodis as $prodi)
                            <option value="{{ $prodi->id }}">{{ $prodi->name }}</option> 
                        @endforeach
                    </select>

                    <select name="pekerjaan" class="ml-2 w-40 py-2 rounded-lg border-2 border-gray-200 focus:outline-none focus:border-blue-500">
                        <option value="" selected>Semua Pekerjaan</option>
                        @foreach ($jenisPekerjaan as $pekerjaan)
                            <option value="{{ $pekerjaan->id_jenis_pekerjaan }}">{{ $pekerjaan->nama_pekerjaan }}</option> 
                        @endforeach
                    </select>
                    
                    <button type="submit"
                        class="ml-2 px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:outline-none focus:bg-blue-600">
                        Cari</button>
                </div>
            </form>
        </div>
    </div>

    <div class="result bg-gray-100 px-5 mt-5">

        <table class="table-auto w-10/12 bg-white shadow-md rounded my-6 overflow-x-auto mx-auto">
            <thead class="bg-gray-200">
                <tr>
                    <th class="py-2 px-4 border-b text-left">No</th>
                    <th class="py-2 px-4 border-b text-left">Nama</th>
                    <th class="py-2 px-4 border-b text-left">Email</th>
                    <th class="py-2 px-4 border-b text-left">Tahun Masuk</th>
                    <th class="py-2 px-4 border-b text-left">Tahun Lulus</th>
                    <th class="py-2 px-4 border-b text-left">Prodi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $index => $user)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $index + 1 }}</td>
                    <td class="py-2 px-4 border-b">
                        <p>{{ $user->name }}</p>
                    </td>
                    <td class="py-2 px-4 border-b">{{ $user->email }}</td>
                    <td class="py-2 px-4 border-b">{{ $user->tahun_masuk }}</td>
                    <td class="py-2 px-4 border-b">{{ $user->tahun_lulus }}</td>
                    <td class="py-2 px-4 border-b">{{ $user->prodi }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-Admin-layout>