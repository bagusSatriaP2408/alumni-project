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
	</div>
</div>