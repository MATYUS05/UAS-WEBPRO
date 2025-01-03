@extends('layouts.dashboard')

@section('content')
    <div class="container mx-auto px-4 py-6 bg-white">
        <!-- Header Section -->
        <div class="flex flex-wrap items-center justify-between mt-2 mb-10 ml-8">
            <div>
                <h1 class="text-3xl font-bold text-rial mt-6">Class Categories</h1>
                <p class="text-sm text-gray-600">Class categories Record</p>
            </div>
            @if (Auth::user()->role == 'Admin')
                <a href="{{ route('class_categories.create') }}" class="btn bg-rial text-white hover:bg-gray-800 mt-6">
                    <i class="fas fa-plus mr-2"></i>Add Class Category
                </a>
            @endif
        </div>

        <div class="bg-rial  px-4 py-3 flex items-center justify-between border-b-4 border-rial">
            <div class="flex items-center">

                <svg class="w-8 h-8 mx-auto" fill="none" stroke="white" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
                <h5 class="text-xl font-bold text-gray-100 ml-4 ">Classes </h5>
            </div>
        </div>

        <!-- Alert Messages -->
        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 rounded">
                <p><i class="fas fa-check-circle mr-2"></i>{{ session('success') }}</p>
            </div>
        @endif

        <!-- Class Categories Table -->
        <div class="shadow-lg rounded-lg overflow-hidden mb-6">
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white">
                    <thead>
                        <tr class="text-left border-b bg-gray-100">
                            <th class="pl-10 py-2 text-sm text-gray-900">#</th>
                            <th class="px-4 py-2 text-sm text-gray-900">Class Name</th>
                            <th class="px-4 py-2 text-sm text-gray-900">Age</th>
                            @if (Auth::user()->role == 'Admin')
                                <th class="pr-10 py-2 text-sm text-gray-900 text-right">Actions</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="px-10 py-2">{{ $loop->iteration }}</td>
                                <td class="px-4 py-2">{{ $category->class_name }}</td>
                                <td class="px-4 py-2">{{ $category->description }} Years Old</td>
                                @if (Auth::user()->role == 'Admin')
                                    <td class="pr-10 py-2 text-right">
                                        <div class="flex items-center justify-end space-x-2">
                                            <a href="{{ route('class_categories.edit', $category) }}" class="text-gray-500 hover:text-gray-600" title="Edit Category">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('class_categories.destroy', $category) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:text-red-600" onclick="return confirm('Are you sure?')" title="Delete Category">
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

        .bg-abu {
            background-color: #938787;
        }

        .bg-rial {
            background-color: #2B263B;
        }

        .text-rial {
            color: #2B263B;
        }

        .color-white {
            color: #ffffff;
        }

        .color-grape {
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
