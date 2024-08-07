<x-Admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Buat Kuisioner Baru') }}
        </h2>
    </x-slot>
    <div class="container mx-auto px-4 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <a href="{{ route('admin.kuisioner') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
            Kembali
        </a>
    </div>
        
    <div class="container mx-auto px-4 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-center">
            <div class="w-full max-wt-2xl">
                <div class="bg-white shadow-md rounded my-6 p-6">
                    <form id="kuisionerForm" action="{{route('admin.kuisioner.create.store')}}" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <label for="subject" class="block text-sm font-medium text-gray-700">Subject</label>
                            <input type="text" id="subject" name="subject" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">kuisioner Untuk</label>
                            <div class="mt-1">
                                <label class="inline-flex items-center">
                                    <input type="radio" name="type" value="alumni" class="form-radio h-4 w-4 text-indigo-600">
                                    <span class="ml-2">Alumni</span>
                                </label>
                                <label class="inline-flex items-center ml-6">
                                    <input type="radio" name="type" value="vendor" class="form-radio h-4 w-4 text-indigo-600">
                                    <span class="ml-2">Vendor</span>
                                </label>
                            </div>
                        </div>
                        <div id="kuisionerContainer" class="space-y-4">
                            <div class="kuisioner">
                                <label for="kuisioner1" class="block text-sm font-medium text-gray-700">Kuisioner 1</label>
                                <input type="text" id="kuisioner1" name="kuisioner[]" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                            </div>
                        </div>
                        <div class="flex justify-center">
                            <button type="button" id="addKuisioner" class="bg-green-500 text-white px-6 py-2 rounded-md shadow hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500">
                                Tambah Kuisioner
                            </button>
                        </div>
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

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let kuisionerCount = 1;

            document.getElementById('addKuisioner').addEventListener('click', function () {
                kuisionerCount++;
                const kuisionerContainer = document.getElementById('kuisionerContainer');
                const newKuisionerDiv = document.createElement('div');
                newKuisionerDiv.classList.add('kuisioner');
                newKuisionerDiv.innerHTML = `
                    <label for="kuisioner${kuisionerCount}" class="block text-sm font-medium text-gray-700">Kuisioner ${kuisionerCount}</label>
                    <input type="text" id="kuisioner${kuisionerCount}" name="kuisioner[]" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                `;
                kuisionerContainer.appendChild(newKuisionerDiv);
            });
        });
    </script>
</x-Admin-layout>
