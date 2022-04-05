<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Address;


class AddressController extends Controller
{
    public function address(Address $address)
    {
        $address=Address::all();
        return view('front.address.manage_address',['address'=>$address]);
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
        $address->landmark = $request->landmark;
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

     public function address_update(Request $request, $id)
    {
        $request->validate([

            'location'=>'required',

            'house_name'=>'required',

            'area'=>'required',

            'city'=>'required',

            'pincode'=>'required',

        ]);

        $address=Address::find($id);
        $address->location = $request->location;
        $address->house_name = $request->house_name;
        $address->area = $request->area;
        $address->city = $request->city;
        $address->landmark = $request->landmark;
        $address->pincode = $request->pincode;
        $address->home = $request->home;
      

        $save= $address->save();

        if ($save) {
            return back()->with('success', 'address updated successfully');
        } else {
            return back()->with('fail', 'something went wrong');
        }
    }

     public function AddressDelete($id)
    {
        $address=Address::find($id);
        $address->delete();
         return back();
    }
//   public function edit_address($id)
//   {
//       $address=Address::find($id);
//       return response()->json([
//           'status'=>200,
//           'address'=>$address,
//       ]);

//   }
    

}
