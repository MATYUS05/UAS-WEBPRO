<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Child;
use App\Models\JoinEvent;
use App\Models\User;
use App\Models\ClassCategories;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::with('classCategories')->get();
        $children = Child::all();
        return view('events.index', compact('events', 'children'));
        
        
    }
    public function create()
    {
        $classes = ClassCategories::all();
        $kakas = User::where('role', 'Kaka')->get();
        return view('events.create', compact('classes', 'kakas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'class_id' => 'required|exists:class_categories,id',
            'kaka_id' => 'required|exists:users,id',
        ]);

        $timeSlots = [
            ['08:30', '10:00'],
            ['10:30', '12:30'],
            ['13:00', '15:00'],
            ['16:00', '18:00'],
        ];

        foreach ($timeSlots as $slot) {
            Event::create([
                'name' => $request->name,
                'description' => $request->description,
                'date' => $request->date,
                'time' => $slot[0],
                'time_end' => $slot[1],
                'location' => $request->location,
                'class_id' => $request->class_id,
                'kaka_id' => $request->kaka_id,
            ]);
        }

        return redirect()->route('events.index')->with('success', 'Event created successfully with multiple time slots.');
    }


    public function edit(Event $event)
    {
        $classes = ClassCategories::all();
        $kakas = User::where('role', 'Kaka')->get();
        return view('events.edit', compact('event', 'classes', 'kakas'));
    }

    public function update(Request $request, Event $event)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'date' => 'required|date',
        'time' => 'nullable',
        'location' => 'required|string|max:255',
        'class_id' => 'required|exists:class_categories,id',
        'kaka_id' => 'required|exists:users,id',
    ]);

    $data = $request->only(['name', 'description', 'date', 'location', 'class_id', 'kaka_id']);
    
    // Update time only if provided
    if (!empty($request->time)) {
        $data['time'] = $request->time;
    }

    $event->update($data);

    return redirect()->route('events.index')->with('success', 'Event updated successfully.');
}

    

    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('events.index')->with('success', 'Event deleted successfully.');
    }

    public function joinEvent(Request $request)
    {
        $request->validate([
            'event_id' => 'required|exists:events,id',
            'child_id' => 'required|exists:children,id',
        ]);

        JoinEvent::create([
            'event_id' => $request->event_id,
            'child_id' => $request->child_id,
        ]);

        return response()->json(['success' => true, 'message' => 'Child joined the event successfully!']);
    }
}
