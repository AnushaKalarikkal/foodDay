<?php

namespace App\Http\Livewire;
use App\Models\Fooditem;

use Livewire\Component;

class Cartitems extends Component
{

    protected $listeners = ['some-event' => '$refresh'];

  public function IncrementItem($id)
  {
        $fooditems=Fooditem::findOrFail($id); 
         $cart = session()->get('cart', []);
// dd($cart);
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
        // dd($cart);
      $this->emit('increment');
      $this->emit('some-event');
  }


   public function DecrementItem( $id)
    {
         $fooditems=Fooditem::findOrFail($id); 

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
               "id" => $fooditems->id,
                "fooditem" => $fooditems->food_item,
                "quantity" => 1 ,
                "rate" => $fooditems->rate,
                
            ];
            
        }
      
        session()->put('cart', $cart);
  
       $this->emit('decrement');
       $this->emit('some-event');
    }



    public function render()
    {
        // dd(session('cart'));
        return view('livewire.cartitems');
    }
}
