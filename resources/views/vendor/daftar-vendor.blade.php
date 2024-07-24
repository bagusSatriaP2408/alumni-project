<x-app-layout>
    @slot('title')
        Daftar Vendor
    @endslot

    <div class="max-w-7xl mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-4">Daftar Perusahaan Tempat Alumni Bekerja</h1>
        <p class="mb-6">Berikut adalah daftar perusahaan tempat para alumni kami bekerja. Kami sangat berterima kasih atas kesempatan yang diberikan kepada alumni kami untuk bergabung dan berkembang di perusahaan-perusahaan berikut:</p>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($vendors as $vendor)
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h2 class="text-xl font-bold mb-2">{{ $vendor->nama_perusahaan }}</h2>
                    <p class="text-gray-700 mb-4">{{ $vendor->alamat_perusahaan }}</p>
                </div>
            @endforeach
        </div>

    </div>

    @include('components.footer')
</x-app-layout>
