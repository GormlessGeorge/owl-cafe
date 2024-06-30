<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Category;
use App\Models\MenuItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartPageController extends Controller
{
    public function index()
    {   
        // $menuItems = MenuItem::all();
        $shoppingCart = session('shoppingCart', []);
        return Inertia::render('Cart/Index', ['shoppingCart' => $shoppingCart]);
    }

    public function clearCart()
    {
        session()->forget('shoppingCart');
        session()->forget('cartSize');
        
    }

}
