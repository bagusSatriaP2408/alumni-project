<x-Admin-layout>

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
                                <a href="{{ route('admin.postingan.show', $post->slug) }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Detail</a>
                                <form action="{{ route('admin.postingan.delete', $post) }}" method="POST" class="mt-4 inline-block">
                                        @csrf
                                        {{-- @method('DELETE')  --}}
                                        <button type="submit" onclick="confirmDelete(event)" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <p>Tidak ada postingan.</p>
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

</x-Admin-layout>