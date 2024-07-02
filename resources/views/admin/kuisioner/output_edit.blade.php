<x-Admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Kuisioner') }}
        </h2>
    </x-slot>

    <div class="container mx-auto px-4">
        <div class="flex justify-center">
            <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="bg-white shadow-md rounded my-6 p-6">
                    <form id="kuisionerForm" action="{{route('admin.kuisioner.output_edit.store',['id' => $output->id_kuisioner])}}" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <label for="subject" class="block text-sm font-medium text-gray-700">Pertanyaan: {{$output->kuisioner}}</label>
                        </div>
                        @php
                        $out=$output->main_hasil_kuisioner;
                        $i=0;
                        @endphp
                        
                        @foreach ($out as $o  )
                        @php
                        $i++;
                        @endphp
                        <div id="kuisionerContainer" class="space-y-4">
                            <div class="kuisioner">
                                <label for="output1" class="block text-sm font-medium text-gray-700">output {{$i}} : {{$o->inputan}}</label>
                                <input type="text" id="output1" name="output[]" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                            </div>
                        </div>
                    @endforeach
                    <div class="flex items-center justify-between">
                            <button type="submit" class="bg-indigo-500 text-white px-4 py-2 rounded-md shadow hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                Submit
                            </button>
                            <button type="reset" class="bg-gray-500 text-white px-4 py-2 rounded-md shadow hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500">
                                Reset
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-Admin-layout>
