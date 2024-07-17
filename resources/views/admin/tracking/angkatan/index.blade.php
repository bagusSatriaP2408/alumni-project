<x-Admin-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center max-w-7xl mx-auto px-4">
            <a href="{{route('tracking.angkatan')}}">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Tracking per angkatan') }}
                </h2>
            </a>
        </div>
    </x-slot>
    <div class="container mx-auto px-4 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <a href="{{ route('tracking.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
            Kembali
        </a>
    </div>
    <form action="{{route('admin.tracking.angkatan.track')}}" method="post">
        @csrf
        <div class="max-w-7xl mx-auto px-4 py-6">
            <div class="mb-4">
                <label for="tahun-angkatan" class="block text-sm font-medium text-gray-700">Kesesuaian bidang kerja</label>
                <select id="tahun-angkatan" name="tahun_masuk" class="mt-1 block w-full px-3 py-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="">Pilih tahun angkatan</option>
                    @foreach ($angkatan as $a)
                        <option value="{{$a}}">{{$a}}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex justify-end">
                <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Submit
                </button>
            </div>
        </div>
    </form>
</x-Admin-layout>
