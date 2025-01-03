<?php

namespace App\Http\Controllers;

use App\Models\Child;
use App\Models\ClassCategories;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChildController extends Controller
{
    public function index()
    {
        // Ambil semua data anak dengan relasi
        $children = Child::with(['user', 'classCategories'])
            ->orderBy('user_id')
            ->get()
            ->groupBy('user.name');

        // Jika role user adalah 'Parent', filter data sesuai user_id
        if (Auth::user()->role == 'Parent') {
            $parentChildren = Child::with(['user', 'classCategories'])
                ->where('user_id', Auth::user()->id)
                ->orderBy('id')
                ->get();
        } else {
            $parentChildren = collect(); // Kosongkan untuk non-parent
        }

        return view('children.index', compact('children', 'parentChildren'));
    }

    public function create()
    {
        $parents = User::where('role', 'Parent')->get();
        $classes = ClassCategories::all();
        return view('children.create', compact('parents', 'classes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'full_name' => 'required|string|max:255',
            'gender' => 'required|in:Male,Female',
            'dob' => 'required|date',
            'class' => 'required|exists:class_categories,id',
        ]);

        Child::create($request->all());

        return redirect()->route('children.index')->with('success', 'Child created successfully.');
    }

    public function edit(Child $child)
    {
        $parents = User::where('role', 'Parent')->get();
        $classes = ClassCategories::all();
        return view('children.edit', compact('child', 'parents', 'classes'));
    }

    public function update(Request $request, Child $child)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'full_name' => 'required|string|max:255',
            'gender' => 'required|in:Male,Female',
            'dob' => 'required|date',
            'class' => 'required|exists:class_categories,id',
        ]);

        $child->update($request->all());

        return redirect()->route('children.index')->with('success', 'Child updated successfully.');
    }

    public function destroy(Child $child)
    {
        $child->delete();

        return redirect()->route('children.index')->with('success', 'Child deleted successfully.');
    }
}
