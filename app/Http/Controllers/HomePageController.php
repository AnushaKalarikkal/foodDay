<?php

namespace App\Http\Controllers;
use App\Models\Customer;

use Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomePageController extends Controller
{
    public function index()
    {
        return view('front.index');
    }

    public function login()
    {
        return view('front.sign-in');
    }

      public function register()
      {
        return view('front.sign-up');
    }

    public function store(Request $request)
    {
         $request->validate([

            'first_name'=>'required',

            'last_name'=>'required',

            'mobile'=>'required',

            'email'=>'required|email',

            'password'=>'required|min:4',

        ]);

        $customer= new Customer;
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->mobile = $request->mobile;
        $customer->email = $request->email;
        $customer->password = Hash::make($request->password);
        $save= $customer->save();

        if($save){
            return back()->with('success','new customer added successfully');
        }else{
            return back()->with('fail','something went wrong');

        }

        // return redirect('/sign_in');
    }

    public function sign_in_fun(Request $request)
    {
         $request->validate([

            'email'=>'required|email',

            'password'=>'required|min:4',

        ]);



   $userInfo = Customer::where('email','=', $request->email)->first();

        if(!$userInfo){
            return back()->with('fail','We do not recognize your email address');
        }else{
            //check password
            if(Hash::check($request->password, $userInfo->password)){
                $request->session()->put('LoggedUser', $userInfo->id);
                return redirect('/my_home');

            }else{
                return back()->with('fail','Incorrect password');
            }
        }

    }
     public function forget_password()
    {
         return view('front.forget_password');

    }

    public function my_home()
    {
        return view('front.my_home');
    }

    // public function my_account()
    // {
    //     return view('front.components.myaccount-master');
    // }

   

    public function account_details()
    {
        $data=['LoggedUserInfo'=>Customer::where('id','=',session('LoggedUser'))->first()];
        return view('front.mydetails',$data);
    }
  

}
