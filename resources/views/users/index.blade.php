@extends('layouts.dashboard')

@section('content')
<div class="container mx-auto px-4  py-6 bg-white">
    <!-- Header Section -->
    <div class="flex flex-wrap items-center justify-between mt-2 mb-10 ml-8">
        <div>
            <h1 class="text-3xl font-bold text-rial mt-6">Users Management</h1>
            <p class="text-sm text-gray-600 ">Manage and organize system users</p>
        </div>
        <div>
            <a href="{{ route('users.create') }}" class="btn bg-rial text-white hover:bg-gray-800 mt-6">
                <i class="fas fa-plus mr-2 "></i>Add User
            </a>
        </div>
    </div>

    <!-- Alert Messages -->
    @if (session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 rounded">
            <p><i class="fas fa-check-circle mr-2"></i>{{ session('success') }}</p>
        </div>
    @endif

    <!-- User Groups -->
    @php
        $groupedUsers = $users->groupBy('role');
    @endphp

    @foreach ($groupedUsers as $role => $group)
        <div class="shadow-lg rounded-lg overflow-hidden mb-6">
            <div class="bg-rial px-4 py-3 flex items-center justify-between">
                <div class="flex items-center">
                    <div class="flex items-center justify-center w-10 h-10 bg-gray-100 rounded-lg mr-3">
                        <i class="fas fa-users text-gray-700"></i>
                    </div>
                    <h5 class="font-medium text-gray-100">{{ ucfirst($role) }} Users</h5>
                </div>
                <form method="GET" action="{{ route('users.index') }}" class="flex items-center">
                    <input type="hidden" name="role" value="{{ $role }}">
                    <input 
                        type="text" 
                        name="search_{{ $role }}" 
                        placeholder="Search users..." 
                        value="{{ request('search_' . $role) }}" 
                        class=" rounded-md px-3 py-2 h-8">
                    <button type="submit" class="btn text-white border-l-0 rounded-r-md px-3 py-2 hover:bg-gray-500 ml-2 animate-wiggle">   
                        <i class="fas fa-search "></i>
                    </button>
                </form>
            </div>
            
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white">
                    <thead>
                        <tr class="text-left border-b bg-gray-100 ">
                            <th class="pl-10 py-2 text-sm text-gray-900">#</th>
                            <th class="px-4 py-2 text-sm text-gray-900  ">Name</th>
                            <th class="px-5 py-2 text-sm text-gray-900  ">Email</th>
                            <th class="px-3 py-2 text-sm text-gray-900 ">Role</th>
                            <th class="pl-10  py-2 text-sm text-gray-900 ">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $filteredGroup = $group->filter(function ($user) use ($role) {
                                $searchKey = 'search_' . $role;
                                return request($searchKey)
                                    ? stripos($user->name, request($searchKey)) !== false
                                    : true;
                            });
                        @endphp

                        @forelse ($filteredGroup as $user)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="px-10 py-2 ">{{ $loop->iteration }}</td>
                                <td class="py-2 flex items-center">
                                    <div class="w-7 h-7 bg-rial flex items-center justify-center rounded-full text-xs text-white mr-2">
                                        {{ strtoupper(substr($user->name, 0, 2)) }}
                                    </div>
                                    <div>{{ $user->name }}</div>
                                </td>
                                <td class="py-2 text-gray-700">{{ $user->email }}</td>
                                <td class="py-2">
                                    <span class="px-3 py-1 text-xs text-white bg-rial  rounded-full">
                                        {{ $user->role }}
                                    </span>
                                </td>
                                <td class="pl-10 py-2 text-right">
                                    <div class="flex items-center   space-x-2">
                                        @if ($user->role == 'Parent')
                                            <a href="{{ route('children.index') }}" class="text-blue-600 hover:text-blue-700 animate-wiggle" title="View Children">
                                                <i class="fas fa-child"></i>
                                            </a>
                                        @endif
                                        <a href="{{ route('users.edit', $user) }}" class="text-gray-500 hover:text-gray-600" title="Edit User">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('users.destroy', $user) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="text-red-500 hover:text-red-600" 
                                                    onclick="return confirm('Are you sure?')" 
                                                    title="Delete User">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-4 py-2 text-center text-gray-500">No users found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    @endforeach
</div>

<style>
:root {
    --primary: #ffffff;
    --secondary: #2B263B;
    --gray-light: #D9D9D9;
}

@keyframes wiggle {
    0%, 100% {
        transform: rotate(-3deg);
    }
    50% {
        transform: rotate(3deg);
    }
}

.bg-white {
    background-color:rgb(255, 255, 255);
}

.bg-abu{
    background-color:#938787;

}

.bg-rial {
    background-color: #2B263B;
}

.text-rial {
    color: #2B263B;
}

.color-white{
    color: #ffffff;
}

.color-grape{
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
