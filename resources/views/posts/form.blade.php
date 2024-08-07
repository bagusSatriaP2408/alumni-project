<x-app-layout>

    @slot('title', $page_meta['title'])
        
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $page_meta['title'] }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-card class="max-w-2xl">
                <x-card.header>
                    <x-card.title>
                        {{ $page_meta['title'] }}
                    </x-card.title>
                </x-card.header>
                <x-card.content>
                    <form action="{{ $page_meta['url'] }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @method($page_meta['method'])
                        @csrf

                        @if($page_meta['method'] == 'PUT' && $posts->gambar)
                            <div class="mb-4">
                                <img src="{{ asset('storage/' . $posts->gambar) }}" alt="Gambar Postingan" class="max-w-autoh">
                            </div>
                        @endif

                        <div>
                            <x-input-label for="gambar" class="sr-only" :value="__('gambar')" />
                            <input id="gambar" type="file" name="gambar" class="mt-2 block w-full text-sm file:mr-4 file:rounded-md file:border-0 file:bg-blue-700 file:py-2 file:px-4 file:text-sm file:font-semibold file:text-white hover:file:bg-blue-800 focus:outline-none disabled:pointer-events-none disabled:opacity-60"/>
                            <x-input-error :messages="$errors->get('gambar')"/>
                        </div>

                        <div>
                            <x-input-label for="judul" :value="__('Judul Postingan')" />
                            <x-text-input id="judul" class="block mt-1 w-full" type="text" name="judul" :value="old('judul', $posts->judul)"/>
                            <x-input-error :messages="$errors->get('judul')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="deskripsi" :value="__('Deskripsi')" />
                            <x-textarea id="deskripsi" class="block mt-1 w-full" name="deskripsi">{{ old('deskripsi', $posts->deskripsi) }}</x-textarea>
                            <x-input-error :messages="$errors->get('deskripsi')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="kategori_id" :value="__('Kategori')" />
                            <select id="kategori_id" name="kategori_id" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id_kategori }}" @if(old('kategori_id', $posts->kategori_id) == $category->id_kategori) selected @endif>
                                        {{ $category->nama_kategori }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('kategori_id')" class="mt-2" />
                        </div>

                        <x-primary-button>Simpan</x-primary-button>

                    </form>
                </x-card.content>
            </x-card>
        </div>
    </div>
    
</x-app-layout>
