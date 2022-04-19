<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Fooditem;
use App\Models\Address;
use App\Models\Restaurant;
use App\Models\Order;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    //

     public function checkout(Restaurant $restaurant,Request $request)
     {
          $cartsession = session()->get('cartsession', []);
        //   $request->session()->forget('store');

           $rest=$request->session()->get('restaurant');
          //dd($rest);
         $restaurant=Restaurant::all();
         $address=Address::all();
         if (session('cart')) {
             return view('front.checkout', ['address'=>$address], compact('restaurant'));
         }else{
             return view('front.my_home');
         }
     }

     public function address_store($id, Request $request)
     {
         $address=Address::FindOrFail($id);

           $request->session()->put(['address'=> ['id'=>$id,'location'=>$address->location,'home'=> $address->home]]);
           $store=$request->session()->get('address');
dd($store);
         
    
         
         return redirect()->back();
     }

      public function order_store(Order $order,Request $request)
     {
        //dd($order);
        $inputs=request()->validate([

            'order_type'=>'required',
        ]);

        $store=session()->get('address');
        $cart = session()->get('cart', []);
        $rest = session()->get('restaurant');
// dd($store);
        
         

         $restaurant_id = $rest['id'];

         $address_id=0;
         $address_id =isset($store['id']) ? $store['id'] : 0;
      // dd($address_id);

        $total=0 ;
        foreach($cart as $cartitem)
        {
            
              $total +=  ($cartitem['rate'] * $cartitem['quantity'] );
        }

       
        $customer=Auth::user()->id;
        $order->order_type=$inputs['order_type'];
        $order->sub_total= $total;
        $order->address_id = $address_id ;
        $order->restaurant_id = $restaurant_id ;
        $order->customer_id = $customer ;
        $order->save();

        //pivot table entry
            $cartid=array();
         foreach($cart as $cartitems)
        {
             array_push($cartid,$cartitems);
            $Fid= $cartitems['id'];
            $quantity= $cartitems['quantity'];
            $fooditem= $cartitems['fooditem'];
           $order->fooditems()->attach($Fid, ['quantity' => $quantity,'food_item' => $fooditem]);
        
        }

         $request->session()->forget('cart');
         //$request->session()->forget('store');


               
         return view('front.orderplaced',['Order' => $order],compact('order'));
     }

     
    // public function order_placed(Request $request)
    //  {
    //       $request->session()->forget('rest');
    //      return view('front.orderplaced');
    //  }

     public function order_summary(Order $order, Request $request)
     {
         
        $cartsession= session()->get('cartsession', []);
        $request->session()->forget('address');


         // dd($cartsession);
         return view('front.order_summary',['Order'=>$order],compact('order'));
        

     }

}
