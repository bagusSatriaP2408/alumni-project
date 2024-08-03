<footer>
    <div class="bg-white">
        <div class="max-w-screen-xl px-4 sm:px-6 text-gray-800 sm:grid md:grid-cols-4 sm:grid-cols-2 mx-auto p-12">
            <div>
                <x-application-logo class="block h-36 w-auto fill-current text-gray-800"/>
            </div>
            <div>
                <h3 class="text-sm uppercase text-blue-600 font-bold mb-3">Halaman</h3>
                <div class="flex flex-col gap-2.5">
                    <a href={{ route('home') }}>Beranda</a>
                    <a href={{ route('posts.index') }}>Postingan</a>
                    <a href={{ route('vendor.index') }}>Vendor</a>
                    <a href={{ route('search.index') }}>Alumni</a>
                </div>
            </div>
            <div>
                <h3 class="text-sm uppercase text-blue-600 font-bold mb-3">Daftar Vendor</h3>
                <div class="flex flex-col gap-2.5">
                    @foreach ($vendors as $vendor)
                        <a href="/#">{{ $vendor->nama_perusahaan }}</a>
                    @endforeach
                    <a href="">Lihat Selengkapnya</a>
                </div>
            </div>
            <div>
                <h3 class="text-sm uppercase text-blue-600 font-bold mb-3">Hubungi kami</h3>
                <div class="flex flex-col gap-2.5">
                    <a href="https://maps.app.goo.gl/zL5mHyAPZGqMcELb8">Jl. Raya Telang, Perumahan Telang Indah, Telang, Kec. Kamal, Kabupaten Bangkalan, Jawa Timur 69162</a>
                    <a href="https://mail.google.com/mail/?view=cm&fs=1&to=humas@trunojoyo.ac.id">humas@trunojoyo.ac.id</a>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-white border-t">
        <div class="flex m-auto text-gray-800 text-sm items-center justify-center py-5">
            <p>Copyright © 2024 Universitas Trunojoyo Madura. All Rights Reserved.</p>
        </div>
    </div>
</footer>