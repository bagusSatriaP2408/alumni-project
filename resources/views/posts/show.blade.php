<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detail Postingan
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-4">
                        <img src="{{ asset('storage/' . $post->gambar) }}" alt="{{ $post->judul }}" class="w-full object-cover" style="height: 300px;">
                    </div>
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        {{ $post->judul }}
                    </h3>
                    <p class="mt-2 text-base text-gray-500">
                        {{ $post->deskripsi }}
                    </p>
                    <a href="{{ url()->previous() }}" class="mt-4 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                        Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>