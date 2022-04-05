<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fooditem;
use App\Models\Address;

use Session;

class CartController extends Controller
{
    //
    public function cart()
    {
        return view('cart');
    }
    
     public function addToCart($id)
    {
        $fooditems=Fooditem::findOrFail($id);
      
      $cart = session()->get('cart', []);
       if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "fooditem" => $fooditems->food_item,
                "quantity" => 1,
                "rate" => $fooditems->rate,
                
            ];
        }
        //    dd($cart);
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function cartDelete(Request $request ,$id)
    {
        $cart = Session::get('cart');
        unset($cart[$id]);
        Session::put('cart', $cart);
        return redirect()->back();

    }


   public function remove($id)
    {
        $fooditems=Fooditem::findOrFail($id);
      
      $cart = session()->get('cart', []);
       if(isset($cart[$id])) {
            $cart[$id]['quantity']--;
        } else {
            $cart[$id] = [
                "fooditem" => $fooditems->food_item,
                "quantity" => 1,
                "rate" => $fooditems->rate,
                
            ];
        }
        //    dd($cart);
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product removed to cart successfully!');
    }

    // public function empty_cart()
    // {
    //           $cart = session()->get('cart', []);

    //     return view('front.empty_cart');
    // }

    public function cart_items()
    {
     $cart = session()->get('cart', []);

     return view('front.cart2');
    }


   


        //checkout page

   
}
