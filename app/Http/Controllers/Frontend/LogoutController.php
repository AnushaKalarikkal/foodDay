<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LogoutController extends Controller
{
    
      public function perform()
    {
        Session::flush();
        
        Auth::logout();

        return redirect('/front');
    }
}
