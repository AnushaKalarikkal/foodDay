<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;

use Auth;

use Illuminate\Support\Facades\Hash;
class MyAccountController extends Controller
{
      public function account_details()
    {
        $data=['LoggedUserInfo'=>Customer::where('id','=',session('LoggedUser'))->first()];
        return view('front.mydetails',$data);
    }

    public function save_changes(Request $request, $id)
    {
       
        $customer=Customer::find($id);
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->mobile = $request->mobile;
        $customer->email = $request->email;
       
        $save= $customer->save();

        if($save){
            return back()->with('success','save changes successfully');
        }else{
            return back()->with('fail','something went wrong');

        }
    }

      function logout()
      {
          if (session()->has('LoggedUser')) {
              session()->pull('LoggedUser');
              return redirect('/sign_in');
          }
      }

      public function change_password()
      {
          return view('front.change_password');
      }

      public function change_password_post(Request $request, $id)
      {
          
     
        $this->validate($request, [ 
                        'current_password'=>'required|min:6|max:100',
                        'password'=>'required|min:6|max:100',
                        'confirm_password'=>'required|same:password'
        ]);
 
        $hashedPassword = Auth::users()->password;
        if (\Hash::check($request->current_password , $hashedPassword)) {
            if (\Hash::check($request->password , $hashedPassword)) {
 
                $users = Customer::find(Auth::users()->id);
                $users->password = bcrypt($request->password);
                $users->save();
                session()->flash('message','password updated successfully');
                return redirect()->back();
            }
            else{
                session()->flash('message','new password can not be the old password!');
                return redirect()->back();
            } 
        }
        else{
            session()->flash('message','old password doesnt matched');
            return redirect()->back();
        }
    }
    
}
