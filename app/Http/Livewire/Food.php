<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;

use App\Models\Fooditem;
use App\Models\Restaurant;
use Session;

class Food extends Component
{
    public $fooditems;
    public $restaurant; 
    public $quantity; 
 
    protected $listeners = ['some-event' => '$refresh'];
    
    public function mount($restaurant)
    {
       $this->fooditems= Fooditem::all();
       $this->restaurant=$restaurant->fooditems;

    }
  
   
     public function addToCart($id)
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
        
       // dd($cart);

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
      $this->emit('increment');
      $this->emit('some-event');
    }
    

    public function decrementItem(Request $request, $id)
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
               "id" => $fooditems->id,
                "fooditem" => $fooditems->food_item,
                "quantity" => 1,
                "rate" => $fooditems->rate,
                
            ];
            
        }
      
        session()->put('cart', $cart);
  
       $this->emit('decrement');
       $this->emit('some-event');
    }

    public function itemQuantity($id)
    {
     $cart = session()->get('cart', []);
     if(isset($cart[$id]['quantity']))
     {
         $item=$cart[$id]['quantity'];
          return $item;
     }
     else {
       return 0;
     }

    }

   

      public function render()
    {  
     
      return view('livewire.food');
    }

}
