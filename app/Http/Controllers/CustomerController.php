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
            $order->type = $request->orderType;
            $order->toppings = $request->toppings;

            if($order->save()):
                return response()->json(['status'=>'success', 'msg'=>'Your order have successfully placed.', 'order'=>$order]);
            endif;
        endif;
        return response()->json(['error'=>'error']);
    }
    // /PLACE AN ORDER
}