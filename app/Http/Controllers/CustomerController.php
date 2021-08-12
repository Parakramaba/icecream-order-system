<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topping;
use App\Models\Order;

class CustomerController extends Controller
{
    public function index()
    {
        $toppings = Topping::orderby('id')->get();
        return view('customer', compact('toppings'));
    }

    // PLACE AN ORDER
    public function placeOrder(Request $request)
    {
        if($request->ajax()):
            $order = new Order();
            $order->first_name = $request->firstName;
            $order->last_name = $request->lastName;
            $order->telephone = $request->telNo;
            $order->type = $request->orderType;
            $order->toppings = $request->toppings;

            // Get the total price with added toppings
            $totalPrice = 100;
            if($request->toppings != null):
                foreach($request->toppings as $topping):
                    $totalPrice = $totalPrice + Topping::where('name', $topping)->first()->price;
                endforeach;
            endif;

            // Save order details
            if($order->save()):
                return response()->json(['status'=>'success', 'msg'=>'Your order have successfully placed.', 'order'=>$order, 'totalPrice'=>$totalPrice]);
            endif;
        endif;
        return response()->json(['error'=>'error']);
    }
    // /PLACE AN ORDER
}