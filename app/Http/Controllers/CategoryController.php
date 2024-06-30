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
        return inertia(
            'Admin/Category/Index',
            ['categories' => Category::all()]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia(
            'Admin/Category/Create'
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->('name'));
        Category::create($request->all());

        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return inertia(
            'Admin/Category/Show',
            ['category' => $category]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return inertia(
            'Admin/Category/Edit',
            ['category' => $category]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
        ]);
    
        // Обновление категории
        $category->update($validatedData);
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index');
    }
}
