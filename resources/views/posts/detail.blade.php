<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Postingan Saya') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 gap-6">
                @forelse ($posts as $post)
                    <div class="col-span-2 sm:col-span-1 md:col-span-1 lg:col-span-1 xl:col-span-1">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg min-h-[450px] flex flex-col justify-between">
                            <div>
                                {{-- GAMBAR POSTINGAN --}}
                                <img src="{{ asset('storage/' . $post->gambar) }}" alt="{{ $post->judul }}" class="w-full h-64 object-cover">

                                <div class="p-6">
                                    {{-- JUDUL POSTINGAN --}}
                                    <h2 class="text-2xl font-bold text-gray-800">
                                        {{ Str::limit(ucwords($post->judul),40) }}
                                    </h2>
                                    {{-- DESKRIPSI POSTINGAN --}}
                                    <p class="mt-2 text-gray-500 font-light">{{ Str::limit(ucfirst($post->deskripsi), 140) }}</p>
                                    {{-- TANGGAL DAN KATEGORI --}}
                                    <div class="flex gap-2 my-2">
                                        <span class="flex items-center text-sm text-gray-500 font-semibold">
                                            <i class="fas fa-calendar-alt text-blue-700 mr-2"></i>
                                            {{ \Carbon\Carbon::parse($post->created_at)->isoFormat('D MMM YYYY') }}
                                        </span>
                                        <span class="inline-block bg-blue-700 text-gray-100 text-xs font-semibold px-2 py-1 rounded-full tracking-wide hover:bg-blue-800 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                                            {{ $categories->where('id_kategori', $post->kategori_id)->first()->nama_kategori }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="p-6 flex gap-2">
                                {{-- TOMBOL DETAIL --}}
                                <a href="{{ route('posts.show', $post->slug) }}" class="mt-4 inline-flex items-center px-4 py-2 bg-blue-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-800 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">Detail</a>
                                {{-- TOMBOL EDIT --}}
                                <a href="{{ route('posts.edit', $post) }}" class="mt-4 inline-flex items-center px-4 py-2 bg-green-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-800 active:bg-green-900 focus:outline-none focus:border-green-900 focus:ring ring-green-300 disabled:opacity-25 transition ease-in-out duration-150">Edit</a>
                                {{-- TOMBOL HAPUS --}}
                                <form action="{{ route('posts.destroy', $post) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="confirmDelete(event)" class="mt-4 inline-flex items-center px-4 py-2 bg-red-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-800 active:bg-red-900 focus:outline-none focus:border-red-900 focus:ring ring-red-300 disabled:opacity-25 transition ease-in-out duration-150">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-2">
                        <div class="bg-white p-6 rounded-lg shadow-md">
                            <div class="flex items-center space-x-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                <p class="text-lg text-gray-600">Anda belum memposting apapun</p>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <script>
        function confirmDelete(event) {
            event.preventDefault();
            const form = event.target.form; 
            const confirmed = confirm('Apakah Anda yakin ingin menghapus postingan ini?');
            if (confirmed) {
                form.submit();
            }
        }
    </script>

</x-app-layout>