<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Restaurant;
use App\Models\Cuisine;


use DB;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;
class MyAccountController extends Controller
{

//account details    
    public function account_details()
    {
        $data=['LoggedUserInfo'=>Customer::where('id', '=', session('LoggedUser'))->first()];
        return view('front.mydetails', $data);
    }

    public function save_changes(Request $request, $id)
    {
        $customer=Customer::find($id);
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

    public function logout()
    {
        if (session()->has('LoggedUser')) {
            session()->pull('LoggedUser');
            return redirect('/sign_in');
        }
    }

 //change password
    
    public function change_password()
    {
        return view('front.change_password');
    }

    public function change_password_post(Request $request)
    {
        $request->validate([

                'password'=>'required|min:6|max:100',

                'new_password'=>'required|min:6|max:100',

                'confirm_password'=>'required|same:new_password'

                ]);

        $current_user= Auth::customers();
        dd($current_user);


        if (Hash::check($request->current_password, $current_user->password)) {
            $current_user->update([

                'password'=>bcrypt($request->new_password)

                ]);



            return redirect()->back()->with('success', 'Password successfully updated.');
        } else {
            return redirect()->back()->with('error', 'Old password does not matched.');
        }
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

    public function restaurant_details(Restaurant $restaurant )
    {
        $cuisines=Cuisine::all();
        return view('front.restaurant_details', ['restaurant'=>$restaurant], compact('cuisines'));
    }
}  

