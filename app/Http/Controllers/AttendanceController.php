<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\AttendanceKaka;
use App\Models\Event;
use App\Models\Child;
use App\Models\User;
use App\Models\JoinEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    public function index()
    {

        $events = Event::with(['classCategories', 'kaka'])->get();
        $children = Child::all();
        return view('attendances.index', compact('events', 'children'));
    }
    public function indexkaka()
    {
        $events = Event::with('classCategories')->get();
        $kaka = User::where('role', 'Kaka')->get();
        return view('attendances.indexkaka', compact('events', 'kaka'));
        
    }
    public function create($event_id)
    {
        $event = Event::findOrFail($event_id);
        $children = Child::all();

        return view('attendances.create', compact('event', 'children'));
    }
    public function createkaka($event_id)
    {
        $event = Event::findOrFail($event_id);
        $kaka = User::all();

        return view('attendances.createkaka', compact('event', 'kaka'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'child_id' => 'required|exists:children,id',
            'event_id' => 'required|exists:events,id',
        ]);
        JoinEvent::create([
            'event_id' => $request->event_id,
            'child_id' => $request->child_id,
        ]);

        return redirect()->route('events.index')->with('success', 'Successfully joined the event!');
    }
    public function attend(Request $request)
    {

        $validated = $request->validate([
            'child_id' => 'required|exists:children,id',
            'event_id' => 'required|exists:events,id',
            'class_id' => 'required|exists:class_categories,id',
        ]);


        $attendance = new Attendance();
        $attendance->child_id = $request->child_id;
        $attendance->event_id = $request->event_id;
        $attendance->class_id = $request->class_id;
        $attendance->status = 'On Time';
        $attendance->save();
        return redirect()->route('attendances.index')->with('success', 'Attendance recorded successfully.');
    }
    public function attendout(Request $request)
    {

        $validated = $request->validate([
            'child_id' => 'required|exists:children,id',
            'event_id' => 'required|exists:events,id',
            'class_id' => 'required|exists:class_categories,id',
        ]);


        $attendance = new Attendance();
        $attendance->child_id = $request->child_id;
        $attendance->event_id = $request->event_id;
        $attendance->class_id = $request->class_id;
        $attendance->status = 'Checkout';
        $attendance->save();
        return redirect()->route('attendances.index')->with('success', 'Attendance recorded successfully.');
    }
    public function attendkaka(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'kaka_id' => 'required|exists:users,id',
            'event_id' => 'required|exists:events,id',
            'class_id' => 'required|exists:class_categories,id',
        ]);

        // Simpan ke tabel attendanceskaka
        try {
            AttendanceKaka::create([
                'kaka_id' => $validated['kaka_id'],
                'event_id' => $validated['event_id'],
                'class_id' => $validated['class_id'],
                'status' => 'On Time',
            ]);

            return redirect()->route('attendances.indexkaka')
                ->with('success', 'Attendance recorded successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Failed to record attendance: ' . $e->getMessage());
        }
    }
    public function attendoutkaka(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'kaka_id' => 'required|exists:users,id',
            'event_id' => 'required|exists:events,id',
            'class_id' => 'required|exists:class_categories,id',
        ]);

        // Simpan ke tabel attendanceskaka
        try {
            AttendanceKaka::create([
                'kaka_id' => $validated['kaka_id'],
                'event_id' => $validated['event_id'],
                'class_id' => $validated['class_id'],
                'status' => 'Checkout',
            ]);

            return redirect()->route('attendances.indexkaka')
                ->with('success', 'Checkout recorded successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Failed to record Checkout: ' . $e->getMessage());
        }
    }
    public function history(Request $request)
    {
        $queryAttendances = Attendance::with(['child', 'event', 'classCategory']);
        $queryAttendancesKaka = AttendanceKaka::with(['kaka', 'event', 'classCategory']);

        if ($request->has(['start_date', 'end_date']) && $request->start_date && $request->end_date) {
            $startDate = Carbon::parse($request->start_date)->startOfDay();
            $endDate = Carbon::parse($request->end_date)->endOfDay();

            $queryAttendances->whereBetween('created_at', [$startDate, $endDate]);
            $queryAttendancesKaka->whereBetween('created_at', [$startDate, $endDate]);
        }

        if (Auth::user()->role != 'Admin') {
            $queryAttendances->whereHas('child', function ($query) {
                $query->where('user_id', Auth::id());
            });
            $queryAttendancesKaka->where('kaka_id', Auth::id());
        }

        $attendances = $queryAttendances->get();
        $attendancesKaka = $queryAttendancesKaka->get();

        return view('attendances.history', compact('attendances', 'attendancesKaka'));
    }


    public function historycheckout()
    {
        if (Auth::user()->role != 'Admin') {
            $attendances = Attendance::with(['child', 'event', 'classCategory'])
                ->whereHas('child', function ($query) {
                    $query->where('user_id', Auth::id());
                })
                ->where('status', 'Checkout')
                ->get();


            $attendancesKaka = AttendanceKaka::with(['kaka', 'event', 'classCategory'])
                ->where('kaka_id', Auth::id())
                ->where('status', 'Checkout')
                ->get();
        } else {

            $attendances = Attendance::with(['child', 'event', 'classCategory'])
                ->where('status', 'Checkout')
                ->get();

            $attendancesKaka = AttendanceKaka::with(['kaka', 'event', 'classCategory'])
                ->where('status', 'Checkout')
                ->get();
        }

        return view('attendances.historycheckout', compact('attendances', 'attendancesKaka'));
    }
    
    
}
