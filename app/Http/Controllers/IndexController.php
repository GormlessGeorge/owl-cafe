<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuItem;
use Inertia\Inertia;
class IndexController extends Controller
{
    public function index()
    {
        $recommendedMenuItems = MenuItem::where('is_favourite', 1)->get();

        return Inertia::render('Index', [
            'recommendedMenuItems' => $recommendedMenuItems
        ]);
    }
}
