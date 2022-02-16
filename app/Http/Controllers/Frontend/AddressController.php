<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Address;


class AddressController extends Controller
{
    public function address()
    {
        return view('front.address.manage_address');
    }

    public function address_store(Request $request)
    {
        $request->validate([

            'location'=>'required',

            'house_name'=>'required',

            'area'=>'required',

            'city'=>'required',

            'pincode'=>'required',

        ]);

        $address= new Address;
        $address->location = $request->location;
        $address->house_name = $request->house_name;
        $address->area = $request->area;
        $address->city = $request->city;
        $address->landmark = $request->location;
        $address->pincode = $request->pincode;
        $address->home = $request->home;
        $address->note = $request->note;

        $save= $address->save();

        if ($save) {
            return back()->with('success', 'new address added successfully');
        } else {
            return back()->with('fail', 'something went wrong');
        }
    }
    

}
