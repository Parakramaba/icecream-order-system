<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Topping;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Validator;

class ToppingController extends Controller
{
    public function index()
    {
        $toppings = Topping::orderby('id')->get();
        return view('vendor.toppings', compact('toppings'));
    }

    // CREATE A NEW TOPPING
    public function createTopping(Request $request)
    {
        if($request->ajax()):
            // Validate topping inputs
            $toppingValidator = Validator::make($request->all(), [
                'toppingName' => ['required', 'string'],
                'toppingPrice' => ['required', 'integer', 'min:0']
            ]);

            if($toppingValidator->fails()):
                return response()->json(['errors'=>$toppingValidator->errors()]);
            else:
                $topping = new Topping();
                $topping->name = $request->toppingName;
                $topping->price = $request->toppingPrice;

                if($topping->save()):
                    return response()->json(['status'=>'success', 'topping'=>$topping]);
                endif;
            endif;
        endif;
        return response()->json(['error'=>'error']);
    }
    // /CREATE A NEW TOPPING

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

    // GET DETAILS OF TOPPING TO EDIT
    // public function editToppingGetDetails(Request $request)
    // {
    //     if($request->ajax()):
    //         $topping = Topping::find($request->id);
    //         return response()->json(['topping'=>$topping]);
    //     endif;
    // }
    // /GET DETAILS OF TOPPING TO EDIT 
}
