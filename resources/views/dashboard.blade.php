@extends('layouts.dashboard')

@section('content')
    <div class="container mx-auto px-4 py-6 bg-white">
        <!-- Header Section -->
        <div class="flex flex-wrap items-center justify-between mt-2 mb-10">
            <div>
                <h1 class="text-3xl font-bold text-rial mt-6 ml-6">Home</h1>
                <p class="text-sm text-gray-600 ml-6">Welcome to the dashboard</p>
            </div>
        </div>

        <!-- Statistik -->
        @if (Auth::user()->role === 'Admin')
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-8">
                <div class="shadow-lg rounded-lg border-l-4 border-rial bg-white p-4">
                    <div class="flex items-center">
                        <div class="mr-4 animate-wiggle">
                            <i class="fas fa-users fa-2x text-rial"></i>
                        </div>
                        <div>
                            <p class="text-sm text-rial font-bold uppercase">Total User</p>
                            <p class="text-xl font-bold text-gray-800">{{ \App\Models\User::count() }}</p>
                        </div>
                    </div>
                </div>
                <div class="shadow-lg rounded-lg border-l-4 bg-white p-4">
                    <div class="flex items-center">
                        <div class="mr-4">
                            <i class="fas fa-calendar-check text-rial fa-2x "></i>
                        </div>
                        <div>
                            <p class="text-sm text-rial font-bold uppercase">Total Kegiatan</p>
                            <p class="text-xl font-bold text-gray-800 ">
                                {{ \App\Models\Event::whereBetween('date', [now()->startOfWeek(), now()->endOfWeek()])->count() }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="shadow-lg rounded-lg border-l-4 border-rial bg-white p-4">
                    <div class="flex items-center">
                        <div class="mr-4">
                            <i class="fa fa-comment fa-2x text-rial" ></i>
                            
            
                        </div>
                        <div>
                            <p class="text-sm text-rial font-bold uppercase">Total Pengumuman</p>
                            <p>-</p>
                            <!-- <p class="text-xl font-bold text-gray-800">{{ \App\Models\User::count() }}</p> -->
                        </div>
                    </div>
                </div>
                
            </div>
        @endif

        <!-- Jadwal Event -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 rounded-lg">
            @if (Auth::user()->role === 'Admin' || Auth::user()->role === 'Parent')
                <div class="col-span-2">
                    <div class="shadow-lg rounded-lg bg-white">
                        <div class="px-6 py-4 border-b border-gray-200 bg-rial">
                            <h5 class="text-lg font-bold text-white">Jadwal Event</h5>
                        </div>
                        <div class="p-4">
                            @php
                                $servicesSchedule = [
                                    ['name' => 'Toodler', 'day' => 'Minggu', 'time' => '08.30, 11.30, 13.00, 16.00', 'location' => 'A Building'],
                                    ['name' => 'Class 1-3', 'day' => 'Minggu', 'time' => '08.30, 11.30, 13.00, 16.00', 'location' => 'B Building'],
                                    ['name' => 'Class 4-6', 'day' => 'Minggu', 'time' => '08.30, 11.30, 13.00, 16.00', 'location' => 'C Building']
                                ];
                            @endphp
                            <ul class="divide-y divide-gray-200">
                                @foreach ($servicesSchedule as $service)
                                    <li class="py-4 flex justify-between">
                                        <span>{{ $service['name'] }} - {{ $service['day'] }}, {{ $service['time'] }}</span>
                                        <span class="text-rial font-bold">{{ $service['location'] }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @elseif (Auth::user()->role === 'Kaka')
                <div class="col-span-2">
                    <div class="shadow-lg rounded-lg bg-white">
                        <div class="px-6 py-4 border-b border-gray-200 bg-rial">
                            <h5 class="text-lg font-bold text-white">Jadwal Anda</h5>
                        </div>
                        <div class="p-6">
                            @php
                                $assignedSchedules = \App\Models\Event::where('kaka_id', Auth::id())->get();
                            @endphp
                            @if ($assignedSchedules->isEmpty())
                                <p class="text-gray-600">Belum ada jadwal yang ditugaskan.</p>
                            @else
                                <ul class="divide-y divide-gray-200">
                                    @foreach ($assignedSchedules as $schedule)
                                        <li class="py-4 flex justify-between">
                                            <span>{{ $schedule->name }} - {{ $schedule->date }}, {{ $schedule->time }}</span>
                                            <span class="text-rial font-bold">{{ $schedule->location }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>
                </div>
            @endif

            <!-- Pengumuman -->
            <div>
                <div class="shadow-lg rounded-lg bg-white">
                    <div class="px-6 py-4 border-b border-gray-200 bg-rial">
                        <h5 class="text-lg font-bold text-white">Pengumuman</h5>
                    </div>
                    <div class="p-6">
                        @php
                            $announcements = [
                                ['title' => '-', 'content' => '-'],
                                ['title' => '-', 'content' => '-']
                            ];
                        @endphp
                        @foreach ($announcements as $announcement)
                            <p class="mb-2"><strong>{{ $announcement['title'] }}:</strong> {{ $announcement['content'] }}</p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- Grafik Kehadiran -->
        <div class="mt-6">
            <div class="shadow-lg rounded-lg bg-white">
                <div class="px-6 py-4 border-b border-gray-200 bg-rial">
                    <h5 class="text-lg font-bold text-white">Statistik Kehadiran</h5>
                </div>
                <div class="p-6">
                    
                    <canvas id="attendanceChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <style>
        .bg-rial {
            background-color: #2B263B;
        }

        .text-rial {
            color: #2B263B;
        }
        @keyframes wiggle {
    0%, 100% {
        transform: rotate(-3deg);
    }
    50% {
        transform: rotate(3deg);
    }
}
    </style>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('attendanceChart').getContext('2d');
        const attendanceChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Minggu 1', 'Minggu 2', 'Minggu 3', 'Minggu 4'],
                datasets: [{
                    label: 'Kehadiran Jemaat',
                    data: [120, 130, 115, 140],
                    borderColor: '#2B263B',
                    backgroundColor: 'rgba(43, 38, 59, 0.2)',
                    borderWidth: 2,
                    tension: 0.4,
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true
                    }
                },
                scales: {
                    x: {
                        grid: {
                            display: false
                        }
                    },
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endpush
