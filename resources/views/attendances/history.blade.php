@extends('layouts.dashboard')

@section('content')
    <div class="container mx-auto px-4 py-6 bg-white">
        <!-- Header Section -->
        <div class="flex flex-wrap items-center justify-between mb-6">
            <div>
                <h1 class="text-3xl font-bold text-rial mt-6 ml-4">Attendance History</h1>
                <p class="text-sm text-gray-600 ml-4">View and filter attendance history</p>
            </div>
        </div>

        <!-- Alert Messages -->
        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded mb-6">
                <p><i class="fas fa-check-circle mr-2"></i>{{ session('success') }}</p>
            </div>
        @endif

        <!-- Filter Form -->
        <div class="shadow-lg rounded-lg bg-white p-6 mb-6">
            <form method="GET" action="{{ route('attendances.history') }}">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label for="start_date" class="block text-sm font-medium text-gray-700">Start Date</label>
                        <input type="date" id="start_date" name="start_date" class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow focus:ring focus:ring-rial"
                               value="{{ request('start_date') }}">
                    </div>
                    <div>
                        <label for="end_date" class="block text-sm font-medium text-gray-700">End Date</label>
                        <input type="date" id="end_date" name="end_date" class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow focus:ring focus:ring-rial"
                               value="{{ request('end_date') }}">
                    </div>
                    <div class="flex items-end">
                    <button type="submit" class="btn text-white border-l-0 bg-rial  px-3 py-2 hover:bg-gray-500 ">
                        <i class="fas fa-search "></i>
                    </button>  
                        <!-- <button type="submit" class="w-full px-4 py-2 bg-blue-500 text-white rounded-lg shadow hover:bg-blue-600">Filter</button> -->
                        <a href="{{ route(name: 'attendances.history') }}" class="btn text-white border-l-0 bg-rial  px-3 py-2 hover:bg-gray-500 ml-2">Reset</a>
                    </div>
                </div>
            </form>
        </div>

        <!-- Children Attendance Table -->
        @if (Auth::user()->role != 'Kaka')
            <div class="shadow-lg rounded-lg bg-white mb-6">
                <div class="bg-rial px-4 py-3 rounded-t-lg">
                    <h6 class="text-white font-bold">Children Attendance</h6>
                </div>
                <div class="p-4">
                    <input type="text" id="searchChildren" class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow focus:ring focus:ring-rial mb-4"
                        placeholder="Search by Child Name">
                    @if ($attendances->isEmpty())
                        <p class="text-gray-500">No attendance records found for children.</p>
                    @else
                        <div class="overflow-x-auto max-h-96">
                            <table class="min-w-full bg-white border rounded-lg" id="childrenTable">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th class="px-6 py-3 text-sm font-medium text-gray-900 text-left">No</th>
                                        <th class="px-6 py-3 text-sm font-medium text-gray-900 text-left">Child Name</th>
                                        <th class="px-6 py-3 text-sm font-medium text-gray-900 text-left">Event</th>
                                        <th class="px-6 py-3 text-sm font-medium text-gray-900 text-left">Class</th>
                                        <th class="px-6 py-3 text-sm font-medium text-gray-900 text-left">Checkin</th>
                                        <th class="px-6 py-3 text-sm font-medium text-gray-900 text-left">Checkout</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($attendances as $attendance)
                                        <tr class="border-b hover:bg-gray-50">
                                            <td class="px-6 py-4 text-sm text-gray-900">{{ $loop->iteration }}</td>
                                            <td class="px-6 py-4 text-sm text-gray-900">{{ $attendance->child->full_name ?? 'N/A' }}</td>
                                            <td class="px-6 py-4 text-sm text-gray-900">{{ $attendance->event->name ?? 'N/A' }}</td>
                                            <td class="px-6 py-4 text-sm text-gray-900">{{ $attendance->classCategory->class_name ?? 'N/A' }}</td>
                                            <td class="px-6 py-4 text-sm text-gray-900">{{ $attendance->status == 'On Time' ? $attendance->created_at : '-' }}</td>
                                            <td class="px-6 py-4 text-sm text-gray-900">{{ $attendance->status == 'Checkout' ? $attendance->created_at : '-' }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        @endif


        <!-- Kaka Attendance Table -->
        @if (Auth::user()->role != 'Parent')
            <div class="shadow-lg rounded-lg bg-white">
                <div class="bg-rial px-4 py-3 rounded-t-lg">
                    <h6 class="text-white font-bold">Kaka Attendance</h6>
                </div>
                <div class="p-4">
                    <input type="text" id="searchKaka" class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow focus:ring focus:ring-rial mb-4"
                           placeholder="Search by Kaka Name">
                    @if ($attendancesKaka->isEmpty())
                        <p class="text-gray-500">No attendance records found for Kaka.</p>
                    @else
                        <div class="overflow-x-auto max-h-96">
                            <table class="min-w-full bg-white border rounded-lg" id="kakaTable">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th class="px-6 py-3 text-sm font-medium text-gray-900 text-left">No</th>
                                        <th class="px-6 py-3 text-sm font-medium text-gray-900 text-left">Kaka Name</th>
                                        <th class="px-6 py-3 text-sm font-medium text-gray-900 text-left">Event</th>
                                        <th class="px-6 py-3 text-sm font-medium text-gray-900 text-left">Class</th>
                                        <th class="px-6 py-3 text-sm font-medium text-gray-900 text-left">Checkin</th>
                                        <th class="px-6 py-3 text-sm font-medium text-gray-900 text-left">Checkout</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($attendancesKaka as $attendanceKaka)
                                        <tr class="border-b hover:bg-gray-50">
                                            <td class="px-6 py-4 text-sm text-gray-900">{{ $loop->iteration }}</td>
                                            <td class="px-6 py-4 text-sm text-gray-900">{{ $attendanceKaka->kaka->name ?? 'N/A' }}</td>
                                            <td class="px-6 py-4 text-sm text-gray-900">{{ $attendanceKaka->event->name ?? 'N/A' }}</td>
                                            <td class="px-6 py-4 text-sm text-gray-900">{{ $attendanceKaka->classCategory->class_name ?? 'N/A' }}</td>
                                            <td class="px-6 py-4 text-sm text-gray-900">{{ $attendanceKaka->status == 'On Time' ? $attendanceKaka->created_at : '-' }}</td>
                                            <td class="px-6 py-4 text-sm text-gray-900">{{ $attendanceKaka->status == 'Checkout' ? $attendanceKaka->created_at : '-' }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        @endif

        <!-- JavaScript for Search Functionality -->
        <script>
            document.getElementById('searchChildren').addEventListener('input', function() {
                let filter = this.value.toLowerCase();
                let rows = document.querySelectorAll('#childrenTable tbody tr');
                rows.forEach(row => {
                    let name = row.cells[1].textContent.toLowerCase();
                    row.style.display = name.includes(filter) ? '' : 'none';
                });
            });

            if (document.getElementById('searchKaka')) {
                document.getElementById('searchKaka').addEventListener('input', function() {
                    let filter = this.value.toLowerCase();
                    let rows = document.querySelectorAll('#kakaTable tbody tr');
                    rows.forEach(row => {
                        let name = row.cells[1].textContent.toLowerCase();
                        row.style.display = name.includes(filter) ? '' : 'none';
                    });
                });
            }
        </script>
    </div>

    <style>
        :root {
            --primary: #ffffff;
            --secondary: #2B263B;
            --gray-light: #D9D9D9;
        }

        .bg-white {
            background-color: rgb(255, 255, 255);
        }

        .bg-rial {
            background-color: #2B263B;
        }

        .text-rial {
            color: #2B263B;
        }
    </style>
@endsection
