<?php

namespace App\Http\Controllers;

use App\Models\Child;
use App\Models\Renungan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RenunganController extends Controller
{
    public function index()
    {
        $renungans = Renungan::with('child')->get();

        if (Auth::user()->role == 'Parent') {
            $parentChildIds = Child::where('user_id', Auth::user()->id)->pluck('id');
            $parentRenungans = Renungan::with('child')->whereIn('child_id', $parentChildIds)->get();
        } else {
            $parentRenungans = collect();
        }

        return view('renungans.index', compact('renungans', 'parentRenungans'));
            
    }

    public function create()
    {
        $children = Child::all();
        return view('renungans.create', compact('children'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'child_id' => 'required|exists:children,id',
            'renungan' => 'required|string|max:1000',
        ]);

        Renungan::create($request->all());

        return redirect()->route('renungans.index')->with('success', 'Renungan created successfully.');
    }

    public function edit(Renungan $renungan)
    {
        $children = Child::all();
        return view('renungans.edit', compact('renungan', 'children'));
    }

    public function update(Request $request, Renungan $renungan)
    {
        $request->validate([
            'child_id' => 'required|exists:children,id',
            'renungan' => 'required|string|max:1000',
        ]);

        $renungan->update($request->all());

        return redirect()->route('renungans.index')->with('success', 'Renungan updated successfully.');
    }

    public function destroy(Renungan $renungan)
    {
        $renungan->delete();

        return redirect()->route('renungans.index')->with('success', 'Renungan deleted successfully.');
    }
}
