<x-app-layout>

    {{-- <x-slot name="title">
        Dashboard
    </x-slot> --}}
    @slot('title', 'Posts')
        
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-4 gap-6">
                @foreach ($posts as $post)
                    <x-card>
                        <img src="{{ asset('storage/' . $post->gambar) }}" alt="{{ $post->judul }}" class="size-16 rounded-lg">
                        <h2>{{ $post->judul }}</h2>
                        <x-card.description>
                            {{ $post->deskripsi }}
                        </x-card.description>

                        @auth
                            @if ($post->user_id === auth()->user()->id)
                                <a href="{{ route('posts.edit', $post) }}" class="underline text-blue-500">Edit</a>
                            @endif
                        @endauth
                    </x-card>
                @endforeach
            </div>
        </div>
    </div>
    
</x-app-layout>
