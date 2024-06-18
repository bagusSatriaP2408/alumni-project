<x-app-layout>

    {{-- <x-slot name="title">
        Dashboard
    </x-slot> --}}
    @slot('title', $page_meta['title'])
        
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $page_meta['title'] }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-card class="max-w-2xl">
                <x-card.header>
                    <x-card.title>
                        {{ $page_meta['title'] }}
                    </x-card.title>
                    <x-card.description>
                        {{ $page_meta['description'] }}
                    </x-card.description>
                </x-card.header>
                <x-card.content>
                    <form action="{{ $page_meta['url'] }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @method($page_meta['method'])
                        @csrf

                        <div>
                            <x-input-label for="gambar" class="sr-only" :value="__('gambar')" />
                            <input id="gambar" type="file" name="gambar"/>
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

                        <x-primary-button>Simpan</x-primary-button>

                    </form>
                </x-card.content>
            </x-card>
        </div>
    </div>
    
</x-app-layout>
