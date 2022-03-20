<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Fooditem;
use App\Models\Restaurant;


class Food extends Component
{
    public $fooditems;
    public $restaurant; 
    
    public function mount($restaurant)
    {
       $this->fooditems= Fooditem::all();
       $this->restaurant=$restaurant->fooditems;

    }
    public function render()
    {  
      return view('livewire.food');
    }

     public function addToCart($id)
    {
        dd($id);
    //    $fooditems=Fooditem::findOrFail($id);
      
    //   $cart = session()->get('cart', []);
    //    if(isset($cart[$id])) {
    //         $cart[$id]['quantity']++;
    //     } else {
    //         $cart[$id] = [
    //             "fooditem" => $fooditems->food_item,
    //             "quantity" => 1,
    //             "rate" => $fooditems->rate,
                
    //         ];
    //     }
        //    dd($cart);
        // session()->put('cart', $cart);
        // return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
}
