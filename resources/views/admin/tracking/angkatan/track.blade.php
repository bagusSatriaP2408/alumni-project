<x-Admin-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center max-w-7xl mx-auto px-4">
            <a href="{{ route('tracking.angkatan') }}">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Tracking per angkatan') }}
                </h2>
            </a>
        </div>
    </x-slot>
    <div class="container mx-auto px-4 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <a href="{{route('tracking.angkatan')}}" class="bg-blue-500 text-white px-4 py-2 rounded-md shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
            Kembali
        </a>
    </div>
    <div class="max-w-7xl mx-auto px-12 py-6">
        <h3 class="text-lg font-medium text-gray-900 mt-6 mb-4">Data Tracking Pekerjaan</h3>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Pekerjaan</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jumlah Alumni</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($jenisPekerjaan as $jp)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="{{ route('tracking.pekerjaan', ['id' => $jp->id_jenis_pekerjaan]) }}" class="text-indigo-600 hover:text-indigo-900">{{ $jp->nama_pekerjaan }}</a>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ $pekerjaan->where('jenis_pekerjaan_id', $jp->id_jenis_pekerjaan)->count() }}
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <a href="{{ route('tracking.search.work') }}" class="text-indigo-600 hover:text-indigo-900">Jumlah</a>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ $pekerjaan->count() }}
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <a href="{{ route('tracking.search.search_page') }}" class="text-indigo-600 hover:text-indigo-900">Jumlah Lulusan</a>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ $lulusan }}
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <a href="{{ route('tracking.search.not_work') }}" class="text-indigo-600 hover:text-indigo-900">Jumlah yang tidak bekerja</a>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ $not_work }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Pie Chart Section -->
        <div class="flex flex-wrap justify-center mt-8">
            <div class="w-full md:w-1/2 lg:w-1/3 p-4">
                <h4 class="text-lg font-medium text-gray-900 mb-4 text-center">Pekerjaan berdasarkan Jenis</h4>
                <div class="bg-white p-4 rounded-lg shadow-md">
                    <canvas id="pieChart1"></canvas>
                </div>
            </div>
            <div class="w-full md:w-1/2 lg:w-1/3 p-4">
                <h4 class="text-lg font-medium text-gray-900 mb-4 text-center">Kesesuaian bidang kerja</h4>
                <div class="bg-white p-4 rounded-lg shadow-md">
                    <canvas id="pieChart2"></canvas>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var ctx1 = document.getElementById('pieChart1').getContext('2d');
                var pieChart1 = new Chart(ctx1, {
                    type: 'pie',
                    data: {
                        labels: @json($labels),
                        datasets: [{
                            data: @json($dataCounts),
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
                            tooltip: {
                                callbacks: {
                                    label: function(tooltipItem) {
                                        var label = tooltipItem.label || '';
                                        var value = tooltipItem.raw || 0;
                                        var total = @json($dataCounts->sum());
                                        var percentage = total > 0 ? ((value / total) * 100).toFixed(2) : 0;
                                        return label + ': ' + value + ' (' + percentage + '%)';
                                    }
                                }
                            },
                            title: {
                                display: true,
                                text: 'Distribusi Pekerjaan'
                            }
                        }
                    },
                });

                var ctx2 = document.getElementById('pieChart2').getContext('2d');
                var pieChart2 = new Chart(ctx2, {
                    type: 'pie',
                    data: {
                        labels: ['NON IT','IT'],
                        datasets: [{
                            data: @json($dataCounts_2),
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
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
                            tooltip: {
                                callbacks: {
                                    label: function(tooltipItem) {
                                        var label = tooltipItem.label || '';
                                        var value = tooltipItem.raw || 0;
                                        var total = @json($dataCounts_2->sum());
                                        var percentage = total > 0 ? ((value / total) * 100).toFixed(2) : 0;
                                        return label + ': ' + value + ' (' + percentage + '%)';
                                    }
                                }
                            },
                            title: {
                                display: true,
                                text: 'Distribusi Tipe Pekerjaan'
                            }
                        }
                    },
                });
            });
        </script>
    </div>
</x-Admin-layout>