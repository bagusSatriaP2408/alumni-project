<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        
        <!-- NIM -->
        <div>
            <x-input-label for="nim" :value="__('NIM')" />
            <x-text-input id="nim" class="block mt-1 w-full" type="text" name="nim" :value="old('nim')" required autofocus autocomplete="nim" maxlength="12" />
            <x-input-error :messages="$errors->get('nim')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        
        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Tahun Masuk -->
        <div class="mt-4">
            <x-input-label for="tahun_masuk" :value="__('Tahun Masuk')" />
            <x-text-input id="tahun_masuk" class="block mt-1 w-full" type="text" name="tahun_masuk" :value="old('tahun_masuk')" required autocomplete="tahun_masuk" />
            <x-input-error :messages="$errors->get('tahun_masuk')" class="mt-2" />
        </div>

        <!-- Tahun Lulus -->
        <div class="mt-4">
            <x-input-label for="tahun_lulus" :value="__('Tahun Lulus')" />
            <x-text-input id="tahun_lulus" class="block mt-1 w-full" type="text" name="tahun_lulus" :value="old('tahun_lulus')" required autocomplete="tahun_lulus" />
            <x-input-error :messages="$errors->get('tahun_lulus')" class="mt-2" />
        </div>

        <!-- Dropdown -->
        <div class="mt-4">
            <x-input-label for="prodi" :value="__('prodi')" />
            <select id="prodi" name="prodi" class="block mt-1 w-full">
                <option value="">Pilih Prodi</option>
                @foreach ($prodi as $p )
                <option value="{{$p->id}}">{{$p->name}}</option>
                @endforeach
                
            </select>
            <x-input-error :messages="$errors->get('prodi')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
