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

    public function addTopping(Request $request)
    {
        return response()->json(['status'=>'success']);
    }
}
