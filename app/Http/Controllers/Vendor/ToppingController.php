<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Topping;
use Yajra\Datatables\Datatables;

class ToppingController extends Controller
{
    public function index()
    {
        $toppings = Topping::orderby('id')->get();
        return view('vendor.toppings', compact('toppings'));
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

    // GET TOPPINGS LIST
    public function getToppingsList(Request $request)
    {
        if($request->ajax()):
            $data = Topping::get();

            return Datatables::of($data)
            ->rawColumns(['action'])
            ->make(true);
        endif;   
    }
    // /GET TOPPINGS LIST
}
