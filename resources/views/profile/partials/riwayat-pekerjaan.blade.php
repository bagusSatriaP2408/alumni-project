@php
$adaRiwayat=False;
foreach ($pekerjaan as $item) {
    if ($item->done==1) {
        $adaRiwayat = True;
    };
}
@endphp

<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Riwayat Pekerjaan') }}
        </h2>
    </header>
    @if ($pekerjaan->count()==0 || $adaRiwayat==False)
        <h3>Tidak Mempunyai riwayat pekerjaan yang selesai</h3>
    @else

    <div class="flex items-center justify-center my-6">
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
                    @endif
                @endforeach
                
                </tbody>
            </table>
        </div>
    </div>
    @endif

</section>