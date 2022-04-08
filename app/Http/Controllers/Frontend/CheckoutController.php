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
           $ad=$request->session()->get('address');
// dd($ad);
         
        //  $store= session()->get('store', []);

        //  if (!isset($store[$id])) {

        //      $store[$id]= [
        //      "id"=>$address->id,
        //     "location"=> $address->location,
        //     "home"=>$address->home,
            
        //  ];

        //      session()->put('store', $store);
            
        //  }
         
         return redirect()->back();
     }

      public function order_store(Order $order, Request $request)
     {
        $inputs=request()->validate([

            'order_type'=>'required',
        ]);

        $ad=$request->session()->get('address');
        $cart = session()->get('cart', []);
        $rest = session()->get('restaurant');
// dd($ad);
        
         

         $restaurant_id = $rest['id'];
         $address_id=0;
         $address_id = isset($ad['address']) ? $ad['address'] : 0;
        //  foreach($rest as $restaurant)
        //  {
        //     $restaurant_id =  $restaurant['id'];
        //  }

        //dd($restaurant_id);

        // $address_id = null ;
        // foreach($store as $storeitem){

        //     $address_id =  $storeitem['id'];
        // }

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
       
      //dd($request->all() , session()->get('store'),session()->get('cart'));
        
         return redirect('/customer/order_placed');
     }

     
    public function order_placed(Request $request)
     {
          $request->session()->forget('rest');
         return view('front.orderplaced');
     }

     public function order_summary(Order $order, Request $request)
     {
         //dd($order);
          //$request->session()->forget('store');
        $cartsession= session()->get('cartsession', []);

         // dd($cartsession);
         return view('front.order_summary',['order'=>$order]);
        

     }

}
