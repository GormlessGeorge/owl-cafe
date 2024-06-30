<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Inertia\Inertia;
use App\Models\MenuItem;

class MenuPageController extends Controller
{
    

    public function index()
    {
        // session()->put(['baba'=> [1, 2, 3, 4, 5]]);
        $menuItems = MenuItem::all();
        // $size = sizeOf(session()->get('baba'));
        return Inertia::render('Menu/Index', ['menuItems' => $menuItems]);
    }
    // public function shit()
    // {
    //     $menuItems = MenuItem::all();
    //     session()->put(['baba' => [1, 2, 3, 4, 5, 7]]);
    //     $size = sizeOf(session()->get('baba'));
    //     return Inertia::render('Menu/Index', ['iNeedThis' => $size, 'menuItems' => $menuItems ]);
    // }
}
