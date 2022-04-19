<?php

namespace App\Http\Livewire;
use App\Models\Fooditem;

use Livewire\Component;

class Cart extends Component
{
   public $show = false;

//  protected $listeners = ['some-event' => '$refresh'];

   protected $listeners = [
       'increment'=> 'refreshComponent',
        'decrement'=> 'refreshComponent',
   ];

   public function refreshComponent()
   {
       $this->show=true;
   }

    public function addToCartItem($id)
    {
         $fooditems=Fooditem::findOrFail($id); 
         $cart = session()->get('cart', []);

       if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                 "id" => $fooditems->id,
                "fooditem" => $fooditems->food_item,
                "quantity" => 1,
                "rate" => $fooditems->rate,
                
            ];
        }
      
        session()->put('cart', $cart);
//session
         $cartsession = session()->get('cartsession', []);

       if(isset($cartsession[$id])) {
            $cartsession[$id]['quantity']++;
        } else {
            $cartsession[$id] = [
                 "id" => $fooditems->id,
                "fooditem" => $fooditems->food_item,
                "quantity" => 1,
                "rate" => $fooditems->rate,
                
            ];
        }
      
        session()->put('cartsession', $cart);
          //dd($cartsession);
      $this->emit('some-event');
   
    }

     public function decrementCartItem( $id)
    {
 
         $cart = session()->get('cart', []);
         
          $item=$cart[$id]['quantity'];
          // dd($item);
          if($item==1){
              unset($cart[$id]);
          }
           if(isset($cart[$id]) ) {
            $cart[$id]['quantity']--;
        } else 
             if($item==1){
              unset($cart[$id]);
          }else{
            $cart[$id] = [
                "id" => $fooditems->id ,
                "fooditem" => $fooditems->food_item ,
                "quantity" => 1 ,
                "rate" => $fooditems->rate ,
                
            ];
            
        }
      
        session()->put('cart', $cart);
  
       $this->emit('some-event');
    }

    public function render()
    {
        //dd(session('cart'));
        
        return view('livewire.cart');
    }
}
