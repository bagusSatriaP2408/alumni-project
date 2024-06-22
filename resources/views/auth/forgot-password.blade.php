<x-guest-layout>
@if(!session('emailSubmitted'))
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('send.code') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Token') }}
            </x-primary-button>
        </div>
    </form>
@endif
@if(session('emailSubmitted'))

<div class="container mx-auto my-5 p-5 rounded bg-white shadow-lg">
    <div class="text-center">
        <h3 class="text-gray-600 text-lg font-semibold">Masukkan kode unik yang telah dikirim ke email anda.</h3>
    </div>

    <form method="POST" action="{{route('confirm.code')}}" class="mt-4">
        @csrf
        <div class="mb-3">
            <input type="text" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500 @error('code') border-red-500 @enderror"
                   name="code" id="code" placeholder="Masukkan kode unik">
            @error('code')
                <div class="text-red-500 text-sm mt-1">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="flex justify-center">
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">
                Konfirmasi Kode
            </button>
        </div>
    </form>
</div>

@endif
</x-guest-layout>
