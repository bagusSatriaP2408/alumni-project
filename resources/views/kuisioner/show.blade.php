<x-app-layout>

    <div class="container mx-auto px-4">
        <div class="flex justify-center items-center py-4">
            <h2 class="text-2xl font-semibold">Kuisioner</h2>
        </div>
        <div class="flex justify-center">
            <div class="w-full lg:w-2/3 xl:w-1/2">
                <div class="bg-white shadow-md rounded my-6 overflow-x-auto">
                    <form action="{{ route('kuisioner.store') }}" method="post">
                        @csrf
                        <table class="min-w-max w-full table-auto">
                            <thead class="bg-gray-200">
                                <tr>
                                    <th class="py-2 px-4 border-b text-left">Kuisioner</th>
                                    <th class="py-2 px-4 border-b text-left">Jawaban</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kuisioner as $k)
                                    <tr class="border-b hover:bg-gray-100">
                                        <td class="py-2 px-4 ">
                                            <input type="hidden" name="id_kuisioner[]" value="{{ $k->id_kuisioner }}">
                                            {{ $k->kuisioner }}
                                        </td>
                                        <td class="py-2 px-4 ">
                                            <select name="jawaban[]" id="jawaban">
                                                <option value="">Pilih Jawaban</option>
                                                @foreach ($k->main_hasil_kuisioner as $m)
                                                    <option value="{{ $m->id_main_hasil_kuisioner }}">{{ $m->inputan }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="flex justify-center p-4">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
