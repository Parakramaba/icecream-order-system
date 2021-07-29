<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topping;

class VendorController extends Controller
{
    public function index()
    {
        $toppings = Topping::orderby('id')->get();
        return view('vendor', compact('toppings'));
    }

    // ADD A NEW TOPPING
    public function addTopping(Request $request)
    {
        if($request->ajax()):
            $topping = new Topping();
            $topping->name = $request->toppingName;
            $topping->price = $request->toppingPrice;

            if($topping->save()):
                return response()->json(['status'=>'success']);
            endif;
        endif;
        return response()->json(['error'=>'error']);
    }
    // /ADD A NEW TOPPING
}
