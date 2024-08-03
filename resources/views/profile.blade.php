@php
$adaRiwayat=False;
foreach ($pekerjaan as $item) {
    if ($item->done==1) {
        $adaRiwayat = True;
    }else{
        $adaRiwayat = True;
    }
}
$nowJobless = True
@endphp

<x-app-layout>
    <div class="max-w-4xl mx-auto pt-12 pb-5 sm:px-6 lg:px-8 bg-white shadow overflow-hidden sm:rounded-lg my-6">
        <div>
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
                            Email
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{$user->email}}
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

<div class="max-w-4xl mx-auto py-12 bg-white shadow overflow-hidden sm:rounded-lg sm:px-6 lg:px-8">
    @if ($pekerjaan->count()==0 || $adaRiwayat==False)
        <h3 class="text-center text-lg font-medium text-gray-500">Tidak Mempunyai Riwayat Pekerjaan Yang Selesai</h3>
    @else
    <h3 class="text-center text-lg font-medium text-gray-500 mb-6">Riwayat Pekerjaan Yang Selesai</h3>
    <div class="flex items-center justify-center">
        <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
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
                    <tr class="bg-white border-b">
                        <td class="py-4 px-6">{{ App\Models\JenisPekerjaan::find($item->jenis_pekerjaan_id)->nama_pekerjaan }}</td>
                        <td class="py-4 px-6">{{ $vendors->where('id', $item->vendor_id)->first()->nama_perusahaan }}</td>
                        <td class="py-4 px-6">{{ $vendors->where('id', $item->vendor_id)->first()->alamat_perusahaan }}</td>
                        <td class="py-4 px-6">{{ $item->mulai_bekerja }}</td>
                        <td class="py-4 px-6">{{ $item->selesai_bekerja }}</td>
                    </tr>
                @else
                    <tr class="bg-white border-b">
                        <td class="py-4 px-6">{{ App\Models\JenisPekerjaan::find($item->jenis_pekerjaan_id)->nama_pekerjaan }}</td>
                        <td class="py-4 px-6">{{ $vendors->where('id', $item->vendor_id)->first()->nama_perusahaan }}</td>
                        <td class="py-4 px-6">{{ $vendors->where('id', $item->vendor_id)->first()->alamat_perusahaan }}</td>
                        <td class="py-4 px-6">{{ $item->mulai_bekerja }}</td>
                        <td class="py-4 px-6">Sedang Bekerja</td>
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
        <div class="max-w-4xl mx-auto py-12 bg-white shadow overflow-hidden sm:rounded-lg my-5">
            <h3 class="text-center text-lg font-medium text-gray-500 mb-6">Pekerjaan Saat Ini</h3>
            <h3 class="text-center mt-4">Sekarang tidak bekerja</h3>
        </div>
    @endif
</div>



</x-app-layout>