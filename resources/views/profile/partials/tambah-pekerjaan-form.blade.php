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

        {{-- <div>
            <x-input-label for="nama_perusahaan" :value="__('Nama Perusahaan')" />
            <x-text-input id="nama_perusahaan" name="nama_perusahaan" class="mt-1 block w-full" value="{{ old('nama_perusahaan') }}" autocomplete="nama_perusahaan" />
            <x-input-error :messages="$errors->get('nama_perusahaan')" class="mt-2" />
        </div> --}}

        {{-- Bagian Dropdown Perusahaan --}}
        <div class="mt-4">
            <label for="nama_perusahaan" class="block text-sm font-medium text-gray-700">Nama Perusahaan</label>
            <select id="nama_perusahaan" name="nama_perusahaan" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" onchange="toggleNewCompanyInput(this)">
                <option value="">Pilih Perusahaan</option>
                @foreach ($vendors as $vendor)
                    <option value="{{ $vendor->id }}">{{ $vendor->nama_perusahaan }}</option>
                @endforeach
                <option value="new">Perusahaan Lainnya</option>
            </select>
        </div>

        {{-- Inputan Baru untuk Perusahaan Lainnya --}}
        <div class="mt-4" id="new_company_input" style="display: none;">
            <label for="new_nama_perusahaan" class="block text-sm font-medium text-gray-700">Nama Perusahaan Lainnya</label>
            <input type="text" id="new_nama_perusahaan" name="new_nama_perusahaan" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
        </div>

        <div class="mt-4">
            <label for="jenis_pekerjaan_id" class="block text-sm font-medium text-gray-700">Jenis Pekerjaan</label>
            <select id="jenis_pekerjaan_id" name="jenis_pekerjaan_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" onchange="toggleNewJobInput(this)">
                <option value="">Pilih Pekerjaan</option>
                @foreach ($jenis_pekerjaan as $item)
                    <option value="{{ $item->id_jenis_pekerjaan }}">{{ $item->nama_pekerjaan }}</option>
                @endforeach
                <option value="new">Pekerjaan Lainnya</option>
            </select>
        </div>
        
        <div class="mt-4" id="new_job_input" style="display: none;">
            <label for="new_jenis_pekerjaan" class="block text-sm font-medium text-gray-700">Nama Pekerjaan Baru</label>
            <input type="text" id="new_jenis_pekerjaan" name="new_jenis_pekerjaan" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
        </div>
        
        <div id="new_job_type" style="display: none;">   
            <label for="type" class="block text-sm font-medium text-gray-700">Tipe Pekerjaan</label>
            <div class="mt-1">
                <label class="inline-flex items-center">
                    <input type="radio" name="type" value="1" class="form-radio h-4 w-4 text-indigo-600">
                    <span class="ml-2">IT</span>
                </label>
                <label class="inline-flex items-center ml-6">
                    <input type="radio" name="type" value="0" class="form-radio h-4 w-4 text-indigo-600">
                    <span class="ml-2">Non IT</span>
                </label>
            </div>
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

    <script>
        function toggleNewCompanyInput(select) {
            let newCompanyInput = document.getElementById('new_company_input');
            if (select.value === 'new') {
                newCompanyInput.style.display = 'block';
            } else {
                newCompanyInput.style.display = 'none';
            }
        }

        function toggleNewJobInput(select) {
            let newJobInput = document.getElementById('new_job_input');
            let newJobType = document.getElementById('new_job_type');
            if (select.value === 'new') {
                newJobInput.style.display = 'block';
                newJobType.style.display = 'block';
            } else {
                newJobInput.style.display = 'none';
                newJobType.style.display = 'none';
            }
        }
    </script>
</section>