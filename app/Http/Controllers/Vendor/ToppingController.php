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
                'newToppingName' => ['required', 'string'],
                'newToppingPrice' => ['required', 'integer', 'min:0']
            ]);

            if($toppingValidator->fails()):
                return response()->json(['errors'=>$toppingValidator->errors()]);
            else:
                $topping = new Topping();
                $topping->name = $request->newToppingName;
                $topping->price = $request->newToppingPrice;

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
    public function editToppingGetDetails(Request $request)
    {
        if($request->ajax()):
            //Validate topping id
            $toppingIdValidator = Validator::make($request->all(), [
                'toppingId'=> ['required', 'integer', 'exists:toppings,id']
            ]);

            //Check validation errors
            if($toppingIdValidator->fails()):
                return response()->json(['status'=>'invalid_id']);
            else:
                if($topping = Topping::find($request->toppingId)):
                    return response()->json(['status'=>'success', 'topping'=>$topping]);
                endif;
            endif;
        endif;
        return response()->json(['status'=>'error']);
    }
    // /GET DETAILS OF TOPPING TO EDIT 

    // EDIT TOPPING
    public function editTopping(Request $request)
    {
        if($request->ajax()):
            // Validate topping details
            $editToppingValidator = Validator::make($request->all(), [
                'toppingName' => ['required', 'string'],
                'toppingPrice' => ['required', 'integer', 'min:0']
            ]);

            //Validate topping id
            $toppingIdValidator = Validator::make($request->all(), [
                'toppingId' => ['required', 'integer', 'exists:toppings,id']
            ]);

            //Check validation errors
            if(isset($editToppingValidator) && $editToppingValidator->fails()):
                return response()->json(['errors'=>$editToppingValidator->errors()]);
            elseif(isset($toppingIdValidator) && $toppingIdValidator->fails()):
                return response()->json(['status'=>'id_error']);
            else:
                //Update the topping details
                if(Topping::where('id', $request->toppingId)->update([
                    'name'=>$request->toppingName,
                    'price'=>$request->toppingPrice
                ])):
                return response()->json(['status'=>'success']);
                endif;
            endif;
        endif;
    } 
    // /EDIT TOPPING

    // DELETE TOPPING
    public function deleteTopping(Request $request)
    {
        if($request->ajax()):
            // Validate topping id
            $toppingIdValidator = Validator::make($request->all(), [
                'toppingId' => ['required', 'integer', 'exists:toppings,id']
            ]);

            //Check validation fails
            if($toppingIdValidator->fails()):
                return response()->json(['status'=>'id_error']);
            else:
                //Delete the topping
                if(Topping::destroy($request->toppingId)):
                    return response()->json(['status'=>'success']);
                endif;
            endif;
        endif;
        return response()->json(['status'=>'error']);
    }
    // /DELETE TOPPING
}
