@extends('layouts.dashboard')

@section('content')
    <div class="container mx-auto px-4 py-6 bg-white">
        <!-- Header Section -->
        <div class="flex flex-wrap items-center justify-between mt-2 mb-10 ml-8">
            <div>
                <h1 class="text-3xl font-bold text-rial mt-6">Attendance Kaka</h1>
                <p class="text-sm text-gray-600">Manage and monitor kaka attendance</p>
            </div>
        </div>

        <!-- Search Section -->
        <div class="bg-rial px-4 py-3 flex items-center justify-between border-b-4 border-rial rounded-lg">
            <div class="flex items-center">
                <svg class="w-6 h-6 mx-auto" fill="none" stroke="white" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <h5 class="text-xl font-bold text-gray-50 ml-4">Event Attendance</h5>
            </div>
            <input type="text" id="searchEvent" class="w-full px-3 py-2 border border-gray-300 rounded focus:ring focus:ring-rial"
                placeholder="Search by Event Name">
        </div>

        <!-- Alert Messages -->
        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 rounded">
                <p><i class="fas fa-check-circle mr-2"></i>{{ session('success') }}</p>
            </div>
        @endif

        <!-- Attendance Table -->
        <div class="shadow-lg rounded-lg overflow-hidden mb-6">
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white table-auto whitespace-nowrap ">
                    <thead>
                        <tr class="bg-gray-100 text-left ">
                            <th class="pl-3 py-2 text-sm text-gray-900  pt-2">No.</th>
                            <th class="px-3 py-2 text-sm text-gray-900">Event Name</th>
                            <th class="px-3 py-2 text-sm text-gray-900">Description</th>
                            <th class="px-3 py-2 text-sm text-gray-900">Date</th>
                            <th class="px-3 py-2 text-sm text-gray-900">Class</th>
                            <th class="px-3 py-2 text-sm text-gray-900">Location</th>
                            <th class="px-3 py-2 text-sm text-gray-900 col-time-options">Time Options</th>
                            <th class="px-4 py-2 text-sm text-gray-900 col-check-in">Check In</th>
                            <th class="pl-4 py-2 text-sm text-gray-900 col-check-out text-left">Check Out</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $groupedEvents = $events->groupBy('name');
                            $currentDate = now();
                        @endphp
                        @foreach ($groupedEvents as $index => $group)
                            @if ($group->first()->date >= $currentDate->toDateString())
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="pl-4 py-2">{{ $loop->iteration }}</td>
                                    <td class="px-3 py-2">{{ $index }}</td>
                                    <td class="px-3 py-2">{{ $group->first()->description }}</td>
                                    <td class="px-3 py-2">{{ $group->first()->date }}</td>
                                    <td class="px-3 py-2">{{ $group->first()->classCategories->class_name }}</td>
                                    <td class="px-3 py-2">{{ $group->first()->location }}</td>
                                    <td class="px-3  py-2 col-time-options">
                                        <select class="w-28 px-2 py-1 border rounded ">
                                            @foreach ($group as $event)
                                                <option value="{{ $event->time }}">{{ $event->time }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td class="px-4 py-2 col-check-in">
                                        <form action="{{ route('attendances.attendkaka') }}" method="POST">
                                            @csrf
                                            <div class="form-group mb-2 w-40">
                                                <select name="kaka_id" class="w-full px-2 py-1 border rounded" required>
                                                    <option value="">Select a kaka</option>
                                                    @foreach ($kaka as $kakas)
                                                        <option value="{{ $kakas->id }}">{{ $kakas->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <input type="hidden" name="event_id" value="{{ $group->first()->id }}">
                                            <input type="hidden" name="class_id" value="{{ $group->first()->classCategories->id }}">
                                            <input type="hidden" name="time" class="selected-time" value="{{ $group->first()->time }}">
                                            <button type="submit" class="btn bg-rial text-white hover:bg-green-500 px-3 py-1 rounded">
                                                Check In
                                            </button>
                                        </form>
                                    </td>
                                    <td class="px-4 py-2 col-check-out text-left">
                                        <form action="{{ route('attendances.attendoutkaka') }}" method="POST">
                                            @csrf
                                            <div class="form-group mb-2 w-40">
                                                <select name="kaka_id" class="w-full px-2 py-1 border rounded" required>
                                                    <option value="">Select a kaka</option>
                                                    @foreach ($kaka as $kakas)
                                                        <option value="{{ $kakas->id }}">{{ $kakas->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <input type="hidden" name="event_id" value="{{ $group->first()->id }}">
                                            <input type="hidden" name="class_id" value="{{ $group->first()->classCategories->id }}">
                                            <input type="hidden" name="time" class="selected-time" value="{{ $group->first()->time }}">
                                            <button type="submit" class="btn bg-rial text-white hover:bg-red-500 px-3 py-1 rounded">
                                                Check Out
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
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

        table {
            table-layout: fixed;
            width: 100%;
        }

        table th, table td {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .col-time-options {
            width: 200px;
        }

        .col-check-in {
            width: 200px;
        }

        .col-check-out {
            width: 200px;
        }

        select, button {
            width: 100%;
        }
    </style>
@endsection
