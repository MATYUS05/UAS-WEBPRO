@extends('layouts.dashboard')

@section('content')
<div class="container mx-auto px-4 py-6 bg-white">
    <!-- Header Section -->
    <div class="flex flex-wrap items-center justify-between mt-2 mb-10 ml-8">
        <div>
            <h1 class="text-3xl font-bold text-rial mt-6">Children Management</h1>
            <p class="text-sm text-gray-600">Children records</p>
        </div>
        <div>
            @if (Auth::user()->role == 'Admin' || Auth::user()->role == 'Parent')
                <a href="{{ route('children.create') }}" class="btn bg-rial text-white hover:bg-gray-800 mt-6">
                    <i class="fas fa-plus mr-2"></i>Add Child
                </a>
            @endif
        </div>
    </div>

    <!-- Alert Messages -->
    @if (session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 rounded">
            <p><i class="fas fa-check-circle mr-2"></i>{{ session('success') }}</p>
        </div>
    @endif

    <!-- Children Groups -->
    <div class="shadow-lg rounded-lg overflow-hidden mb-6">
        <div class="bg-rial  px-4 py-3 flex items-center justify-between border-b-4 border-rial">
            <div class="flex items-center">

                <i class="fas fa-child text-white animate-wiggle"></i>
                <h5 class="text-xl font-bold text-gray-50 ml-4">Children</h5>
            </div>
            @if (Auth::user()->role === 'Admin' || Auth::user()->role === 'Kaka')
                <form method="GET" action="{{ route('children.index') }}" class="flex items-center">
                    <input 
                        type="text" 
                        name="search" 
                        placeholder="Search by parent name..." 
                        value="{{ request('search') }}" 
                        class="rounded-md px-3 py-2 h-8">
                    <button type="submit" class="btn text-white border-l-0 rounded-r-md px-3 py-2 hover:bg-gray-500 ml-2">
                        <i class="fas fa-search animate-wiggle"></i>
                    </button>
                </form>
            @endif
        </div>

        <div class="overflow-x-auto">
            @if (Auth::user()->role == 'Admin' || Auth::user()->role == 'Kaka')
                @php
                    $filteredChildren = $children->filter(function ($group, $parentName) {
                        return stripos($parentName, request('search')) !== false;
                    });
                @endphp

                @forelse ($filteredChildren as $parentName => $group)
                    <div class="mb-4">
                        <div class="bg-rial text-white px-4 py-2 font-bold">{{ $parentName }}</div>
                        <table class="min-w-full bg-white">
                            <thead>
                                <tr class="text-left border-b bg-gray-100">
                                    <th class="pl-10 py-2 text-sm text-gray-900">No</th>
                                    <th class="px-4 py-2 text-sm text-gray-900">Full Name</th>
                                    <th class="px-4 py-2 text-sm text-gray-900">Gender</th>
                                    <th class="px-4 py-2 text-sm text-gray-900">Date of Birth</th>
                                    <th class="px-4 py-2 text-sm text-gray-900">Class</th>
                                    @if (Auth::user()->role == 'Admin')
                                        <th class="pr-10 py-2 text-sm text-gray-900 text-right">Actions</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($group as $child)
                                    <tr class="border-b hover:bg-gray-50">
                                        <td class="px-11 py-2">{{ $loop->iteration }}</td>
                                        <td class="px-4 py-2">{{ $child->full_name }}</td>
                                        <td class="px-4 py-2">{{ $child->gender }}</td>
                                        <td class="px-4 py-2">{{ $child->dob }}</td>
                                        <td class="px-4 py-2">
                                            <b>{{ $child->classCategories->class_name }}</b>
                                            ({{ $child->classCategories->description }})
                                        </td>
                                        @if (Auth::user()->role == 'Admin')
                                            <td class="pr-10 py-2 text-right">
                                                <div class="flex items-center justify-end space-x-2">
                                                    <a href="{{ route('children.edit', $child) }}" class="text-gray-500 hover:text-gray-600" title="Edit Child">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('children.destroy', $child) }}" method="POST" class="inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-red-500 hover:text-red-600" onclick="return confirm('Are you sure?')" title="Delete Child">
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
                @empty
                    <div class="text-center py-4 text-gray-500">No children found</div>
                @endforelse
            @endif

            @if (Auth::user()->role == 'Parent')
                <div class="mb-4">
                    <div class="bg-rial text-white px-4 py-2 font-bold">Your Children</div>
                    <table class="min-w-full bg-white">
                        <thead>
                            <tr class="text-left border-b bg-gray-100">
                                <th class="pl-10 py-2 text-sm text-gray-900">No</th>
                                <th class="px-4 py-2 text-sm text-gray-900">Full Name</th>
                                <th class="px-4 py-2 text-sm text-gray-900">Gender</th>
                                <th class="px-4 py-2 text-sm text-gray-900">Date of Birth</th>
                                <th class="px-4 py-2 text-sm text-gray-900">Class</th>
                                @if (Auth::user()->role == 'Admin')
                                    <th class="pr-10 py-2 text-sm text-gray-900 text-right">Actions</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($parentChildren as $child)
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="px-10 py-2">{{ $loop->iteration }}</td>
                                    <td class="px-4 py-2">{{ $child->full_name }}</td>
                                    <td class="px-4 py-2">{{ $child->gender }}</td>
                                    <td class="px-4 py-2">{{ $child->dob }}</td>
                                    <td class="px-4 py-2">
                                        <b>{{ $child->classCategories->class_name }}</b>
                                        ({{ $child->classCategories->description }})
                                    </td>
                                    @if (Auth::user()->role == 'Admin')
                                        <td class="pr-10 py-2 text-right">
                                            <div class="flex items-center justify-end space-x-2">
                                                <a href="{{ route('children.edit', $child) }}" class="text-gray-500 hover:text-gray-600" title="Edit Child">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('children.destroy', $child) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-500 hover:text-red-600" onclick="return confirm('Are you sure?')" title="Delete Child">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    @endif
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-4 py-2 text-center text-gray-500">No children found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
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
