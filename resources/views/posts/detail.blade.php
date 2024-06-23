<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Postingan Saya') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 gap-6">
                @forelse ($posts as $post)
                    <div class="col-span-2 sm:col-span-1 md:col-span-1 lg:col-span-1 xl:col-span-1">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg min-h-[400px] flex flex-col justify-between">
                            <div>
                                <img src="{{ asset('storage/' . $post->gambar) }}" alt="{{ $post->judul }}" class="w-full h-64 object-cover">
                                <div class="p-6">
                                    <h2 class="text-2xl font-bold text-gray-800">
                                        {{ Str::limit(ucwords($post->judul),40) }}
                                    </h2>
                                    <p class="mt-2 text-gray-600">{{ Str::limit(ucfirst($post->deskripsi), 140) }}</p>
                                </div>
                            </div>
                            <div class="p-6">
                                <a href="{{ route('posts.show', $post->slug) }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Detail</a>
                                <a href="{{ route('posts.edit', $post) }}" class="inline-block bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                                <form action="{{ route('posts.destroy', $post) }}" method="POST" class="mt-4 inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="confirmDelete(event)" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Hapus</button>
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