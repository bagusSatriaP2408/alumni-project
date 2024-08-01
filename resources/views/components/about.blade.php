<section class="about flex flex-col bg-white p-8">
    <div class="container mx-auto px-4 flex flex-col md:flex-row">
        <div class="w-full md:w-3/4 pr-16">
            <div class="prose max-w-none text-justify">
                <h1 class="text-3xl font-bold">Selamat Datang di Portal Alumni Kami</h1>
                <p>Kami bangga memperkenalkan Anda ke komunitas alumni kami yang luar biasa. Portal ini adalah tempat di mana kenangan, pencapaian, dan koneksi bertemu.</p>

                <h2 class="text-2xl font-bold mt-6">Mengapa Bergabung dengan Komunitas Alumni Kami?</h2>
                <p><strong>1. Jaringan Global:</strong> Memberikan Anda kesempatan untuk membangun koneksi profesional dan pribadi yang berharga.</p>
                <p><strong>2. Karir yang Sukses:</strong> 100+ alumni kami telah mencapai kesuksesan dalam berbagai bidang industri. Dapatkan inspirasi dan peluang dari cerita sukses mereka.</p>
                <p><strong>3. Dukungan Berkelanjutan:</strong> Kami berkomitmen untuk mendukung perkembangan karir Anda. Manfaatkan berbagai program pelatihan, seminar, dan acara jaringan yang kami tawarkan.</p>
                
                <h2 class="text-2xl font-bold mt-6">Tetap Terhubung</h2>
                <p>Ikuti berita terbaru, acara, dan kesempatan jaringan melalui buletin kami. Jadilah bagian dari komunitas yang dinamis dan mendukung.</p>
                <p><strong>Bergabunglah dengan kami dan jadilah bagian dari cerita sukses ini!</strong></p>
            </div>
        </div>
        <div class="w-full md:w-1/4 px-4 mt-8 md:mt-0">
            <div class="bg-gray-100 p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Daftar Angkatan</h2>
                <ul class="list-disc px-4">
                    @foreach ($daftar_angkatan as $tahun)
                        <li class="mb-2">
                            <a href="#" class="text-gray-700 hover:text-gray-900 hover:underline">{{ $tahun }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>
