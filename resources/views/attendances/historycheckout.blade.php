@extends('layouts.dashboard')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Attendance History Checkout</h1>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Children Attendance</h6>
        </div>
        <div class="card-body">
            @if ($attendances->isEmpty())
                <p>No attendance records found for children.</p>
            @else
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Child Name</th>
                            <th>Event</th>
                            <th>Class</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($attendances as $attendance)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $attendance->child->full_name ?? 'N/A' }}</td>
                                <td>{{ $attendance->event->name ?? 'N/A' }}</td>
                                <td>{{ $attendance->classCategory->class_name ?? 'N/A' }}</td>
                                <td
                                    class="{{ $attendance->status == 'On Time' ? 'text-primary' : ($attendance->status == 'Checkout' ? 'text-danger' : '') }}">
                                    <b>{{ $attendance->status }}</b>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>

    </div>
@endsection
