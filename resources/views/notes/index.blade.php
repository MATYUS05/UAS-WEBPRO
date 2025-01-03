@extends('layouts.dashboard')

@section('content')
    <div class="container mx-auto px-4 py-6 bg-white">
        <!-- Header Section -->
        <div class="flex flex-wrap items-center justify-between mt-2 mb-10 ml-8">
            <div>
                <h1 class="text-3xl font-bold text-rial mt-6">Notes</h1>
                <p class="text-sm text-gray-600">Notes Record</p>
            </div>
            @if (Auth::user()->role == 'Admin' || Auth::user()->role == 'Kaka')
                <a href="{{ route('notes.create') }}" class="btn bg-rial text-white hover:mt-6">
                    <i class="fas fa-plus mr-2"></i>Add Note
                </a>
            @endif
        </div>

        <div class="bg-rial  px-4 py-3 flex items-center justify-between border-b-4 border-rial rounded-lg">
            <div class="flex items-center">
            <svg class="w-7 h-7 mx-auto" fill="none" stroke="white" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                <h5 class="text-xl font-bold text-gray-50 ml-4">Notes</h5>
            </div>
            <form method="GET" action="{{ route('notes.index') }}" class="flex gap-2">
            <input type="text" name="search" class="w-full px-3 py-2 border border-gray-300 rounded focus:ring focus:ring-rial"
                   placeholder="Search by child name..." value="{{ request('search') }}">
                   <button type="submit" class="btn text-white border-l-0 rounded-r-md px-3 py-2 hover:bg-gray-500 ">
                        <i class="fas fa-search "></i>
                    </button>                   </form>
        </div>

        <!-- Alert Messages -->
        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 rounded">
                <p><i class="fas fa-check-circle mr-2"></i>{{ session('success') }}</p>
            </div>
        @endif

        <div class="shadow-lg rounded-lg overflow-hidden mb-6">
            @if (Auth::user()->role == 'Admin' || Auth::user()->role == 'Kaka')
                <div class="overflow-x-auto overflow-y-auto max-h-96">
                    <table class="min-w-full bg-white">
                        <thead>
                            <tr class="bg-gray-100 text-left">
                                <th class="pl-10 py-2 text-sm text-gray-900">No.</th>
                                <th class="px-4 py-2 text-sm text-gray-900">Child</th>
                                <th class="px-4 py-2 text-sm text-gray-900">Notes</th>
                                <th class="px-4 py-2 text-sm text-gray-900">Created at</th>
                                <th class="pr-10 py-2 text-sm text-gray-900 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $filteredNotes = $notes->filter(function ($note) {
                                    return stripos($note->child->full_name, request('search')) !== false;
                                });
                            @endphp
                            @forelse ($filteredNotes as $note)
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="px-10 py-2">{{ $loop->iteration }}</td>
                                    <td class="px-4 py-2">{{ $note->child->full_name }}</td>
                                    <td class="px-4 py-2">{{ $note->notes }}</td>
                                    <td class="px-4 py-2">{{ $note->created_at }}</td>
                                    <td class="pr-10 py-2 text-right">
                                        <div class="flex items-center justify-end space-x-2">
                                            <a href="{{ route('notes.edit', $note) }}" class="text-gray-500 hover:text-rial" title="Edit Note">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('notes.destroy', $note) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:text-red-700" onclick="return confirm('Are you sure?')" title="Delete Note">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-4 text-gray-500">No notes found for "{{ request('search') }}".</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            @endif
        </div>

        @if (Auth::user()->role == 'Parent')
            <div class="shadow-lg rounded-lg overflow-hidden mb-6">
                <div class="overflow-x-auto overflow-y-auto max-h-96">
                    <h6 class="bg-rial text-white px-4 py-2 font-bold">Your Notes</h6>
                    <table class="min-w-full bg-white">
                        <thead>
                            <tr class="bg-gray-100 text-left">
                                <th class="pl-10 py-2 text-sm text-gray-900">#</th>
                                <th class="px-4 py-2 text-sm text-gray-900">Child</th>
                                <th class="px-4 py-2 text-sm text-gray-900">Notes</th>
                                <th class="px-4 py-2 text-sm text-gray-900">Created at</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $filteredParentNotes = $parentNotes->filter(function ($note) {
                                    return stripos($note->child->full_name, request('search')) !== false;
                                });
                            @endphp
                            @forelse ($filteredParentNotes as $note)
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="px-10 py-2">{{ $loop->iteration }}</td>
                                    <td class="px-4 py-2">{{ $note->child->full_name }}</td>
                                    <td class="px-4 py-2">{{ $note->notes }}</td>
                                    <td class="px-4 py-2">{{ $note->created_at }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center py-4 text-gray-500">No notes found for "{{ request('search') }}".</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
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
