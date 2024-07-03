<x-Admin-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center max-w-7xl mx-auto px-4">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Tracking') }}
            </h2>
        </div>
    </x-slot>
    <div class="max-w-7xl mx-auto px-4 py-6">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Data Tracking Hasil Kuisioner</h3>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white table-auto">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="px-4 py-2 text-left text-gray-600">Nama Kuisioner</th>
                            <th class="px-4 py-2 text-left text-gray-600">Responden</th>
                            <th class="px-4 py-2 text-left text-gray-600">Hasil</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @foreach ($kuisioner as $index => $k)
                        @php
                        $labels = [];
                        $data = [];
                        @endphp
                        <tr class="border-b">
                            <td class="px-4 py-2">{{ $k->kuisioner }}</td>
                            <td class="px-4 py-2">{{ $count_respondan }}</td>
                            <td class="px-4 py-2">
                                @foreach ($tracking as $t)
                                    @if ($k->id_kuisioner == $t->id_kuisioner)
                                        @php
                                            $labels[] = $t->inputan;
                                            $data[] = $t->hasil_kuisioner->count();
                                        @endphp
                                        <p>{{ $t->inputan }}: {{ $t->hasil_kuisioner->count() }}</p>
                                    @endif
                                @endforeach
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- @foreach ($kuisioner as $index => $k)
                @php
                $labels = [];
                $data = [];
                @endphp
                @foreach ($tracking as $t)
                    @if ($k->id_kuisioner == $t->id_kuisioner)
                        @php
                            $labels[] = $t->inputan;
                            $data[] = $t->hasil_kuisioner->count();
                        @endphp
                    @endif
                @endforeach
                <div style="width: 50%; margin: auto; margin-top: 30px;">
                    <h4 class="text-lg font-medium text-gray-900 mb-4 ">{{ $k->kuisioner }}</h4>
                    <canvas id="pieChart-{{ $index }}"></canvas>
                </div>
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        var ctx = document.getElementById('pieChart-{{ $index }}').getContext('2d');
                        var pieChart = new Chart(ctx, {
                            type: 'pie',
                            data: {
                                labels: @json($labels),
                                datasets: [{
                                    data: @json($data),
                                    backgroundColor: [
                                        'rgba(255, 99, 132, 0.2)',
                                        'rgba(54, 162, 235, 0.2)',
                                        'rgba(255, 206, 86, 0.2)',
                                        'rgba(75, 192, 192, 0.2)',
                                        'rgba(153, 102, 255, 0.2)',
                                        'rgba(255, 159, 64, 0.2)'
                                    ],
                                    borderColor: [
                                        'rgba(255, 99, 132, 1)',
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(255, 206, 86, 1)',
                                        'rgba(75, 192, 192, 1)',
                                        'rgba(153, 102, 255, 1)',
                                        'rgba(255, 159, 64, 1)'
                                    ],
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                responsive: true,
                                plugins: {
                                    legend: {
                                        position: 'top',
                                    },
                                    title: {
                                        display: true,
                                        text: 'Pie Chart for {{ $k->kuisioner }}'
                                    }
                                }
                            },
                        });
                    });
                </script>
                @endforeach -->
            </div>
        </div>
    </div>
</x-Admin-layout>
