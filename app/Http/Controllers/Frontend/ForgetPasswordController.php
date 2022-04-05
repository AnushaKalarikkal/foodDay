<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB; 
use Carbon\Carbon; 
use App\Models\Customer; 
use Mail; 
use Hash;
use Illuminate\Support\Str;

class ForgetPasswordController extends Controller
{
    //
    public function forget_password()
    {
        return view('front.password.forget_password');
    }
    
    
    public function sendResetLink(Request $request)
    {
        $request->validate([
              'email' => 'required|email|exists:customers',
          ]);
   
        $token = \Str::random(64);
   
        \DB::table('password_resets')->insert([
              'email' => $request->email,
              'token' => $token,
              'created_at' => Carbon::now(),
            ]);

        $action_link= route('customer.reset.password.form', ['token'=>$token,'email'=>$request->email]);
        $body= " we are received a request to reset the password for <b> account associated with ".$request->email.
             ". You can reset your password by click the link below";

        \Mail::send('front.password.email_forget', ['action_link'=>$action_link,'body'=>$body], function ($message) use ($request) {
            $message->from('anushageethak@gmail.com', 'Name');
            $message->to($request->email, 'name')
                         ->subject('Reset password');
        });
   

   
        return back()->with('message', 'We have e-mailed your password reset link!');
    }

    public function showResetForm(Request $request, $token = null)
    {
        return view('front.password.reset')->with(['token'=>$token,'email'=>$request->email]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email'=>'required|email|exists:customers,email',
            'password'=>'required|min:5|confirmed',
            'password_confirmation'=>'required',
        ]);

        $check_token = \DB::table('password_resets')->where([
            'email'=>$request->email,
            'token'=>$request->token
        ])->first();

        if (!$check_token) {
            return back()->withInput()->with('fail', 'Invalid token');
        } else {
            Customer::where('email', $request->email)->update([
                'password'=>\Hash::make($request->password)
            ]);

            \DB::table('password_resets')->where([
                'email'=>$request->email
            ])->delete();

            return redirect()->route('customer.signIn')->with('info', 'Your password has been changed! You can login with new password')->with('verifiedEmail', $request->email);
        }
    }
}
