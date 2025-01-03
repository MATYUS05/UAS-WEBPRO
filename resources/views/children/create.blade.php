@extends('layouts.dashboard')

@section('content')
<div class="container mx-auto px-4 md:px-6 py-6">
    <h1 class="text-2xl font-semibold text-gray-900 mb-6">Add Child</h1>

    <div class="bg-gray-50 p-6 rounded-lg shadow-lg border border-gray-200">
        <form action="{{ route('children.store') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Parent Selection -->
            <div class="flex flex-col space-y-2">
                <label for="user_id" class="text-gray-800 font-medium">Parent</label>
                <select 
                    name="user_id" 
                    id="user_id" 
                    class="border border-blue-300 rounded-lg px-4 py-2 focus:ring focus:ring-blue-100 focus:outline-none text-gray-900" 
                    required>
                    @foreach ($parents as $parent)
                        <option value="{{ $parent->id }}">{{ $parent->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Full Name -->
            <div class="flex flex-col space-y-2">
                <label for="full_name" class="text-gray-800 font-medium">Full Name</label>
                <input 
                    type="text" 
                    name="full_name" 
                    id="full_name" 
                    class="border border-blue-300 rounded-lg px-4 py-2 focus:ring focus:ring-blue-100 focus:outline-none text-gray-900" 
                    placeholder="Enter full name" 
                    required>
            </div>

            <!-- Gender -->
            <div class="flex flex-col space-y-2">
                <label for="gender" class="text-gray-800 font-medium">Gender</label>
                <select 
                    name="gender" 
                    id="gender" 
                    class="border border-blue-300 rounded-lg px-4 py-2 focus:ring focus:ring-blue-100 focus:outline-none text-gray-900" 
                    required>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>

            <!-- Date of Birth -->
            <div class="flex flex-col space-y-2">
                <label for="dob" class="text-gray-800 font-medium">Date of Birth</label>
                <input 
                    type="date" 
                    name="dob" 
                    id="dob" 
                    class="border border-blue-300 rounded-lg px-4 py-2 focus:ring focus:ring-blue-100 focus:outline-none text-gray-900" 
                    required>
            </div>

            <!-- Class -->
            <div class="flex flex-col space-y-2">
                <label for="class" class="text-gray-800 font-medium">Class</label>
                <select 
                    name="class" 
                    id="class" 
                    class="border border-blue-300 rounded-lg px-4 py-2 focus:ring focus:ring-blue-100 focus:outline-none text-gray-900" 
                    required>
                    @foreach ($classes as $class)
                        <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end">
                <button 
                    type="submit" 
                    class="bg-gray-900 text-white px-6 py-2 rounded-lg">
                    Add
                </button>
            </div>
        </form>
    </div>
</div>
@endsection