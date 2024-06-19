<x-Admin-layout>
<div class="container mx-auto px-4">
    <div class="flex justify-between items-center py-4">
        <h2 class="text-2xl font-semibold">Main Kuisioner List</h2>
        <a href="{{route('admin.kuisioner.create')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Create
        </a>
    </div>
    <div class="flex justify-center">
        <div class="w-full">
            <div class="bg-white shadow-md rounded my-6">
                <table class="min-w-max w-full table-auto">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="py-2 px-4 border-b">No</th>
                            <th class="py-2 px-4 border-b">subject</th>
                            <th class="py-2 px-4 border-b">Info</th>
                            <th class="py-2 px-4 border-b">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($main_kuisioner as $m)
                            <tr class="border-b">
                                <td class="py-2 px-4">{{ $m->id_main_kuisioner }}</td>
                                <td class="py-2 px-4">{{ $m->subject }}</td>
                                <td class="py-2 px-4">
                                    <a href="{{ route('admin.kuisioner.info', ['id' => $m->id_main_kuisioner]) }}" class="bg-blue-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded">info</a>
                                    <a href="{{ route('admin.kuisioner.hasil', ['id' => $m->id_main_kuisioner]) }}" class="bg-blue-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded">hasil</a>
                                
                                </td>
                                <td class="py-2 px-4">
                                    <a href="{{ route('admin.kuisioner.edit', ['id' => $m->id_main_kuisioner]) }}" class="bg-green-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded">edit</a>
                                    <form action="{{ route('admin.kuisioner.delete',['id' => $m->id_main_kuisioner])}}" method="POST" class="inline-block">
                                        @csrf
                                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded">delete</button>
                                    </form>
                                                          
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

    </x-Admin-layout>
