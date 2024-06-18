<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Postingan Saya') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-4 gap-6">
                @forelse ($posts as $post)
                    <x-card>
                        <img src="{{ asset('storage/' . $post->gambar) }}" alt="{{ $post->judul }}" class="size-16 rounded-lg">
                        <h2>{{ $post->judul }}</h2>
                        <x-card.description>
                            {{ $post->deskripsi }}
                        </x-card.description>
                        <a href="{{ route('posts.show', $post) }}" class="underline text-blue-500">Detail</a>
                        <a href="{{ route('posts.edit', $post) }}" class="underline text-blue-500">Edit</a>
                        <form action="{{ route('posts.destroy', $post) }}" method="POST" class="mt-4">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="underline text-red-500">Hapus</button>
                        </form>
                    </x-card>
                @empty
                    <p>Tidak ada postingan.</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>