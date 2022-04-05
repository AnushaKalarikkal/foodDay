<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CartButton extends Component
{

    protected $listeners = ['some-event' => '$refresh'];
    
    public function render()
    {
        $cart = session()->get('cart', []);
        return view('livewire.cart-button');
    }
}
