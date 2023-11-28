<?php

namespace App\Http\Controllers;

use delete;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // lister le panier
    public function index()
    {
        //
        $user = Auth::user()->id;
        $cart = Cart::where('user_id', $user)->get();
        $somme = 0;

        return view('cart', compact('user', 'cart', 'somme'));
    }

    // ajouter au panier
    public function add(Product $product)
    {
        //
        // On vérifie l'existance du produit du panier

        // SELEC * FROM Cart WHERE user_id="" AND product_id="$product->id" LIMIT(1)

        $cart = Cart::where('user_id', Auth::user()->id)
            ->where('product_id', $product->id)
            ->first();

        if (isset($cart)) {
            // Le produit existe déjà dans le panier
            Cart::where('id', $cart->id)->update([
                'quantity' => $cart->quantity + 1
            ]);
        } else {
            // Le produit n'existe pas encore dans le panier, alors créez une nouvelle entrée
            Cart::create([
                "user_id" => Auth::user()->id,
                "product_id" => $product->id,
                "quantity" => 1,
                "price" => $product->prix,
            ]);
        }

        dd($cart);
        return redirect()->back();
    }

    // effacer un produit

    public function delete(Product $product)
    {
        // on vérifie l'existance du produit
        $cart = Cart::where('user_id', Auth::user()->id)
            ->where('product_id', $product->id)
            ->first();

        if (isset($cart)) {
            // Le produit existe déjà dans le panier , on enlève un produit
            Cart::where('id', $cart->id)->delete([
                'quantity' => $cart->quantity - 1
            ]);
        } else {
            // on efface le produit dans le panier
            Cart::where('id', $cart->id)->delete([
                "user_id" => Auth::user()->id,
                "product_id" => $product->id,
                "quantity" => 0,
                "price" => 0,
            ]);
        }
        return redirect()->back();
    }

    //valider le panier
    // public function validate(Product $product)
    // {

    //             // on vérifie l'existance du produit
    //             $cart = Cart::where('user_id', Auth::user()->id)
    //             ->where('product_id', $product->id)
    //             ->first();

    //             if (isset($cart)) {
    //                 // Le produit existe déjà dans le panier
    //                 Cart::all()->get();
    //             } else {


    //             }

    //     $product = Cart::where('user_id', Auth::user()->id);


    //     return redirect()->back();
    // }
}
// <?php

// namespace App\Http\Controllers;

// use App\Models\Cart;
// use App\Models\Product;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;

// class CartController extends Controller
// {
//     //
//     public function index()
//     {
//         //
//         $user = Auth::user()->id;

//         $cart = Cart::where('user_id', $user)->get();

//         // dd($cart);

//         return view('cart', compact('cart'));
//     }

//     //
//     public function add(Product $product)
//     {
//         //
//                 // On vérifie l'existance du produit du panier

//         // SELEC * FROM Cart WHERE user_id="" AND product_id="$product->id" LIMIT(1)

//         $cart = Cart::where('user_id', Auth::user()->id)
//             ->where('product_id', $product->id)
//             ->first();

//         if (isset($cart)) {
//             // Le produit existe déjà dans le panier
//             Cart::where('id', $cart->id)->update([
//                     'quantity' => $cart->quantity+1
//                 ]);
//         }else {
//             // Le produit n'existe pas encore dans le panier, alors créez une nouvelle entrée
//             Cart::create([
//                 "user_id" => Auth::user()->id,
//                 "product_id" => $product->id,
//                 "quantity" => 1,
//                 "price" => $product->prix,
//             ]);
//         }
//     }

//     //
//     public function delete()
//     {
//         //
//     }
// }
