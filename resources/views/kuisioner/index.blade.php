<x-app-layout>

<div class="container mx-auto px-4">
    <div class="flex justify-center items-center py-4">
        <h2 class="text-2xl font-semibold">Kuisioner</h2>
    </div>
    <div class="flex justify-center">
        <div class="w-full lg:w-2/3 xl:w-1/2">
            <div class="bg-white shadow-md rounded my-6 overflow-x-auto">
                @if ($main_kuisioner)
                <table class="min-w-max w-full table-auto">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="py-2 px-4 border-b text-left">Subject</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($main_kuisioner as $m)
                            <tr class="border-b hover:bg-gray-100">
                                <td class="py-2 px-4">
                                    <a href="{{ route('kuisioner.show', $m->id_main_kuisioner) }}">
                                        {{ $m->subject }}
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <p class="text-center py-4">Belum ada kuisioner yang diisi.</p>
                @endif
            </div>
        </div>
    </div>
</div>
  
</x-app-layout>
