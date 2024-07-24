<x-app-layout>

    <div class="container mx-auto">
        <div class="flex justify-center items-center py-5">
            <h1 class="text-3xl font-semibold">Daftar Kuisioner</h1>
        </div>
        <div class="flex justify-center">
            <div class="w-10/12 px-12">
                <div class="bg-white shadow-md rounded my-6 overflow-x-auto">
                    <table class="min-w-max w-full table-auto">
                        <thead class="bg-gray-200">
                            <tr>
                                <th class="py-2 px-4 border-b text-left">Subject</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vendors as $vendor)
                                <tr class="border-b hover:bg-gray-100">
                                    <td class="py-2 px-4">
                                        <a href="{{ route('vendor.kuisioner.show', $vendor->id_main_kuisioner) }}">
                                            {{ $vendor->subject }}
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    </x-app-layout>
    