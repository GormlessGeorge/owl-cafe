<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\MenuItem;
use App\Models\Category;

class MenuItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return inertia(
            'Admin/MenuItem/Index',
            ['menuItems' => MenuItem::with('category')->get()]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return inertia('Admin/MenuItem/Create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $path = null;
        if ($request->hasFile('image_path')) {
            $path = $request->file('image_path')->store('menu_items_images', 'public');
        }

        $data = $request->all();
        $data['image_path'] = $path;
        $data['is_favourite'] = (int)$request['is_favourite'];

        MenuItem::create($data);

        return redirect()->route('menu-items.index');

        // return redirect()->route('menu-items.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(MenuItem $menuItem)
    {
        return inertia(
            'Admin/MenuItem/Show',
            ['menuItem' => $menuItem]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MenuItem $menuItem)
    {
        $categories = Category::all();
        return inertia(
            'Admin/MenuItem/Edit',
            ['menuItem' => $menuItem, 'categories' => $categories]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MenuItem $menuItem)
    {
        // dd((int)$request['is_favourite']);
        // Удалить старый файл, если он существует
        if ($menuItem->image_path) {
            Storage::disk('public')->delete($menuItem->image_path);
        }

        // Загрузить новый файл, если он предоставлен
        $path = $menuItem->image_path;
        if ($request->hasFile('image_path')) {
            $path = $request->file('image_path')->store('menu_items_images', 'public');
        }

        // Обновить элемент меню
        $data = $request->all();
        $data['image_path'] = $path;
        $data['is_favourite'] = $request['is_favourite'];
        // dd($data['is_favourite']);
        $menuItem->update($data);

        return redirect()->route('menu-items.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MenuItem $menuItem)
    {
        if ($menuItem->image_path) {
            Storage::disk('public')->delete($menuItem->image_path);
        }

        $menuItem->delete();

        return redirect()->route('menu-items.index');
    }
}
