@extends('layouts.dashboard')

@section('content')
<div class="container mx-auto px-4 md:px-6 py-6">
    <h1 class="text-2xl font-semibold text-gray-900 mb-6">Edit User</h1>

    <form action="{{ route('users.update', $user) }}" method="POST" class="space-y-6 bg-gray-50 p-6 rounded-lg shadow-lg border border-gray-200">
        @csrf
        @method('PUT')

        <!-- Name Input -->
        <div class="flex flex-col space-y-2">
            <label for="name" class="text-gray-800 font-medium">Name</label>
            <input 
                type="text" 
                name="name" 
                id="name" 
                class="border border-blue-300 rounded-lg px-4 py-2 focus:ring focus:ring-blue-100 focus:outline-none text-gray-900"
                value="{{ $user->name }}" 
                placeholder="Enter user name"
                required>
        </div>

        <!-- Email Input -->
        <div class="flex flex-col space-y-2">
            <label for="email" class="text-gray-800 font-medium">Email</label>
            <input 
                type="email" 
                name="email" 
                id="email" 
                class="border border-blue-300 rounded-lg px-4 py-2 focus:ring focus:ring-blue-100 focus:outline-none text-gray-900"
                value="{{ $user->email }}" 
                placeholder="Enter user email"
                required>
        </div>

        <!-- Password Input -->
        <div class="flex flex-col space-y-2">
            <label for="password" class="text-gray-800 font-medium">Password</label>
            <input 
                type="password" 
                name="password" 
                id="password" 
                class="border border-blue-300 rounded-lg px-4 py-2 focus:ring focus:ring-blue-100 focus:outline-none text-gray-900"
                placeholder="Leave blank to keep current password">
        </div>

        <!-- Role Selection -->
        <div class="flex flex-col space-y-2">
            <label for="role" class="text-gray-800 font-medium">Role</label>
            <select 
                name="role" 
                id="role" 
                class="border border-blue-300 rounded-lg px-4 py-2 focus:ring focus:ring-blue-100 focus:outline-none text-gray-900" 
                required>
                <option value="Admin" {{ $user->role == 'Admin' ? 'selected' : '' }}>Admin</option>
                <option value="Parent" {{ $user->role == 'Parent' ? 'selected' : '' }}>Parent</option>
                <option value="Kaka" {{ $user->role == 'Kaka' ? 'selected' : '' }}>Kaka</option>
            </select>
        </div>

        <!-- Submit Button -->
        <div class="flex justify-end">
            <button 
                type="submit" 
                class="bg-gray-900 text-white px-6 py-2 rounded-lg">
                Save
            </button>
        </div>
    </form>
</div>
@endsection