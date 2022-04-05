<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Restaurant;
use App\Models\Cuisine;
use App\Models\Fooditem;
use App\Models\Order;

use App\Models\Address;

use App\Rules\MatchOldPassword;


use DB;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;
class MyAccountController extends Controller
{

//account details    
    public function account_details(Customer $customer)
    {
        $customer=Auth::user();
         //dd( $customer);
        // echo $data;
        return view('front.mydetails',['customer'=>$customer] );
    }

    public function save_changes(Request $request, $id)
    {
       $customer = Customer::findOrFail($id);
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->mobile = $request->mobile;
        $customer->email = $request->email;
       
        $save= $customer->save();

        if ($save) {
            return back()->with('success', 'save changes successfully');
        } else {
            return back()->with('fail', 'something went wrong');
        }
    }
//logout

    public function logout(Request $request)
    {
       Auth::guard('customer')->logout();
        $request->session()->forget('cart');
        $request->session()->forget('store');
        


       return redirect('/front');
    }

 //change password
    
    public function change_password()
    {
        return view('front.change_password');
    }

    public function change_password_post(Request $request)
    {
        $request->validate([

                'password'=>['required', new MatchOldPassword()],

                'new_password'=>'required|min:6|max:100',

                'confirm_password'=>'required|same:new_password'

                ]);

      
         Customer::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
       

        return back()->with('success', 'save changes successfully');
    }

    //restaurant_listing

    public function restaurant_list(Restaurant $restaurant)
    {
        $restaurant=Restaurant::all();
        $cuisines=Cuisine::all();

        return view('front.restaurant', ['restaurant'=>$restaurant], compact('cuisines'));
    }

    public function search(Request $request)
    {
        $name=$request->name;

        $data=Restaurant::where('location', 'like', '%' .$name. '%')
        ->get();
        $cuisines=Cuisine::all();


        return view('front.restaurant', ['restaurant'=>$data], compact('cuisines'));
    }

    //restaurant_details

    public function restaurant_details($id)
    {
        $fooditems=Fooditem::all();
        $cuisines=Cuisine::all();
        $restaurant=Restaurant::FindOrFail($id);
 
        $rest = session()->get('rest', []);
         if (isset($rest[$id])) {
             unset($rest[$id]);

         }else{

             $rest[$id]= [
             "id"=>$restaurant->id,
            "name"=> $restaurant->name,
            "mobile"=> $restaurant->mobile,
            "location"=> $restaurant->location,


         ];

             session()->put('rest', $rest);
         }
          //dd($rest);
        return view('front.restaurant_details', ['restaurant'=>$restaurant], compact('cuisines','fooditems'));
    }

    //order History

     public function order_history(Order $order )
    {
       $order=Order::all();
       
       $fooditems=Fooditem::all();

        return view('front.order_history', ['order'=>$order],compact('fooditems'));
    }
}  

