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
}
