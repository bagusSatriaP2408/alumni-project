<x-Admin-layout>

    {{-- <x-slot name="title">
        Dashboard
    </x-slot> --}}
    @slot('title', 'Dashboard')
        
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Selamat Datang, Administrator Akademik") }}
                </div>
            </div>
        </div>
    </div>
    
</x-Admin-layout>
