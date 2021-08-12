<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topping;
use App\Models\Order;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

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
            $orderValidator = Validator::make($request->all(), [
                'firstName' => ['required', 'alpha'],
                'lastName' => ['nullable','alpha'],
                'telNo' => ['required', 'numeric', 'digits:9'],
                'orderType' => ['required', Rule::in(['1', '2'])],
                'toppings' => ['nullable', 'array'],
                // 'toppings.*' => ['nullable', 'exists:toppings,name'],
            ]);

            $toppingValidator = Validator::make($request->all(), [
                'toppings.*'=> ['nullable', 'exists:toppings,name']
            ]);

            // Check the validations
            if($orderValidator->fails()):
                return response()->json(['errors'=>$orderValidator->errors()]);
            elseif($toppingValidator->fails()):
                return response()->json(['status'=>'invalid_topping', 'msg'=>'Your selected toppings are invalid']);
            // Validate toppings with order type
            elseif($request->orderType === '1' && $request->toppings != null):
                return response()->json(['status'=>'topping_error', 'msg'=>'You choose normal ice cream. Please deselect toppings']);
            elseif($request->orderType === '2' && $request->toppings == null):
                return response()->json(['status'=>'topping_error', 'msg'=> 'You choose ice cream with toppings. Please select your toppings']);
            else:
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
        endif;
        return response()->json(['error'=>'error']);
    }
    // /PLACE AN ORDER
}