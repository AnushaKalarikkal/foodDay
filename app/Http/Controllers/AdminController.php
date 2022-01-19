<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Customer;
use App\Models\Driver;
use App\Models\City;
use App\Models\Cuisine;
use App\Models\Restaurant;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //Admin user
    public function index() 
    {
        $users=User::all();
        return view('admin.index', ['users'=>$users]);
    }

    public function create(User $user)
    {
        return view('admin.create');
    }

    public function store(User $user){

        $inputs=request()->validate([

            'first_name'=>'required|min:3|max:10',

            'last_name'=>'required|max:8',

            'phone_code'=>'required|',

            'mobile'=>'required|min:10|max:12',

            'email'=>'required|email',

            'password'=>'required|min:4',

        ]);

        $user->first_name=$inputs['first_name'];

        $user->last_name=$inputs['last_name'];

        $user->phone_code=$inputs['phone_code'];

        $user->mobile=$inputs['mobile'];

        $user->email=$inputs['email'];

        $user->password=$inputs['password'];

        $user->save();

        return redirect()->route('admin.index');  

    }
    public function edit(User $user){
        return view('admin.edit',['users'=>$user]);
    }

    public function update(User $user){

        $inputs=request()->validate([

            'first_name'=>'required|min:3|max:10',

            'last_name'=>'required|max:8',

            'phone_code'=>'required|',

            'mobile'=>'required|min:10|max:12',

            'email'=>'required|email',

            'password'=>'required|min:4',

        ]);

        $user->first_name=$inputs['first_name'];

        $user->last_name=$inputs['last_name'];

        $user->phone_code=$inputs['phone_code'];

        $user->mobile=$inputs['mobile'];

        $user->email=$inputs['email'];

        $user->password=$inputs['password'];

        $user->save();

        return redirect()->route('admin.index');  

    }

    public function details(User $user){
        
        return view('admin.view',['users'=>$user]);
    }


   //Customer user 
    public function show() {

    $customers=Customer::all();
    return view('customer.show', ['customers'=>$customers]);
    
    }

    public function customer_Create(){

        return view('customer.create');
    }

    public function customer_store(Customer $customer) {

        $inputs=request()->validate([

            'first_name'=>'required|min:3|max:10',

            'last_name'=>'required|max:8',

            'phone_code'=>'required|',

            'mobile'=>'required|min:10|max:12',

            'email'=>'required|email',

            'password'=>'required|min:4',

        ]);

        $customer->first_name=$inputs['first_name'];

        $customer->last_name=$inputs['last_name'];

        $customer->phone_code=$inputs['phone_code'];

        $customer->mobile=$inputs['mobile'];

        $customer->email=$inputs['email'];

        $customer->password=$inputs['password'];

        $customer->save();

        return redirect()->route('customer.show');  


    }

    public function customer_edit(Customer $customer)
    {
        return view('customer.edit',['customer'=>$customer]);
    }

    public function customer_update(Customer $customer)
    {

        $inputs=request()->validate([

            'first_name'=>'required',

            'last_name'=>'required',

            'phone_code'=>'required|',

            'mobile'=>'required|min:10|max:12',

            'email'=>'required|email',

            'password'=>'required|min:4',

        ]);

        $customer->first_name=$inputs['first_name'];

        $customer->last_name=$inputs['last_name'];

        $customer->phone_code=$inputs['phone_code'];

        $customer->mobile=$inputs['mobile'];

        $customer->email=$inputs['email'];

        $customer->password=$inputs['password'];

        $customer->save();

        return redirect()->route('customer.show');  


    }

    public function customer_details(Customer $customer)
    {
        return view('customer.view',['customer'=>$customer]);
    }


    //Driver

    public function driver_show()
    {
        $drivers=Driver::all();
        return view('driver.show', ['drivers'=>$drivers]);
    }

    public function driver_edit(Driver $driver)
    {
        return view('driver.edit',['driver'=>$driver]);
    }
    
    public function driver_update(Driver $driver)
    {
        $inputs=request()->validate([

            'first_name'=>'required',

            'last_name'=>'required',

            'phone_code'=>'required|',

            'mobile'=>'required|min:10|max:12',

            'email'=>'required|email',

            'password'=>'required|min:4',

        ]);

        $driver->first_name=$inputs['first_name'];

        $driver->last_name=$inputs['last_name'];

        $driver->phone_code=$inputs['phone_code'];

        $driver->mobile=$inputs['mobile'];

        $driver->email=$inputs['email'];

        $driver->password=$inputs['password'];

        $driver->save();

        return redirect()->route('driver.show');  


    }

    public function driver_details(Driver $driver)
    {
        return view('driver.view',['driver'=>$driver]);
    }

    //cities

    public function city_show()
    {
        $cities=City::all();
        return view('city.show', ['cities'=>$cities]);
    }

    public function city_edit(City $cities)
    {
        return view('city.edit',['cities'=>$cities]);
    }


    public function city_create()
    {
        return view('city.create');
    }

    public function city_store(City $cities)
    {
        $inputs=request()->validate([

            'city'=>'required',

         

        ]);

        $cities->city=$inputs['city'];

        $cities->save();

        return redirect()->route('city.show');  

    }

    public function city_details(City $cities)
    {
        return view('city.view',['cities'=>$cities]);
    }

    public function city_update(City $cities)
    {
        $inputs=request()->validate([

            'city'=>'required',

        ]);

        $cities->city=$inputs['city'];

        $cities->save();

        return redirect()->route('city.show');  

    }



    //cuisine
    public function cuisine_show()
    {
        $cuisines= Cuisine::all();
        return view('cuisine.show', ['cuisines'=>$cuisines]);
    }

    public function cuisine_edit(Cuisine $cuisine)
     {
        return view('cuisine.edit', ['cuisines'=>$cuisine]);
    }


    public function cuisine_update(Cuisine $cuisine)
    {
        $inputs=request()->validate([

            'cuisine'=>'required',

        ]);

        $cuisine->cuisine=$inputs['cuisine'];

        $cuisine->save();

        return redirect()->route('cuisine.show');  

    }


    public function cuisine_details(Cuisine $cuisine)
    {
        return view('cuisine.view',['cuisine'=>$cuisine]);
    }

    public function cuisine_create()
    {
        return view('cuisine.create');
    }


    public function cuisine_store(Cuisine $cuisine)
    {
        $inputs=request()->validate([

            'cuisine'=>'required',

         

        ]);

        $cuisine->cuisine=$inputs['cuisine'];

        $cuisine->save();

        return redirect()->route('cuisine.show');  

    }

    //restaurant

    public function restaurant_create()
    {
        $cities=City::all();
        $cuisines=Cuisine::all();

        return view('restaurant.create',compact('cities','cuisines'));
    }

    public function restaurant_store(Restaurant $restaurant)
    {
        $inputs=request()->validate([

            'name'=>'required',
            'address'=>'required',
            'about'=>'required',
            'mobile'=>'required',
            'location'=>'required',
            'city'=>'required',
            'cuisine'=>'required',

            'logo'=>'required',
            'banner'=>'required',
            'min_order_value'=>'required',
            'cost_of_two_people'=>'required',
            'default_preparation_time'=>'required',
            'allow_pickup'=>'required',
            'is_open'=>'required',

        ]);

        if(request('logo')){

            $inputs['logo']=request('logo')->store('images');

        }

        if(request('banner')){

            $inputs['banner']=request('banner')->store('images');

        }


        $restaurant->name=$inputs['name'];
        
        $restaurant->address=$inputs['address'];

        $restaurant->about=$inputs['about'];

        $restaurant->mobile=$inputs['mobile'];

        $restaurant->city=$inputs['city'];

        $restaurant->location=$inputs['location'];

        $restaurant->logo=$inputs['logo'];

        $restaurant->banner=$inputs['banner'];

        $restaurant->min_order_value=$inputs['min_order_value'];

        $restaurant->cost_for_two_people=$inputs['cost_for_two_people'];

        $restaurant->default_preparation_time=$inputs['default_preparation_time'];

        $restaurant->cuisine=$inputs['cuisine'];

        
        if ($restaurant->has('is_open')) {
            $inputs['is_open'] = 1;
        } else {
            $inputs['is_open'] = 0;
        }

        if ($restaurant->has('allow_pickup')) {
            $inputs['allow_pickup'] = 1;
        } else {
            $inputs['allow_pickup'] = 0;
        }


        
        $restaurant->save();

        return redirect()->route('restaurant.create');  

    }

    public function restaurant_show()
    {
        $restaurants= Restaurant::all();
        return view('restaurant.show', ['restaurants'=>$restaurants]);
    }

}
