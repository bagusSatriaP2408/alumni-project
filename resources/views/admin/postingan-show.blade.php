<x-Admin-layout>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-16 bg-white border-b border-gray-200">
                    
                    <div class="mb-2 rounded-lg overflow-hidden">
                        <img src="{{ asset('storage/' . $post->gambar) }}" alt="{{ $post->judul }}" class="w-full object-cover">
                    </div>

                    <p class="text-sm text-gray-500 mb-2 text-right">Diposting oleh {{ ucwords($post->user->name) }} pada {{ $post->created_at->format('d M Y') }}</p>
                    <h2 class="text-4xl font-bold text-gray-800">
                        {{ ucwords($post->judul) }}
                    </h2>
                    <p class="mt-2 text-base text-gray-500 text-justify">
                        {{ $post->deskripsi }}
                    </p>
                    <a href="{{ url()->previous() }}" class="mt-4 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                        Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-Admin-layout>