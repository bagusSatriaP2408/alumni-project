<div class="bg-gray-100 py-8">
	<div class="container mx-auto px-4">
		<h2 class="text-4xl font-bold text-center mb-8">Profil Alumni</h2>
		<div class="flex flex-wrap justify-center">
			@foreach($alumni as $user)
				<div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-8">
					<div class="bg-white rounded-lg shadow-lg p-6 text-center">
						<img class="w-32 h-32 object-cover rounded-full mx-auto" src="{{ ($user->gambar) == null ? asset('storage/images/posts/profile-none.jpeg') : asset('storage/' . $user->gambar) }}" alt="{{ $user->name }}">
						<div class="px-6 py-2">
							<div class="text-xl font-semibold text-gray-800">{{ $user->name }}</div>
							<p class="text-gray-600">{{ $user->prodi }}</p>
						</div>
						<div class="px-6 py-2">
							<span class="inline-block px-2 py-1 font-semibold text-blue-900 bg-blue-200 rounded-lg">{{ $user->tahun_masuk }}</span>
							<span class="inline-block px-2 py-1 font-semibold text-red-900 bg-red-200 rounded-lg">{{ $user->tahun_lulus }}</span>
						</div>
						<div class="px-6 py-4">
							<a href="{{route('profile.show',$user->id)}}" class="text-blue-500 hover:underline bg-blue-700 text-white px-4 py-2 rounded-lg">Lihat Selengkapnya</a>
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