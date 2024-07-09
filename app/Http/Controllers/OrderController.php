<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\MenuItem;
use Inertia\Inertia;

class OrderController extends Controller
{

    public function index()
    {
//         fopen("https://api.telegram.org/bot7233196142:AAHHNvSHqJyJ-zFhuXA2OKILD-Ra_UzceQU
// /sendMessage?chat_id=-1002217020157&text=Привет%20мир", "r");
        return inertia(
            'Admin/Orders/Index',
            ['orders' => Order::with('menuItems')->get()]
            //with pivot?
        );
    }


    public function store(Request $request)
    {
        $order = new Order();
        $order->name = $request->input(0)['name'];
        $order->phone = $request->input(0)['phone'];
        $order->email = $request->input(0)['email'];
        $order->commentary = $request->input(0)['commentary'];
        $order->delivery_type = $request->input(0)['deliveryType'];
        $order->street = $request->input(0)['street'];
        $order->house_number = $request->input(0)['houseNumber'];
        $order->flat_number = $request->input(0)['flatNumber'];
        $order->payment_type = $request->input(0)['paymentType'];
        $order->total_payment = $request->get(2);

        $order->save();
        // dd($request->get(1));
        foreach ($request->get(1) as $item) {
            $menuItem = MenuItem::find($item['menuItemId']);
            if ($menuItem) {
                $order->menuItems()->attach($menuItem, ['quantity' => $item['amount']]);
            }
        }
        
    }

    
}
