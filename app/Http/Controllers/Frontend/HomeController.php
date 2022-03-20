<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Customer;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    //
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

        $creds = $request->only('email','password');
    
        if( Auth::guard('customer')->attempt($creds) ){
            return redirect()->route('customer.my_home');
        }else{
           return redirect()->route('customer.signIn')->with('fail','Incorrect credentials'); 
        }


    }
    

     public function my_home()
    {
        return view('front.my_home');
    }

    
//     protected function redirectTo()
// {
//         if (Auth::customer())
//         {
//             return 'my_home';  // admin dashboard path
//         } else {
//             return 'sign_in';  // member dashboard path
//         }
// }

}
