<x-app-layout>

    @slot('title', 'Postingan')

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6">
        <form action="{{ route('posts.index') }}" method="GET" class="mt-4">
            <div class="flex items-center">
                <select name="category" id="category" onchange="this.form.submit()" class="border border-gray-300 rounded-md px-5 py-1">
                    <option value="">Semua</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id_kategori }}" {{ request('category') == $category->id_kategori ? 'selected' : '' }}>{{ $category->nama_kategori }}</option>
                    @endforeach
                </select>
            </div>
        </form>
    </div>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 gap-6">
                @if ($posts->isEmpty())
                    <div class="col-span-2">
                        <div class="bg-white p-6 rounded-lg shadow-md">
                            <div class="flex items-center space-x-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                <p class="text-lg text-gray-600">Belum ada postingan</p>
                            </div>
                        </div>
                    </div>
                @else
                    @foreach ($posts as $post)
                        <div class="col-span-2 sm:col-span-1 md:col-span-1 lg:col-span-1 xl:col-span-1">
                            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg min-h-[450px]">
                                <img src="{{ asset('storage/' . $post->gambar) }}" alt="{{ $post->judul }}" class="w-full h-64 object-cover">
                                <div class="p-6">
                                    <h2 class="text-2xl font-bold text-gray-800">
                                        <a href="{{ route('posts.show', $post->slug) }}" class="underline">{{ Str::limit(ucwords($post->judul),40) }}</a>
                                    </h2>
                                    
                                    <p class="mt-2 text-gray-600">{{ Str::limit(ucfirst($post->deskripsi), 200) }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    
</x-app-layout>
