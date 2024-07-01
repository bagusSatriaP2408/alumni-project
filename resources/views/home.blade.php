<x-app-layout>
    @slot('title', 'Home')
        
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    Selamat datang
                </div>
            </div>
        </div>
    </div> --}}

    <div class="relative bg-gradient-to-r from-purple-600 to-blue-600 h-screen text-white overflow-hidden" style="max-height: calc(100vh - 65px)">
        <div class="absolute inset-0">
          <img src="{{ asset('storage/images/trunojoyo.jpg') }}" alt="Background Image" class="object-cover object-center w-full h-full" />
          <div class="absolute inset-0 bg-black opacity-50"></div>
        </div>
        
        <div class="relative z-10 flex flex-col justify-center items-center h-full text-center">
          <h1 class="text-5xl font-bold leading-tight mb-4 max-w-4xl">SELAMAT DATANG DI UNIVERSITAS TRUNOJOYO MADURA</h1>
        </div>
    </div>
    
</x-app-layout>
