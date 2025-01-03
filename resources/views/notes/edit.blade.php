@extends('layouts.dashboard')

@section('content')
    <div class="container mx-auto px-4 md:px-6 py-6"> 
        <h1 class="text-2xl font-semibold text-gray-900 mb-6">Edit Note</h1>

        <div class="bg-gray-50 p-6 rounded-lg shadow-lg border border-gray-200">
        <form action="{{ route('notes.update', $note->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            <div class="flex flex-col space-y-2">
                <label for="child_id" class="text-gray-800 font-medium">Child</label>
                <select name="child_id" id="child_id" class="border border-blue-300 rounded-lg px-4 py-2 focus:ring focus:ring-blue-100 focus:outline-none text-gray-900" required>
                    @foreach ($children as $child)
                        <option value="{{ $child->id }}" {{ $note->child_id == $child->id ? 'selected' : '' }}>
                            {{ $child->full_name }}
                        </option>
                    @endforeach
                </select>
        </div>
        <div class="flex flex-col space-y-2">
                <label for="notes" class="text-gray-800 font-medium">Notes</label>
                <textarea name="notes" id="notes" rows="4" class="border border-blue-300 rounded-lg px-4 py-2 focus:ring focus:ring-blue-100 focus:outline-none text-gray-900" required>{{ $note->notes }}</textarea>
            </div>

            <button type="submit" class="w-full py-2 px-4 bg-gray-900 text-white font-medium text-sm rounded-lg shadow hover:bg-blue-600 focus:ring-2 focus:ring-blue-400 focus:ring-offset-2 focus:outline-none">Update</button>
        </form>
    </div>
</div>
@endsection