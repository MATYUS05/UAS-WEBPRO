@extends('layouts.dashboard')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Join Event: {{ $event->name }}</h1>
    </div>

    <form action="{{ route('attendances.storekaka') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="kaka_id">Select Kaka</label>
            <select name="kaka_id" id="kaka_id" class="form-control">
                @foreach ($children as $child)
                    <option value="{{ $child->id }}">{{ $child->full_name }}</option>
                @endforeach
            </select>
        </div>
        <input type="hidden" name="event_id" value="{{ $event->id }}">

        <button type="submit" class="btn btn-primary">Join Event</button>
    </form>
@endsection
