<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\MenuItem;

class CartController extends Controller
{

    //эта функция будет на странице корзины, ее надо изменить.
    // public function showCartTable()
    // {
    //     $products = Product::all();

    //     return view('cart', compact('products'));
    // }

    public function addToCart(int $menuItemId, Request $request)
    {
        // session()->forget('shoppingCart');
        // session()->forget('cartSize');
        $menuItem = MenuItem::find($menuItemId);
        // get data from session (this equals Session::get(), use empty array as default)
        $shoppingCart = session('shoppingCart', []);
        $cartSize = session('cartSize', 0);

        if (isset($shoppingCart[$menuItemId])) {
            // product is already in shopping cart, increment the amount
            $cartSize++;
            $shoppingCart[$menuItemId]['amount'] += 1;
        } else {
            // fetch the product and add 1 to the shopping cart
            $cartSize++;
            $menuItem = MenuItem::findOrFail($menuItemId);
            $shoppingCart[$menuItemId] = [
                'menuItemId' => $menuItemId,
                'amount'    => 1,
                'weight' => $menuItem->weight,
                'imagePath' => $menuItem->image_path,
                'price'     => $menuItem->price,
                'name'      => $menuItem->name,

                //сделать дискаунт
                // 'discount'  => $product->discount
            ];
        }

        // update the session data (this equals Session::put() )
        session(['shoppingCart' => $shoppingCart]);
        $total = $this->calculateTotalAmount();
        session(['cartSize' => $cartSize]);
        session(['cartTotalAmount' => $total]);
        session()->flash('success', 'Товар добавлен в корзину!');
        // return $shoppingCart;
    }



    public function removeFromCart(int $menuItemId)
    {

        $shoppingCart = session('shoppingCart', []);
        $cartSize = session('cartSize', 0);

        if (!isset($shoppingCart[$menuItemId])) {
            // should not happen, and should throw an error.
            return null;
        } else {
            if ($shoppingCart[$menuItemId]['amount'] == 1) {
                unset($shoppingCart[$menuItemId]);
                $cartSize--;
            } else {
                $shoppingCart[$menuItemId]['amount'] -= 1;
                $cartSize--;
            }
        }

        session(['shoppingCart' => $shoppingCart]);
        $total = $this->calculateTotalAmount();
        session(['cartSize' => $cartSize]);
        session(['cartTotalAmount' => $total]);
    }

    public function removeAllFromCart(int $menuItemId)
    {
        $shoppingCart = session('shoppingCart', []);
        $cartSize = session('cartSize', 0);

        if (!isset($shoppingCart[$menuItemId])) {
            // Should not happen, and should throw an error.
            return null;
        } else {
            $menuItemAmount = $shoppingCart[$menuItemId]['amount'];
            unset($shoppingCart[$menuItemId]);
            $cartSize -= $menuItemAmount;
            
        }

        session(['shoppingCart' => $shoppingCart]);
        $total = $this->calculateTotalAmount();
        session(['cartSize' => $cartSize]);
        session(['cartTotalAmount' => $total]);
    }



    public function calculateTotalAmount()
    {
        // Получить данные из сессии
        $shoppingCart = session('shoppingCart', []);
        $totalAmount = 0;

        // Пройтись по всем элементам корзины
        foreach ($shoppingCart as $item) {
            // Умножить цену каждого элемента на его количество и добавить к общей сумме
            $totalAmount += $item['price'] * $item['amount'];
        }

        // Обновить данные в сессии
        // session(['totalAmount' => $totalAmount]);

        // Вернуть общую сумму
        return $totalAmount;
    }
}
