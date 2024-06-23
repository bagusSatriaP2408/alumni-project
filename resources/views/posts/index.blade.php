<x-app-layout>

    @slot('title', 'Postingan')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 gap-6">
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
            </div>
        </div>
    </div>
    
</x-app-layout>
