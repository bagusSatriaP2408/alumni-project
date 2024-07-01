{{-- @if (session('error'))
@dd(session('error'))
@endif --}}

{{-- @dd($jenis_pekerjaan) --}}

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
            <x-input-label for="nama_perusahaan" :value="__('Nama Perusahaan')" />
            <x-text-input id="nama_perusahaan" name="nama_perusahaan" class="mt-1 block w-full" value="{{ old('nama_perusahaan') }}" autocomplete="nama_perusahaan" />
            <x-input-error :messages="$errors->get('nama_perusahaan')" class="mt-2" />
        </div>

        <div class="mt-4">
            <label for="jenis_pekerjaan_id" class="block text-sm font-medium text-gray-700">nama pekerjaan</label>
            <select id="jenis_pekerjaan_id" name="jenis_pekerjaan_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                <option value="">Pilih Pekerjaan</option>
                @foreach ($jenis_pekerjaan as $item)
                    <option value="{{ $item->id_jenis_pekerjaan }}">{{ $item->nama_pekerjaan}}</option>
                @endforeach
            </select>
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

        {{-- <div>
            <x-input-label for="selesai_bekerja" :value="__('Selesai Bekerja')" />
            <x-text-input id="selesai_bekerja" name="selesai_bekerja" type="date" class="mt-1 block w-full" value="{{ old('selesai_bekerja') }}" autocomplete="selesai_bekerja" />
            <x-input-error :messages="$errors->get('selesai_bekerja')" class="mt-2" />
        </div> --}}
    
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Simpan') }}</x-primary-button>
        </div>
    </form>
</section>