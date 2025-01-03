<?php

namespace App\Http\Controllers;

use App\Models\Child;
use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    public function index()
    {
        $notes = Note::with('child')->get();

        if (Auth::user()->role == 'Parent') {
            $parentChildIds = Child::where('user_id', Auth::user()->id)->pluck('id');
            $parentNotes = Note::with('child')->whereIn('child_id', $parentChildIds)->get();
        } else {
            $parentNotes = collect();
        }

        return view('notes.index', compact('notes', 'parentNotes'));
    }

    public function create()
    {
        $children = Child::all();
        return view('notes.create', compact('children'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'child_id' => 'required|exists:children,id',
            'notes' => 'required|string|max:1000',
        ]);

        Note::create($request->all());

        return redirect()->route('notes.index')->with('success', 'Note created successfully.');
    }

    public function edit(Note $note)
    {
        $children = Child::all();
        return view('notes.edit', compact('note', 'children'));
    }

    public function update(Request $request, Note $note)
    {
        $request->validate([
            'child_id' => 'required|exists:children,id',
            'notes' => 'required|string|max:1000',
        ]);

        $note->update($request->all());

        return redirect()->route('notes.index')->with('success', 'Note updated successfully.');
    }

    public function destroy(Note $note)
    {
        $note->delete();

        return redirect()->route('notes.index')->with('success', 'Note deleted successfully.');
    }
}
