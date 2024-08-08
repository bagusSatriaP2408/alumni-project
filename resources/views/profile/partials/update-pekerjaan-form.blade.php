@php
    $pekerjaan = App\Models\Pekerjaan::find($index);
    $vendor = App\Models\Vendor::where('id', $pekerjaan->vendor_id)->first();
    $jenis_pekerjaan = App\Models\JenisPekerjaan::find($pekerjaan->jenis_pekerjaan_id)
@endphp
<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Pekerjaan Saat Ini') }}
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

        <h3>Nama Pekerjaan : {{ $jenis_pekerjaan->nama_pekerjaan }}</h3>
        <h3>Nama Perusahaan : {{ $vendor->nama_perusahaan }}</h3>
        <h3>Alamat Perusahaan : {{ $vendor->alamat_perusahaan }}</h3>
        <h3>Mulai Bekerja : {{ $pekerjaan->mulai_bekerja }}</h3>

        <input type="hidden" value="{{ $index }}" id="index" name="index">
        <input type="hidden" value="{{ $pekerjaan->mulai_bekerja }}" id="mulai_bekerja" name="mulai_bekerja">

        <div>
            <x-input-label for="selesai_bekerja" :value="__('Selesai Bekerja? pilih tanggal anda keluar')" />
            <x-text-input id="selesai_bekerja" name="selesai_bekerja" type="date" class="mt-1 block w-full" autocomplete="selesai_bekerja" />
            <x-input-error :messages="$errors->get('selesai_bekerja')" class="mt-2" />
        </div>
    
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Simpan') }}</x-primary-button>
    
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
