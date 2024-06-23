<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Update Pekerjaan') }}
        </h2>
        @if (session('error'))
            <div class="text-red-500">
                {{ session('error') }}
            </div>
        @endif
    </header>

    <form method="post" action="{{ route('profile.update_pekerjaan') }}" class="mt-6 space-y-6">
        @csrf
        @method('PATCH')
    
        <div>
            <x-input-label for="nama_pekerjaan" :value="__('Nama Pekerjaan')" />
            <x-text-input id="nama_pekerjaan" name="nama_pekerjaan" type="text" class="mt-1 block w-full" value="{{ old('nama_pekerjaan', Auth::user()->pekerjaan->nama_pekerjaan ?? '') }}" autocomplete="pekerjaan" />
            <x-input-error :messages="$errors->get('nama_pekerjaan')" class="mt-2" />
        </div>
    
        <div>
            <x-input-label for="alamat_perusahaan" :value="__('Alamat Perusahaan')" />
            <x-textarea id="alamat_perusahaan" name="alamat_perusahaan" class="mt-1 block w-full" autocomplete="alamat_perusahaan">{{ old('alamat_perusahaan', Auth::user()->pekerjaan->alamat_perusahaan ?? '') }}</x-textarea>
            <x-input-error :messages="$errors->get('alamat_perusahaan')" class="mt-2" />
        </div>
    
        <div>
            <x-input-label for="mulai_bekerja" :value="__('Mulai Bekerja')" />
            <x-text-input id="mulai_bekerja" name="mulai_bekerja" type="date" class="mt-1 block w-full" value="{{ old('mulai_bekerja', Auth::user()->pekerjaan->mulai_bekerja ?? '') }}" autocomplete="mulai_bekerja" />
            <x-input-error :messages="$errors->get('mulai_bekerja')" class="mt-2" />
        </div>
    
        <div>
            <x-input-label for="selesai_bekerja" :value="__('Selesai Bekerja')" />
            <x-text-input id="selesai_bekerja" name="selesai_bekerja" type="date" class="mt-1 block w-full" value="{{ old('selesai_bekerja', Auth::user()->pekerjaan->selesai_bekerja ?? '') }}" autocomplete="selesai_bekerja" />
            <x-input-error :messages="$errors->get('selesai_bekerja')" class="mt-2" />
        </div>
    
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
    
            @if (session('status') === 'pekerjaan-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
