<x-app-layout>
    <div class="search p-5">
        <div class="text_search text-center mb-5">
            <h1 class="text-3xl font-semibold">Cari Lulusan</h1>
        </div>
        <div class="w-9/12 px-3 mx-auto"> 
            <form class="flex" action="{{ route('search.search') }}" method="post">
                @csrf
                <div class="flex items-center w-full"> 
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
                    
                    <button type="submit" class="ml-2 px-4 py-2 bg-blue-700 text-white rounded-lg hover:bg-blue-800 focus:outline-none focus:bg-blue-800">Cari</button>

                </div>
            </form>
        </div>
    </div>

    <div class="flex flex-wrap justify-center mt-5 mx-auto w-10/12">
        @foreach($users as $user)
            <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-8">
                <div class="bg-white rounded-lg shadow-lg p-6 text-center">
                    <img class="w-32 h-32 object-cover rounded-full mx-auto" src="{{ ($user->gambar) == null ? asset('storage/images/posts/profile-none.jpeg') : asset('storage/' . $user->gambar) }}" alt="{{ $user->name }}">
                    <div class="px-6 py-2">
                        <div class="text-xl font-semibold text-gray-800">{{ $user->name }}</div>
                        <p class="text-gray-600">{{ $user->prodi }}</p>
                    </div>
                    <div class="px-6 py-2">
                        <span class="inline-block px-2 py-1 font-semibold text-blue-900 bg-blue-200 rounded-lg">{{ $user->tahun_masuk }}</span>
                        <span class="inline-block px-2 py-1 font-semibold text-red-900 bg-red-200 rounded-lg">{{ $user->tahun_lulus }}</span>
                    </div>
                    <div class="px-6 py-4">
                        <a href="{{route('profile.show',$user->id)}}" class="text-blue-500 hover:underline bg-blue-700 text-white px-4 py-2 rounded-lg">Lihat Selengkapnya</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {{-- PAGINATION LINKS --}}
    <div class="mt-6 mx-auto w-10/12 px-4">
        {{ $users->links('custom.pagination') }}
    </div>
    
</x-app-layout>
