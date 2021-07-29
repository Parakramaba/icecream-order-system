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

    public function createOrder(Request $request)
    {
        return response()->json(['status'=>'success', 'msg'=>'Your order have successfully placed.']);
    }
}