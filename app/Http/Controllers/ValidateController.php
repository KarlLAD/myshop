<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Validate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ValidateController extends Controller
{
    //
    public function index($id=0)
    {


        $user = Auth::user()->id;

        $cart = Cart::where('user_id', $user)->get();

        $product = Product::where('user_id', $user)->get();

        $somme = 0;
        $port = 10.50 ;
        $validate = Validate::all();
        $validate = $cart;

        return view('validate', compact('validate', 'cart', 'somme', 'port', 'product'));
    }



}
