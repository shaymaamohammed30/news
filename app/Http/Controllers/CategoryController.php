<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
     $categories = Category::withCount('news')->paginate(10);
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        $category = new Category();
        $parents = Category::all();
        return view('categories.create', compact('category', 'parents'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'parent_id' => 'nullable|exists:categories,id',
        ]);

        $validatedData['slug'] = Str::slug($validatedData['name']);
        Category::create($validatedData);

        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    // Show single category (route-model binding)
    public function show(Category $category)
    {
        return view('categories.show', compact('category'));
    }

    // Edit form for single category
    public function edit(Category $category)
    {
        $parents = Category::where('id', '!=', $category->id)->get(); // لمنع اختيار نفس الفئة ك parent
        return view('categories.edit', compact('category', 'parents'));
    }

    // Update single category
    public function update(Request $request, Category $category)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'parent_id' => 'nullable|exists:categories,id|not_in:' . $category->id,
        ]);

        $validatedData['slug'] = Str::slug($validatedData['name']);
        $category->update($validatedData);

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    // Delete
    public function destroy( $id)
    {
        Category::findOrFail($id)->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}
