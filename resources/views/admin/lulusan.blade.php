
<x-Admin-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Lulusan') }}
        </h2>
    </x-slot>
<div class="container mx-auto px-4">
        <div class="flex justify-center">
            <div class="w-full">
                <div class="bg-white shadow-md rounded my-6">
                    <table class="min-w-max w-full table-auto">
                        <thead class="bg-gray-200">
                            <tr>
                                <th class="py-2 px-4 border-b">No</th>
                                <th class="py-2 px-4 border-b">NIM</th>
                                <th class="py-2 px-4 border-b">Nama</th>
                                <th class="py-2 px-4 border-b">Email</th>
                                <th class="py-2 px-4 border-b">Tahun Masuk</th>
                                <th class="py-2 px-4 border-b">Tahun Lulus</th>
                                <th class="py-2 px-4 border-b">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($User as $u)
                                <tr class="border-b">
                                    <td class="py-2 px-4 text-center">{{ ++$i }}</td>
                                    <td class="py-2 px-4 text-center">{{ $u->nim }}</td>
                                    <td class="py-2 px-4 text-center">{{ $u->name }}</td>
                                    <td class="py-2 px-4 text-center">{{ $u->email }}</td>
                                    <td class="py-2 px-4 text-center">{{ $u->tahun_masuk }}</td>
                                    <td class="py-2 px-4 text-center">{{ $u->tahun_lulus }}</td>
                                    <td class="py-2 px-4 text-center">
                                        <form action="{{route('admin.lulusan.setujui')}}" method="POST" class="inline-block">
                                            @csrf
                                            <input type="hidden" name="user_id" value="{{ $u->id }}">
                                            <button type="submit" class="bg-blue-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded">
                                                Setujui
                                            </button>
                                        </form>
                                        <form action="{{route('admin.lulusan.tolak')}}" method="POST" class="inline-block">
                                            @csrf
                                            <input type="hidden" name="user_id" value="{{ $u->id }}">
                                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded">
                                                Tolak
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                </div>
                <div class="mt-4">
                    {!! $User->withQueryString()->links() !!}
                </div>
            </div>
        </div>
    </div>
    </x-Admin-layout>