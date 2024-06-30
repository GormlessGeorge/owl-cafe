<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;



class AdminPageController extends Controller
{


    public function index()
    {
        return inertia(
            'Admin/Dashboard',
            // ['categories' => Category::all()]
        );
    }
}
