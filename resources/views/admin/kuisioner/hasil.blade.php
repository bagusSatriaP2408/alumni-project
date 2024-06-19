<x-Admin-layout>

<div class="container mx-auto px-4">
    <div class="flex justify-between items-center py-4">
        <h2 class="text-2xl font-semibold">Kuisioner List</h2>
    </div>
    <div class="flex justify-center">
        <div class="w-full">
            <div class="bg-white shadow-md rounded my-6">
                <table class="min-w-max w-full table-auto">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="py-2 px-4 border-b">email</th>
                            <th class="py-2 px-4 border-b">kuisioner</th>
                            <th class="py-2 px-4 border-b">hasil kuisioner</th>

                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($hasilKuisioner as $h )
                        @foreach ($kuisioner as $k)

                            <tr class="border-b">
                                <td class="py-2 px-4">{{ $h->email }}</td>
                                <td class="py-2 px-4">{{ $k->kuisioner }}</td>
                                <td class="py-2 px-4">{{ $h->hasil_kuisioner }}</td>
                                </td>
                            </tr>
                            @endforeach
                            
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

    </x-Admin-layout>
