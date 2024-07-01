{{-- @if (session('error'))
@dd(session('error'))
@endif --}}
<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Tambah Pekerjaan') }}
        </h2>
        @if (session('error'))
            <div class="text-red-500">
                {{ session('error') }}
            </div>
        @endif
    </header>
    <form method="post" action="{{ route('profile.store_pekerjaan') }}" class="mt-6 space-y-6">
        @csrf
    
        <div>
            <x-input-label for="nama_pekerjaan" :value="__('Nama Pekerjaan')" />
            <x-text-input id="nama_pekerjaan" name="nama_pekerjaan" type="text" class="mt-1 block w-full" value="{{ old('nama_pekerjaan') }}" autocomplete="nama_pekerjaan" />
            <x-input-error :messages="$errors->get('nama_pekerjaan')" class="mt-2" />
        </div>
    
        <div>
            <x-input-label for="alamat_perusahaan" :value="__('Alamat Perusahaan')" />
            <x-textarea id="alamat_perusahaan" name="alamat_perusahaan" class="mt-1 block w-full" value="{{ old('alamat_perusahaan') }}" autocomplete="alamat_perusahaan" />
            <x-input-error :messages="$errors->get('alamat_perusahaan')" class="mt-2" />
        </div>
    
        <div>
            <x-input-label for="mulai_bekerja" :value="__('Mulai Bekerja')" />
            <x-text-input id="mulai_bekerja" name="mulai_bekerja" type="date" class="mt-1 block w-full" value="{{ old('mulai_bekerja') }}" autocomplete="mulai_bekerja" />
            <x-input-error :messages="$errors->get('mulai_bekerja')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="selesai_bekerja" :value="__('Selesai Bekerja')" />
            <x-text-input id="selesai_bekerja" name="selesai_bekerja" type="date" class="mt-1 block w-full" value="{{ old('selesai_bekerja') }}" autocomplete="selesai_bekerja" />
            <x-input-error :messages="$errors->get('selesai_bekerja')" class="mt-2" />
        </div>
    
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Simpan') }}</x-primary-button>
        </div>
    </form>
</section>