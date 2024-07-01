@php
$adaRiwayat=False;
foreach ($pekerjaan as $item) {
    if ($item->done==1) {
        $adaRiwayat = True;
    };
}
$nowJobless = True
@endphp

<x-app-layout>
    <div class="max-w-4xl mx-auto py-12 sm:px-6 lg:px-8">
        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <h2 class="text-lg leading-6 font-medium text-gray-900">
                    Informasi Profil
                </h2>
            </div>
            <div class="border-t border-gray-200">
                <div class="mb-4">
                    @if ($user->gambar)
                        <img src="{{ asset('storage/' . $user->gambar) }}" alt="Gambar Postingan" class="w-64 h-64 object-cover rounded-full mx-auto my-12">
                    @else
                        <img src="{{ asset('storage/images/posts/profile-none.jpeg') }}" alt="Gambar Postingan" class="w-64 h-64 object-cover rounded-full mx-auto my-12">
                    @endif
                </div>
                <dl>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Nama Lengkap
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ucwords($user->name)}}
                        </dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Prodi
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{$user->prodi}}
                        </dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Tahun Masuk
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        {{$user->tahun_masuk}}
                        </dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Tahun Lulus
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        {{$user->tahun_lulus}}
                        </dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>

<section>
    @if ($pekerjaan->count()==0 || $adaRiwayat==False)
    <h1 class="text-center">Tidak Mempunyai riwayat pekerjaan yang selesai</h1>
    @else
    <h3 class="text-center">riwayat pekerjaan yang selesai</h3>
    <div class="flex items-center justify-center min-h-[450px]">
        <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
            <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="py-3 px-6">Nama Pekerjaan</th>
                    <th scope="col" class="py-3 px-6">Nama Perusahaan</th>
                    <th scope="col" class="py-3 px-6">Alamat Perusahaan</th>
                    <th scope="col" class="py-3 px-6">Mulai Bekerja</th>
                    <th scope="col" class="py-3 px-6">Selesai Bekerja</th>
                </tr>
                </thead>
                <tbody>

                @foreach ($pekerjaan as $item)
                @if ($item->done==1) 
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="py-4 px-6">{{ App\Models\JenisPekerjaan::find($item->jenis_pekerjaan_id)->nama_pekerjaan }}</td>
                        <td class="py-4 px-6">{{ $item->nama_perusahaan }}</td>
                        <td class="py-4 px-6">{{ $item->alamat_perusahaan }}</td>
                        <td class="py-4 px-6">{{ $item->mulai_bekerja }}</td>
                        <td class="py-4 px-6">{{ $item->selesai_bekerja }}</td>
                    </tr>
                @else
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="py-4 px-6">{{ App\Models\JenisPekerjaan::find($item->jenis_pekerjaan_id)->nama_pekerjaan }}</td>
                        <td class="py-4 px-6">{{ $item->nama_perusahaan }}</td>
                        <td class="py-4 px-6">{{ $item->alamat_perusahaan }}</td>
                        <td class="py-4 px-6">{{ $item->mulai_bekerja }}</td>
                        <td class="py-4 px-6">Sekarang</td>
                    </tr>
                    @php
                        $nowJobless=False
                    @endphp
                @endif
                @endforeach
                
                </tbody>
            </table>
            </div>
        </div>
    </div>
    @endif

    @if ($nowJobless)
    <h1 class="text-center">Sekarang tidak bekerja</h1>
    @endif
</section>
</x-app-layout>