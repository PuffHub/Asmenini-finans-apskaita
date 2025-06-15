<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $categories = Category::all();
    return view('categories.index', compact('categories'));
}

public function create()
{
    return view('categories.create');
}

public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'type' => 'required|in:income,expense',
    ]);

    Category::create($request->all());

    return redirect()->route('categories.index')->with('success', 'Kategorija sukurta.');
}

public function edit(Category $category)
{
    return view('categories.edit', compact('category'));
}

public function update(Request $request, Category $category)
{
    $request->validate([
        'name' => 'required',
        'type' => 'required|in:income,expense',
    ]);

    $category->update($request->all());

    return redirect()->route('categories.index')->with('success', 'Kategorija atnaujinta.');
}

public function destroy(Category $category)
{
    $category->delete();
    return redirect()->route('categories.index')->with('success', 'Kategorija ištrinta.');
}

}
