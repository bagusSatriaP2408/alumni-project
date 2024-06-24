<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                <form action="{{route('profile.gambar')}}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        @if (!$user->gambar == null)
                            <div class="mb-4">
                                <img src="{{ asset('storage/' . $user->gambar) }}" alt="Gambar Postingan" class="max-w-autoh">
                            </div>
                        @endif

                        <div>
                            <x-input-label for="gambar" class="sr-only" :value="__('gambar')" />
                            <input id="gambar" type="file" name="gambar"/>
                            <x-input-error :messages="$errors->get('gambar')"/>
                        </div>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"> submit</button>
                </form>
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>
            @if ($user->pekerjaan == null)
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.tambah-pekerjaan-form')
                    </div>
                </div>
            @else
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.update-pekerjaan-form')
                    </div>
                </div>
            @endif

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
