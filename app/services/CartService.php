<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\MenuItem;

class CartService
{
    public function addToCart(Request $request, MenuItem $menuItem)
    {
        $cart = $request->session()->get('cart', []);
        if (isset($cart[$menuItem->id])) {
            $cart[$menuItem->id]['quantity']++;
        } else {
            $cart[$menuItem->id] = ['quantity' => 1];
        }
        $request->session()->put('cart', $cart);
    }

    public function removeFromCart(Request $request, MenuItem $menuItem)
    {
        $cart = $request->session()->get('cart', []);
        if (isset($cart[$menuItem->id])) {
            $cart[$menuItem->id]['quantity']--;
            if ($cart[$menuItem->id]['quantity'] <= 0) {
                unset($cart[$menuItem->id]);
            }
        }
        $request->session()->put('cart', $cart);
    }

    public function getCart(Request $request)
    {
        return $request->session()->get('cart', []);
    }

    public function clearCart(Request $request)
    {
        $request->session()->forget('cart');
    }
}
