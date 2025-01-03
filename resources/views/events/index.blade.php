@extends('layouts.dashboard')

@section('content')
    <div class="container mx-auto px-4 py-6 bg-white">
        <!-- Header Section -->
        <div class="flex flex-wrap items-center justify-between mt-2 mb-10 ml-8">
            <div>
                <h1 class="text-3xl font-bold text-rial mt-6">Events</h1>
                <p class="text-sm text-gray-600">Events Record</p>
            </div>
            @if (Auth::user()->role == 'Admin')
                <a href="{{ route('events.create') }}" class="btn bg-rial text-white hover: mt-6">
                    <i class="fas fa-plus mr-2"></i>Add Event
                </a>
            @endif
        </div>

       

        <div class="bg-rial  px-4 py-3 flex items-center justify-between border-b-4 border-rial rounded-lg">
            <div class="flex items-center">
                    <svg class="w-6 h-6 mx-auto" fill="none" stroke="white" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                <h5 class="text-xl font-regular font-bold text-gray-50 ml-4">Events</h5>
            </div>
                <form method="GET" action="{{ route('events.index') }}" class=" flex gap-2 ">
                <input type="text" name="search" class="w-full px-3 py-2 border border-gray-300 rounded focus:ring focus:ring-rial"
                    placeholder="Search events..." value="{{ request('search') }}">
                    <button type="submit" class="btn text-white border-l-0 rounded-r-md px-3 py-2 hover:bg-gray-500 ">
                        <i class="fas fa-search "></i>
                    </button>            </form>
        </div>

        <!-- Alert Messages -->
        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 rounded">
                <p><i class="fas fa-check-circle mr-2"></i>{{ session('success') }}</p>
            </div>
        @endif

        @php
            use Carbon\Carbon;

            $filteredUpcomingEvents = $events->filter(fn($event) => Carbon::parse($event->date)->isFuture())
                ->filter(fn($event) => request('search') ? stripos($event->name, request('search')) !== false : true)
                ->groupBy(fn($event) => $event->classCategories->class_name ?? 'Uncategorized');

            $filteredPastEvents = $events->filter(fn($event) => Carbon::parse($event->date)->isPast())
                ->filter(fn($event) => request('search') ? stripos($event->name, request('search')) !== false : true);
        @endphp

        <!-- Upcoming Events -->
        @foreach ($filteredUpcomingEvents as $className => $classEvents)
            <div class="shadow-lg rounded-lg overflow-hidden mb-6">
                <div class="bg-rial px-4 py-3">
                    <h6 class="text-white font-bold">Upcoming Events: Class {{ $className }}</h6>
                </div>
                <div class="overflow-x-auto overflow-y-auto max-h-96">
                    <table class="min-w-full bg-white">
                        <thead>
                            <tr class="bg-gray-100 text-left">
                                <th class="pl-10 py-2 text-sm text-gray-900">#</th>
                                <th class="px-4 py-2 text-sm text-gray-900">Name</th>
                                <th class="px-4 py-2 text-sm text-gray-900">Description</th>
                                <th class="px-4 py-2 text-sm text-gray-900">Date</th>
                                <th class="px-4 py-2 text-sm text-gray-900">Time</th>
                                <th class="px-4 py-2 text-sm text-gray-900">Location</th>
                                <th class="px-4 py-2 text-sm text-gray-900">Kaka</th>
                                @if (Auth::user()->role == 'Admin')
                                    <th class="pr-10 py-2 text-sm text-gray-900 text-right">Actions</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($classEvents as $event)
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="px-10 py-2">{{ $loop->iteration }}</td>
                                    <td class="px-4 py-2">{{ $event->name }}</td>
                                    <td class="px-4 py-2">{{ $event->description }}</td>
                                    <td class="px-4 py-2">{{ $event->date }}</td>
                                    <td class="px-4 py-2">{{ $event->time }}</td>
                                    <td class="px-4 py-2">{{ $event->location }}</td>
                                    <td class="px-4 py-2">{{ $event->kaka->name }}</td>
                                    @if (Auth::user()->role == 'Admin')
                                        <td class="pr-10 py-2 text-right">
                                            <div class="flex items-center justify-end space-x-2">
                                                <a href="{{ route('events.edit', $event) }}" class="text-gray-500 hover:text-rial" title="Edit Event">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('events.destroy', $event) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-500 hover:text-red-700" onclick="return confirm('Are you sure?')" title="Delete Event">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endforeach

        <!-- Past Events -->
        <div class="shadow-lg rounded-lg overflow-hidden mb-6">
            <div class="bg-gray-800 px-4 py-3">
                <h6 class="text-white font-bold">Past Events</h6>
            </div>
            <div class="overflow-x-auto overflow-y-auto max-h-96">
                <table class="min-w-full bg-white">
                    <thead>
                        <tr class="bg-gray-100 text-left">
                            <th class="pl-10 py-2 text-sm text-gray-900">#</th>
                            <th class="px-4 py-2 text-sm text-gray-900">Name</th>
                            <th class="px-4 py-2 text-sm text-gray-900">Description</th>
                            <th class="px-4 py-2 text-sm text-gray-900">Date</th>
                            <th class="px-4 py-2 text-sm text-gray-900">Time</th>
                            <th class="px-4 py-2 text-sm text-gray-900">Location</th>
                            <th class="px-4 py-2 text-sm text-gray-900">Class</th>
                            <th class="px-4 py-2 text-sm text-gray-900">Kaka</th>
                            @if (Auth::user()->role == 'Admin')
                                <th class="pr-10 py-2 text-sm text-gray-900 text-right">Actions</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($filteredPastEvents as $event)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="px-10 py-2">{{ $loop->iteration }}</td>
                                <td class="px-4 py-2">{{ $event->name }}</td>
                                <td class="px-4 py-2">{{ $event->description }}</td>
                                <td class="px-4 py-2">{{ $event->date }}</td>
                                <td class="px-4 py-2">{{ $event->time }}</td>
                                <td class="px-4 py-2">{{ $event->location }}</td>
                                <td class="px-4 py-2">{{ $event->classCategories->class_name }}</td>
                                <td class="px-4 py-2">{{ $event->kaka->name }}</td>
                                @if (Auth::user()->role == 'Admin')
                                    <td class="pr-10 py-2 text-right">
                                        <div class="flex items-center justify-end space-x-2">
                                            <a href="{{ route('events.edit', $event) }}" class="text-gray-500 hover:text-rial" title="Edit Event">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('events.destroy', $event) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:text-red-700" onclick="return confirm('Are you sure?')" title="Delete Event">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                @endif
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center py-4 text-gray-500">No events found for "{{ request('search') }}".</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
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

    <script>
        // Initialize tooltips using Tippy.js (alternative for Bootstrap tooltips)
        import tippy from 'tippy.js';
        import 'tippy.js/dist/tippy.css';

        document.addEventListener('DOMContentLoaded', () => {
            tippy('[title]', {
                placement: 'top',
                arrow: true,
                animation: 'fade',
            });
        });
    </script>
@endsection
