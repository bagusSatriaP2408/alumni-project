
<x-Admin-layout>

<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-4 gap-6">
                @foreach ($posts as $post)
                    <x-card>
                        <img src="{{ asset('storage/' . $post->gambar) }}" alt="{{ $post->judul }}" class="size-16 rounded-lg">
                        <h2>{{ $post->judul }}</h2>
                        <x-card.description>
                            {{ $post->user->email }}
                            {{ $post->deskripsi }}

                        </x-card.description>
                        <form action="{{ route('admin.postingan.delete', $post) }}" method="POST" class="mt-4">
                                @csrf
                                <!-- @method('DELETE') -->
                                <button type="submit" class="underline text-red-500">Hapus</button>
                        </form>
                    </x-card>
                @endforeach
            </div>
        </div>
    </div>
    </x-Admin-layout>