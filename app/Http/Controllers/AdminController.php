<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Customer;
use App\Models\Driver;
use App\Models\City;
use App\Models\Cuisine;
use App\Models\Restaurant;
use App\Models\Discount;
use App\Models\Order;


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

    public function restaurant_store()
    {
        $inputs=request()->validate([

            'name'=>'required',
            'address'=>'required',
            'about'=>'required',
            'mobile'=>'required',
            'location'=>'required',
            'city'=>'required',
            'cuisine'=>'required',
            'status'=>'required',

            'logo'=>'required',
            'banner'=>'required',
            'min_order_value'=>'required',
            'cost_for_two_people'=>'required',
            'default_preparation_time'=>'required',
            'is_open'=>['sometimes', 'in:1,0'],
            'allow_pickup'=>['sometimes', 'in:1,0']

        ]);

       
        if(request('logo')){
            $inputs['logo'] = request('logo')->store('images', 'public');
            }
        

         if(request('banner')){
                $inputs['banner'] = request('banner')->store('images', 'public');

                }

        if (request()->has('is_open')) {
            $inputs['is_open'] = 1;
        } else {
            $inputs['is_open'] = 0;
        }

        if (request()->has('allow_pickup')) {
            $inputs['allow_pickup'] = 1;
        } else {
            $inputs['allow_pickup'] = 0;
        }

        $restaurant = new Restaurant;

        $restaurant->name=$inputs['name'];
        
        $restaurant->address=$inputs['address'];

        $restaurant->about=$inputs['about'];

        $restaurant->mobile=$inputs['mobile'];

        $restaurant->city_id=$inputs['city'];

        $restaurant->logo=$inputs['logo'];

        $restaurant->banner=$inputs['banner'];

        $restaurant->location=$inputs['location'];

        $restaurant->min_order_value=$inputs['min_order_value'];

        $restaurant->cost_for_two_people=$inputs['cost_for_two_people'];

        $restaurant->default_preparation_time=$inputs['default_preparation_time'];

        $restaurant->cuisine_id=$inputs['cuisine'];

        $restaurant->is_open=$inputs['is_open'];

        $restaurant->allow_pickup=$inputs['allow_pickup'];
        
        $restaurant->status=$inputs['status'];

  
        
        $restaurant->save();

        return redirect()->route('restaurant.show');  

    }


    public function restaurant_show()
    {
        $cities=City::all();
        
        $restaurants= Restaurant::all();
        return view('restaurant.show', ['restaurants'=>$restaurants]);
    }
    
    public function restaurant_edit(Restaurant $restaurant)
    {


            $cities=City::all();
            $cuisines=Cuisine::all();
            
            
            return view('restaurant.edit',['restaurants'=>$restaurant],compact('cities','cuisines'));   
    }

    public function restaurant_details(Restaurant $restaurant)
    {
             return view('restaurant.view',['restaurant'=>$restaurant]);
    }


    public function restaurant_update(Restaurant $restaurant)
    {
        $inputs=request()->validate([

            'name'=>'required',
            'address'=>'required',
            'about'=>'required',
            'mobile'=>'required',
            'location'=>'required',
            'city'=>'required',
            'cuisine'=>'required',
            'status'=>'required',

            'logo'=>['image', 'mimes:jpeg,png,jpg', 'max:2048'],
            'banner'=>['image', 'mimes:jpeg,png,jpg', 'max:2048'],
            'min_order_value'=>'required',
            'cost_for_two_people'=>'required',
            'default_preparation_time'=>'required',
            'is_open'=>['sometimes', 'in:1,0'],
            'allow_pickup'=>['sometimes', 'in:1,0']

        ]);

       
        if(request()->has('logo')) {
            $inputs['logo'] = request()->file('logo')->store('images', 'public');
            }

        if (request()->has('banner')) {
             $inputs['banner'] = request()->file('banner')->store('images', 'public');
              }

        if (request()->has('is_open')) {
            $inputs['is_open'] = 1;
        } else {
            $inputs['is_open'] = 0;
        }

        if (request()->has('allow_pickup')) {
            $inputs['allow_pickup'] = 1;
        } else {
            $inputs['allow_pickup'] = 0;
        }

       

        $restaurant->name=$inputs['name'];
        
        $restaurant->address=$inputs['address'];

        $restaurant->about=$inputs['about'];

        $restaurant->mobile=$inputs['mobile'];

        $restaurant->city_id=$inputs['city'];

        $restaurant->logo=$inputs['logo'];

        $restaurant->banner=$inputs['banner'];

        $restaurant->location=$inputs['location'];

        $restaurant->min_order_value=$inputs['min_order_value'];

        $restaurant->cost_for_two_people=$inputs['cost_for_two_people'];

        $restaurant->default_preparation_time=$inputs['default_preparation_time'];

        $restaurant->cuisine_id=$inputs['cuisine'];

        $restaurant->is_open=$inputs['is_open'];

        $restaurant->allow_pickup=$inputs['allow_pickup'];
        
        $restaurant->status=$inputs['status'];

  
        
        $restaurant->save();

        return redirect()->route('restaurant.show');  

    }


//discount

public function discount_create()
{
    $restaurant=Restaurant::all();
    return view('discount.create',['restaurants'=>$restaurant]);
}

public function discount_store(Discount $discount){

            $inputs=request()->validate([

            'name'=>'required',
            'code'=>'required',
            'discount_type'=>'required',
            'amount'=>'required',
            'min_amount'=>'required',
            'start'=>'required',
            'end'=>'required',
            'max_uses'=>'required',
            'max_uses_per_cus'=>'required',
            'restaurant'=>'required'

        ]);

         $discount->name=$inputs['name'];
        
        $discount->code=$inputs['code'];

        $discount->discount_type=$inputs['discount_type'];

        $discount->amount=$inputs['amount'];

        $discount->min_amount=$inputs['min_amount'];

        $discount->start=$inputs['start'];

        $discount->end=$inputs['end'];

        $discount->max_uses=$inputs['max_uses'];

        $discount->max_uses_per_cus=$inputs['max_uses_per_cus'];

        $discount->restaurant=$inputs['restaurant'];

          $discount->save();

        return redirect()->route('discount.show');  


}


public function discount_show()
{
    
    
    $discounts= Discount::all();
    return view('discount.show', ['discounts'=>$discounts]);
}

public function discount_edit(Discount $discount)
{
    // $restaurant=Restaurant::all();
    return view('discount.edit',['discounts'=>$discount]);
}


public function discount_details(Discount $discount)
    {
    return view('discount.view',['discount'=>$discount]);
    }

    public function discountDelete($id)
    {
        $discount=Discount::find($id);
        $discount->delete();
         return redirect('/discount_show');
    }


    //Orders

    public function order_show()
    {
        $orders= Order::all();
        $restaurant=Restaurant::all();
        $customer=Customer::all();

        return view('order.show', ['orders'=>$orders]);
    }

    public function order_details(Order $order)
    {
         return view('order.view',['order'=>$order]);
    }

}

