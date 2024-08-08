<x-app-layout>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-16 bg-white border-b border-gray-200">
                    {{-- GAMBAR POSTINGAN --}}
                    <div class="mb-2 rounded-lg overflow-hidden">
                        <img src="{{ asset('storage/' . $post->gambar) }}" alt="{{ $post->judul }}" class="w-full object-cover">
                    </div>
                    
                    <div class="flex justify-between items-center my-4">
                        {{-- TANGGAL DAN KATEGORI --}}
                        <div class="flex gap-2">
                            <span class="flex items-center text-sm text-gray-500 font-semibold">
                                <i class="fas fa-calendar-alt text-blue-700 mr-2"></i>
                                {{ \Carbon\Carbon::parse($post->created_at)->isoFormat('D MMM YYYY') }}
                            </span>
                            <a href="{{ route('posts.filterByCategory', ['categoryId' => $post->kategori_id]) }}" class="inline-block bg-blue-700 text-gray-100 text-xs font-semibold px-2 py-1 rounded-full hover:bg-blue-800">
                                {{ $categories->where('id_kategori', $post->kategori_id)->first()->nama_kategori }}
                            </a>
                        </div>
                        {{-- UPLOADER --}}
                        <div class="flex items-center justify-center gap-2">
                            <a href="{{route('profile.show',$post->user->id)}}">
                                {{-- JIKA PUNYA FOTO PROFIL --}}
                                @if ($post->user->gambar)
                                    <img src="{{ asset('storage/' . $post->user->gambar) }}" alt="{{ $post->user->name }}" class="w-8 h-8 object-cover rounded-full">
                                {{-- JIKA TIDAK PUNYA FOTO PROFIL --}}
                                @else
                                    <img src="{{ asset('storage/images/posts/profile-none.jpeg') }}" alt="{{ $post->user->name }}" class="w-8 h-8 object-cover rounded-full">
                                @endif
                            </a>
                        </div>
                    </div>
                    
                    <h2 class="text-4xl font-bold text-gray-800">
                        {{ ucwords($post->judul) }}
                    </h2>

                    <p class="mt-2 text-base text-gray-500 text-justify">
                        {{ $post->deskripsi }}
                    </p>

                    <a href="{{ route('posts.index') }}" class="mt-4 inline-flex items-center px-4 py-2 bg-blue-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-800 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                        Kembali
                    </a>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>