<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            @if (!$user->gambar == null)
                <div class="mb-4 relative">
                    <label for="gambar" class="relative">
                        <img src="{{ asset('storage/' . $user->gambar) }}" alt="Profile Picture" class="max-w-64 h-auto rounded-full cursor-pointer">
                        <span class="absolute inset-0 flex items-center justify-center bg-gray-500 bg-opacity-50 text-white text-sm font-medium rounded-full opacity-0 transition-opacity duration-300 hover:opacity-100 cursor-pointer max-w-64">
                            Ubah
                        </span>
                    </label>
                </div>
            @else
                <div class="mb-4 relative">
                    <label for="gambar" class="relative">
                        <img src="{{ asset('storage/images/posts/profile-none.jpeg') }}" alt="Profile Picture" class="max-w-64 h-auto rounded-full cursor-pointer">
                        <span class="absolute inset-0 flex items-center justify-center bg-gray-500 bg-opacity-50 text-white text-sm font-medium rounded-full opacity-0 transition-opacity duration-300 hover:opacity-100 cursor-pointer max-w-64">
                            Ubah
                        </span>
                    </label>
                </div>
            @endif
            {{-- <x-input-label for="gambar" class="sr-only" :value="__('Picture')" /> --}}
            <input id="gambar" type="file" name="gambar" class="hidden" />
            <x-input-error :messages="$errors->get('gambar')"/>
        </div>

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="mt-4">
            <label for="nim" class="block text-sm font-medium text-gray-700">NIM</label>
            <input type="text" name="nim" id="nim" value="{{ old('nim', $user->nim) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
        </div>
        
        <div class="mt-4">
            <label for="tahun_masuk" class="block text-sm font-medium text-gray-700">Tahun Masuk</label>
            <input type="number" name="tahun_masuk" id="tahun_masuk" value="{{ old('tahun_masuk', $user->tahun_masuk) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
        </div>
        
        <div class="mt-4">
            <label for="tahun_lulus" class="block text-sm font-medium text-gray-700">Tahun Lulus</label>
            <input type="number" name="tahun_lulus" id="tahun_lulus" value="{{ old('tahun_lulus', $user->tahun_lulus) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
        </div>
        
        <div class="mt-4">
            <label for="prodi" class="block text-sm font-medium text-gray-700">Prodi</label>
            <select id="prodi" name="prodi" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                @foreach (\App\Models\Prodi::all() as $prodi)
                    <option value="{{ $prodi->id }}" {{ (old('prodi', $user->prodi) == $prodi->id) ? 'selected' : '' }}>{{ $prodi->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
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
