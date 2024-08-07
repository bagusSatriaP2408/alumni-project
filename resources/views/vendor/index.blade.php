<x-app-layout>
    @slot('title')
        Vendor
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

        <div class="flex items-center justify-center my-4">
			<a href="{{ route('vendor.daftar-vendor') }}" class="inline-flex items-center bg-white text-gray-700 font-semibold py-2 px-4 rounded-lg transition duration-300 ease-in-out hover:bg-gray-200 focus:outline-none gap-2 shadow-md my-2">
				<span>
					Lihat Selengkapnya
				</span>
				<svg class="w-4" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
					viewBox="0 0 24 24" class="w-6 h-6 ml-2">
					<path d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
				</svg>
			</a>
		</div>

        <div class="max-w-2xl mx-auto mt-12 px-4 text-center my-12">
            <div class="w-full max-w-3xl mx-auto">
                <h1 class="text-4xl font-bold mt-2 mb-6">Bantu Kami Meningkatkan Kualitas Alumni Kami</h1>
                <p class="px-4 leading-relaxed">Kami mengundang perusahaan tempat alumni kami bekerja untuk mengisi kuisioner singkat. Dengan umpan balik Anda, kami dapat terus meningkatkan program pendidikan kami dan mempersiapkan lulusan yang lebih baik.
                </p>
                <p class="mb-8 mt-4 px-4 leading-relaxed font-bold">Partisipasi Anda sangat berharga bagi kami!</p>
                <div>
                    <a class="inline-block py-4 px-8 leading-none text-white bg-gray-800 hover:bg-gray-600 rounded shadow text-sm font-bold"
                        href="{{ route('vendor.verifikasi') }}">Isi Kuisioner Sekarang</a>
                </div>
            </div>
        </div>
        

    </div>

    @include('components.footer')
</x-app-layout>
