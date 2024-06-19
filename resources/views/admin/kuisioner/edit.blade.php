<x-Admin-layout>
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center py-4">
            <h2 class="text-2xl font-semibold">Buat Kuisioner Baru</h2>
        </div>
        <div class="flex justify-center">
            <div class="w-full max-w-md">
                <div class="bg-white shadow-md rounded my-6 p-6">
                    <form id="kuisionerForm" action="{{route('admin.kuisioner.edit.store',['id' => $kuis->id_main_kuisioner])}}" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <label for="subject" class="block text-sm font-medium text-gray-700">Subject:{{$kuis->subject}}</label>
                            <input type="text" id="subject" name="subject" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                        </div>
                        @php
                        $kuisioner=$kuis->kuisioner;
                        $i=0;
                        @endphp
                        
                        @foreach ($kuisioner as $k  )
                        @php
                        $i++;
                        @endphp
                        <div id="kuisionerContainer" class="space-y-4">
                            <div class="kuisioner">
                                <label for="kuisioner1" class="block text-sm font-medium text-gray-700">kuisioner{{$i}}:{{$k->kuisioner}}</label>
                                <input type="text" id="kuisioner1" name="kuisioner[]" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
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
