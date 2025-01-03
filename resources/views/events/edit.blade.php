@extends('layouts.dashboard')

@section('content')
<div class="container mx-auto px-4 md:px-6 py-6">
    <h1 class="text-2xl font-semibold text-gray-900 mb-6">Edit Event</h1>

    <div class="bg-gray-50 p-6 rounded-lg shadow-lg border border-gray-200">
        <form action="{{ route('events.update', $event->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Event Name -->
            <div class="flex flex-col space-y-2">
                <label for="name" class="text-gray-800 font-medium">Event Name</label>
                <input 
                    type="text" 
                    name="name" 
                    id="name" 
                    class="border border-blue-300 rounded-lg px-4 py-2 focus:ring focus:ring-blue-100 focus:outline-none text-gray-900" 
                    value="{{ $event->name }}" 
                    placeholder="Enter event name" 
                    required>
            </div>

            <!-- Description -->
            <div class="flex flex-col space-y-2">
                <label for="description" class="text-gray-800 font-medium">Description</label>
                <textarea 
                    name="description" 
                    id="description" 
                    class="border border-blue-300 rounded-lg px-4 py-2 focus:ring focus:ring-blue-100 focus:outline-none text-gray-900" 
                    placeholder="Enter event description" 
                    rows="4">{{ $event->description }}</textarea>
            </div>

            <!-- Date -->
            <div class="flex flex-col space-y-2">
                <label for="date" class="text-gray-800 font-medium">Date</label>
                <input 
                    type="date" 
                    name="date" 
                    id="date" 
                    class="border border-blue-300 rounded-lg px-4 py-2 focus:ring focus:ring-blue-100 focus:outline-none text-gray-900" 
                    value="{{ $event->date }}" 
                    required>
            </div>

            <!-- Time -->
            <div class="flex flex-col space-y-2">
                <label for="time" class="text-gray-800 font-medium">Time</label>
                <input 
                    type="time" 
                    name="time" 
                    id="time" 
                    class="border border-blue-300 rounded-lg px-4 py-2 focus:ring focus:ring-blue-100 focus:outline-none text-gray-900" 
                    value="{{ $event->time }}" 
                    required>
            </div>

            <!-- Location -->
            <div class="flex flex-col space-y-2">
                <label for="location" class="text-gray-800 font-medium">Location</label>
                <input 
                    type="text" 
                    name="location" 
                    id="location" 
                    class="border border-blue-300 rounded-lg px-4 py-2 focus:ring focus:ring-blue-100 focus:outline-none text-gray-900" 
                    value="{{ $event->location }}" 
                    placeholder="Enter event location" 
                    required>
            </div>

            <!-- Class -->
            <div class="flex flex-col space-y-2">
                <label for="class_id" class="text-gray-800 font-medium">Class</label>
                <select 
                    name="class_id" 
                    id="class_id" 
                    class="border border-blue-300 rounded-lg px-4 py-2 focus:ring focus:ring-blue-100 focus:outline-none text-gray-900" 
                    required>
                    <option value="">-- Select Class --</option>
                    @foreach ($classes as $class)
                        <option value="{{ $class->id }}" {{ $event->class_id == $class->id ? 'selected' : '' }}>
                            {{ $class->class_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Kaka -->
            <div class="flex flex-col space-y-2">
                <label for="kaka_id" class="text-gray-800 font-medium">Kaka</label>
                <select 
                    name="kaka_id" 
                    id="kaka_id" 
                    class="border border-blue-300 rounded-lg px-4 py-2 focus:ring focus:ring-blue-100 focus:outline-none text-gray-900" 
                    required>
                    <option value="">-- Select Kaka --</option>
                    @foreach ($kakas as $kaka)
                        <option value="{{ $kaka->id }}" {{ $event->kaka_id == $kaka->id ? 'selected' : '' }}>
                            {{ $kaka->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end">
                <button 
                    type="submit" 
                    class="bg-gray-900 text-white px-6 py-2 rounded-lg">
                    Update
                </button>
            </div>
        </form>
    </div>
</div>
@endsection