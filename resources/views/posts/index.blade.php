<x-app-layout>

    @slot('title', 'Postingan')

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6 grid grid-cols-12 gap-6">
        <div class="col-span-8">
            {{-- JIKA BELUM ADA POSTINGAN --}}
            @if ($posts->isEmpty())
                <div class="col-span-2">
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <div class="flex items-center space-x-4">
                            <i class="fas fa-exclamation-circle text-blue-700 text-2xl"></i>
                            <p class="text-lg text-gray-500 font-thin">Belum ada postingan</p>
                        </div>
                    </div>
                </div>
            {{-- JIKA SUDAH ADA POSTINGAN --}}
            @else
                @foreach ($posts as $post)
                    <div class="bg-white overflow-hidden shadow-sm rounded-lg min-h-[450px] mb-6">
                        {{-- GAMBAR POSTINGAN --}}
                        <img src="{{ asset('storage/' . $post->gambar) }}" alt="{{ $post->judul }}" class="w-full h-96 object-cover">

                        <div class="p-6">
                            {{-- JUDUL POSTINGAN --}}
                            <h2>
                                <a href="{{ route('posts.show', $post->slug) }}" class="text-3xl font-bold text-gray-800 hover:text-blue-700 hover:underline">{{ Str::limit(ucwords($post->judul),40) }}</a>
                            </h2>
                            {{-- DESKRIPSI POSTINGAN --}}
                            <p class="mt-2 text-gray-500 font-light">{{ Str::limit(ucfirst($post->deskripsi), 200) }}</p>
                            {{-- TANGGAL DAN KATEGORI --}}
                            <div class="flex gap-2 my-2">
                                <span class="flex items-center text-sm text-gray-500 font-semibold">
                                    <i class="fas fa-calendar-alt text-blue-700 mr-2"></i>
                                    {{ \Carbon\Carbon::parse($post->created_at)->isoFormat('D MMM YYYY') }}
                                </span>
                                <a href="{{ route('posts.filterByCategory', ['categoryId' => $post->kategori_id]) }}" class="inline-block bg-blue-700 text-gray-100 text-xs font-semibold px-2 py-1 rounded-full tracking-wide hover:bg-blue-800 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                                    {{ $categories->where('id_kategori', $post->kategori_id)->first()->nama_kategori }}
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{-- PAGINATION LINKS --}}
                <div class="mt-6">
                    {{ $posts->links('custom.pagination') }}
                </div>
            @endif
        </div>

        {{-- ASIDE --}}
        <aside class="col-span-4">
            {{-- POSTINGAN TERBARU --}}
            <div class="bg-white p-8 rounded-lg mb-6">
                <h2 class="text-xl font-bold text-gray-800 mb-4">Postingan Terbaru</h2>
                <div>
                    @foreach ($newest_posts as $post)
                        <div class="grid grid-cols-8 gap-5 my-4">
                            {{-- GAMBAR POSTINGAN --}}
                            <img src="{{ asset('storage/' . $post->gambar) }}" alt="{{ $post->judul }}" class="w-full max-h-24 object-cover col-span-3 rounded-lg">

                            <div class="col-span-5">
                                {{-- JUDUL POSTINGAN --}}
                                <h3>
                                    <a href="{{ route('posts.show', $post->slug) }}" class="font-bold text-gray-800 hover:text-blue-700 hover:underline">{{ Str::limit(ucwords($post->judul),60) }}</a>
                                </h3>
                                {{-- TANGGAL POSTINGAN --}}
                                <span class="text-xs text-gray-500 font-semibold">{{ \Carbon\Carbon::parse($post->created_at)->isoFormat('D MMM YYYY') }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            {{-- KATEGORI POSTINGAN --}}
            <div class="bg-white p-8 rounded-lg">
                <h2 class="text-xl font-bold text-gray-800 mb-4">Kategori</h2>
                
                <ul class="list-none flex items-start flex-wrap mt-4">
                    @foreach ($categories as $category)
                        <li class="flex mx-1">
                            <a href="{{ route('posts.filterByCategory', ['categoryId' => $category->id_kategori]) }}" class="p-2 px-3 mb-4 rounded-full font-semibold bg-blue-700 text-gray-100 tracking-wide hover:bg-blue-800 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">{{ $category->nama_kategori }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </aside>
    </div>
    
</x-app-layout>
