<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topping;

class HomeController extends Controller
{
    public function index()
    {
        $toppings = Topping::orderby('id')->get();
        return view('home', compact('toppings'));
    }
}