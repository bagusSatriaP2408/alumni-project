<x-app-layout>
	@slot('title')
		Verifikasi Email
	@endslot
	<div class="max-w-7xl mx-auto px-4 py-8">
		<h1 class="text-2xl font-bold mb-4">Verifikasi Email</h1>
		@if (session('success'))
			<div class="bg-green-500 text-white p-4 rounded mb-4">
				{{ session('success') }}
			</div>
		@endif
		@if (session('error'))
			<div class="bg-red-500 text-white p-4 rounded mb-4">
				{{ session('error') }}
			</div>
		@endif
		<form action="{{ route('vendor.sendOtp') }}" method="POST">
			@csrf
			<div class="mb-4">
				<label for="email" class="block text-gray-700">Email:</label>
				<input type="email" name="email" id="email" class="w-full p-2 border border-gray-300 rounded" required>
			</div>
			<button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Kirim OTP</button>
		</form>
		<form action="{{ route('vendor.verifyOtp') }}" method="POST" class="mt-4">
			@csrf
			<div class="mb-4">
				<label for="otp" class="block text-gray-700">Kode OTP:</label>
				<input type="text" name="otp" id="otp" class="w-full p-2 border border-gray-300 rounded" required>
			</div>
			<button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Verifikasi OTP</button>
		</form>
	</div>
</x-app-layout>