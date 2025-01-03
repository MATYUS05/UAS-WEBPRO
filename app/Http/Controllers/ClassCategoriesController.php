<?php

namespace App\Http\Controllers;

use App\Models\ClassCategories;
use Illuminate\Http\Request;

class ClassCategoriesController extends Controller
{
    public function index()
    {
        $categories = ClassCategories::all();
        return view('class_categories.index', compact('categories'));
    }

    public function create()
    {
        return view('class_categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'class_name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        ClassCategories::create($request->all());

        return redirect()->route('class_categories.index')->with('success', 'Class Category created successfully.');
    }

    public function edit(ClassCategories $class_category)
    {
        return view('class_categories.edit', compact('class_category'));
    }

    public function update(Request $request, ClassCategories $class_category)
    {
        $request->validate([
            'class_name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $class_category->update($request->all());

        return redirect()->route('class_categories.index')->with('success', 'Class Category updated successfully.');
    }

    public function destroy(ClassCategories $class_category)
    {
        $class_category->delete();

        return redirect()->route('class_categories.index')->with('success', 'Class Category deleted successfully.');
    }
}
