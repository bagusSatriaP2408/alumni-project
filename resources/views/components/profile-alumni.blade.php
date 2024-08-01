<div class="bg-gray-100 py-8">
	<div class="container mx-auto px-8">
		<h2 class="text-4xl font-bold text-center mb-8">Profil Alumni</h2>
		<div class="flex flex-wrap justify-center -mx-4">
			@foreach($alumni as $alumnus)
				<div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-8">
					<div class="bg-white rounded-lg shadow-lg p-6 text-center">
						<img class="w-32 h-32 object-cover rounded-full mx-auto" src="{{ ($alumnus->gambar) == null ? asset('storage/images/posts/profile-none.jpeg') : asset('storage/' . $alumnus->gambar) }}" alt="{{ $alumnus->name }}">
						<div class="p-4">
							<h3 class="text-2xl font-semibold mb-2">{{ $alumnus->name }}</h3>
							<p class="text-gray-600 mb-2">Tahun Masuk: {{ $alumnus->tahun_masuk }}</p>
							<p class="text-gray-700">Tahun Lulus: {{ $alumnus->tahun_lulus }}</p>
						</div>
					</div>
				</div>
			@endforeach
		</div>
		<div class="flex items-center justify-center my-2">
			<a href="" class="inline-flex items-center bg-white text-gray-700 font-semibold py-2 px-4 rounded-lg transition duration-300 ease-in-out hover:bg-gray-200 focus:outline-none gap-2 shadow-md my-2">
				<span>
					Lihat Selengkapnya
				</span>
				<svg class="w-4" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
					viewBox="0 0 24 24" class="w-6 h-6 ml-2">
					<path d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
				</svg>
			</a>
		</div>
	</div>
</div>