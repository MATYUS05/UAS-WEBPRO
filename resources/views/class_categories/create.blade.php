@extends('layouts.dashboard')

@section('content')
<div class="container mx-auto px-4 md:px-6 py-6">
    <h1 class="text-2xl font-semibold text-gray-900 mb-6">Add Class Category</h1>

    <div class="bg-gray-50 p-6 rounded-lg shadow-lg border border-gray-200">
        <form action="{{ route('class_categories.store') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Class Name -->
            <div class="flex flex-col space-y-2">
                <label for="class_name" class="text-gray-800 font-medium">Class Name</label>
                <input 
                    type="text" 
                    name="class_name" 
                    id="class_name" 
                    class="border border-blue-300 rounded-lg px-4 py-2 focus:ring focus:ring-blue-100 focus:outline-none text-gray-900" 
                    placeholder="Enter class name" 
                    required>
            </div>

            <!-- Description -->
            <div class="flex flex-col space-y-2">
                <label for="description" class="text-gray-800 font-medium">Description</label>
                <textarea 
                    name="description" 
                    id="description" 
                    class="border border-blue-300 rounded-lg px-4 py-2 focus:ring focus:ring-blue-100 focus:outline-none text-gray-900" 
                    placeholder="Enter class description" 
                    rows="4"></textarea>
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