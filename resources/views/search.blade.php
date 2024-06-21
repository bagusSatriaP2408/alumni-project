<x-app-layout>
    <div class="search p-5">
        <div class="text_search text-center mb-5">
            <h1 class="text-3xl font-semibold">Search</h1>
        </div>
        <div class="w-full md:w-2/3 lg:w-1/2 xl:w-1/2 px-3 mx-auto"> <!-- Menyesuaikan lebar dan posisi tengah -->
            <form class="flex" action="{{ route('search.search') }}" method="post">
                @csrf
                <div class="flex items-center w-full"> <!-- Menggunakan w-full untuk memenuhi lebar form -->
                    <input name="search" class="w-full px-3 py-2 rounded-lg border-2 border-gray-200 focus:outline-none focus:border-blue-500"
                        type="search" placeholder="Name" aria-label="Search">
                    <input name="tahun_masuk" class="ml-2 w-40 px-3 py-2 rounded-lg border-2 border-gray-200 focus:outline-none focus:border-blue-500"
                        type="search" placeholder="Tahun Masuk" aria-label="Search">
                    <input name="prodi" class="ml-2 w-40 px-3 py-2 rounded-lg border-2 border-gray-200 focus:outline-none focus:border-blue-500"
                        type="search" placeholder="Prodi" aria-label="Search">
                    <button type="submit"
                        class="ml-2 px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:outline-none focus:bg-blue-600">
                        Search</button>
                </div>
            </form>
        </div>
    </div>

    <div class="result bg-gray-100 p-5 mt-5">
        <table class="table-auto w-full bg-white shadow-md rounded my-6 overflow-x-auto">
            <thead class="bg-gray-200">
                <tr>
                    <th class="py-2 px-4 border-b text-left">No</th>
                    <th class="py-2 px-4 border-b text-left">nama</th>
                    <th class="py-2 px-4 border-b text-left">Tahun Masuk</th>
                    <th class="py-2 px-4 border-b text-left">Prodi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $index => $user)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $index + 1 }}</td>
                    <td class="py-2 px-4 border-b">
                        <a href="{{route('profile.show',$user->id)}}">{{ $user->name }}</a>
                    </td>
                    <td class="py-2 px-4 border-b">{{ $user->tahun_masuk }}</td>
                    <td class="py-2 px-4 border-b">{{ $user->prodi }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
