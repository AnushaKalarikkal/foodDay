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
use App\Models\Restaurantuser;
use App\Models\Permission;
use App\Models\Role;



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


   //Customer user .............................................................
    public function show() {

    $customers=Customer::all();
    return view('admin.customer.show', ['customers'=>$customers]);
    
    }

    public function customer_Create(){

        return view('admin.customer.create');
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

        return redirect()->route('admin.customer.show');  


    }

    public function customer_edit(Customer $customer)
    {
        return view('admin.customer.edit',['customer'=>$customer]);
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

        return redirect()->route('admin.customer.show');  


    }

    public function customer_details(Customer $customer)
    {
        return view('admin.customer.view',['customer'=>$customer]);
    }

    //Restaurant User

     public function restUser_show()
      {

            $restuser=Restaurantuser::all();
            return view('restUser.show', ['restaurantusers'=>$restuser]);
    
      }

    public function restUser_create(Restaurantuser $restaurantuser)
    {
        $restaurants= Restaurant::all();

        return view('restUser.create',compact('restaurants', $restaurantuser));
    }



    //Driver

    public function driver_show()
    {
        $drivers=Driver::all();
        return view('admin.driver.show', ['drivers'=>$drivers]);
    }

    public function driver_edit(Driver $driver)
    {
        return view('admin.driver.edit',['driver'=>$driver]);
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

        return redirect()->route('admin.driver.show');  


    }

    public function driver_details(Driver $driver)
    {
        return view('admin.driver.view',['driver'=>$driver]);
    }

    //cities

    public function city_show()
    {
        $cities=City::all();
        return view('admin.city.show', ['cities'=>$cities]);
    }

    public function city_edit(City $cities)
    {
        return view('admin.city.edit',['cities'=>$cities]);
    }


    public function city_create()
    {
        return view('admin.city.create');
    }

    public function city_store(City $cities)
    {
        $inputs=request()->validate([

            'city'=>'required',

         

        ]);

        $cities->city=$inputs['city'];

        $cities->save();

        return redirect()->route('admin.city.show');  

    }

    public function city_details(City $cities)
    {
        return view('admin.city.view',['cities'=>$cities]);
    }

    public function city_update(City $cities)
    {
        $inputs=request()->validate([

            'city'=>'required',

        ]);

        $cities->city=$inputs['city'];

        $cities->save();

        return redirect()->route('admin.city.show');  

    }



    //cuisine
    public function cuisine_show()
    {
        $cuisines= Cuisine::all();
        return view('admin.cuisine.show', ['cuisines'=>$cuisines]);
    }

    public function cuisine_edit(Cuisine $cuisine)
     {
        return view('admin.cuisine.edit', ['cuisines'=>$cuisine]);
    }


    public function cuisine_update(Cuisine $cuisine)
    {
        $inputs=request()->validate([

            'cuisine'=>'required',

        ]);

        $cuisine->cuisine=$inputs['cuisine'];

        $cuisine->save();

        return redirect()->route('admin.cuisine.show');  

    }


    public function cuisine_details(Cuisine $cuisine)
    {
        return view('admin.cuisine.view',['cuisine'=>$cuisine]);
    }

    public function cuisine_create()
    {
        return view('admin.cuisine.create');
    }


    public function cuisine_store(Cuisine $cuisine)
    {
        $inputs=request()->validate([

            'cuisine'=>'required',

         

        ]);

        $cuisine->cuisine=$inputs['cuisine'];

        $cuisine->save();

        return redirect()->route('admin.cuisine.show');  

    }

    //restaurant

    public function restaurant_create()
    {
        $cities=City::all();
        $cuisines=Cuisine::all();

        return view('admin.restaurant.create',compact('cities','cuisines'));
    }

    public function restaurant_store(Request $request)
    {
        $inputs=request()->validate([

            'name'=>'required',
            'address'=>'required',
            'about'=>'required',
            'mobile'=>'required',
            'location'=>'required',
            'city_id'=>'required',
            'cuisine_id'=>'required',
        
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

         $restaurants=Restaurant:: create($inputs);

        if ($request->has('cuisine_id'))

        {
        $restaurants->cuisines()->attach($request->input('cuisine_id'));

        }
  
        return redirect()->route('admin.restaurant.show');  

    }


    public function restaurant_show()
    {
        $cities=City::all();
        
        $restaurants= Restaurant::all();
        return view('admin.restaurant.show', ['restaurants'=>$restaurants]);
    }
    
    public function restaurant_edit(Restaurant $restaurant)
    {


            $cities=City::all();
            $cuisines=Cuisine::all();
            
            
            return view('admin.restaurant.edit',['restaurants'=>$restaurant],compact('cities','cuisines'));   
    }

    public function restaurant_details(Restaurant $restaurant)
    {
        $cuisines=Cuisine::all();
             return view('admin.restaurant.view',['restaurant'=>$restaurant],compact('cuisines'));
    }


    public function restaurant_update(Restaurant $restaurant, Request $request)
    {
        $inputs=request()->validate([

            'name'=>'required',
            'address'=>'required',
            'about'=>'required',
            'mobile'=>'required',
            'location'=>'required',
            'city_id'=>'required',
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

        $restaurant->city_id=$inputs['city_id'];


        $restaurant->location=$inputs['location'];

        $restaurant->min_order_value=$inputs['min_order_value'];

        $restaurant->cost_for_two_people=$inputs['cost_for_two_people'];

        $restaurant->default_preparation_time=$inputs['default_preparation_time'];


        $restaurant->is_open=$inputs['is_open'];

        $restaurant->allow_pickup=$inputs['allow_pickup'];
        
        $restaurant->status=$inputs['status'];

  
        
        $restaurant->save();

         if ($request->has('cuisine_id'))
            {
               $restaurant->cuisines()->sync($request->input('cuisine_id'));
            }
          

        session()->flash('cuisine-created-message', 'cuisine was created ');
  



        return redirect()->route('admin.restaurant.show');  

    }


//discount

public function discount_create()
{
    $restaurants=Restaurant::all();
    return view('admin.discount.create', compact('restaurants'));

}

public function discount_store(Request $request){

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
            

        ]);


        $discounts=Discount:: create($inputs);

        if ($request->has('restaurant_id'))

        {

        $discounts->restaurants()->attach($request->input('restaurant_id'));

        }
  
        return redirect()->route('admin.discount.show');  

}


public function discount_show()
{
    
    
    $discount= Discount::all();
    return view('admin.discount.show', ['discounts'=>$discount]);
}

public function discount_edit(Discount $discount)
{
     $restaurant=Restaurant::all();
    return view('admin.discount.edit',['discounts'=>$discount], compact('restaurant'));
}


public function discount_update(Discount $discount,Request $request){

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

          $discount->save();

        if ($request->has('restaurant_id'))

        {

        $discount->restaurants()->sync($request->input('restaurant_id'));

        }



        return redirect()->route('admin.discount.show');  
}


public function discount_details(Discount $discount)
    {
        $restaurants=Restaurant::all();
    return view('admin.discount.view',['discount'=>$discount],compact('restaurants'));
    }

    public function discountDelete($id)
    {
        $discount=Discount::find($id);
        $discount->delete();
         return back();
    }


    //Orders

    public function order_show(Request $request)
    {
        $order=Order::all();
        $order = Order::when(
            $request->input('id'),
            function ($query) use ($request) {
                $query->where('id', 'like', '%'.$request->input('id').'%');
            }
        ) ->orderBy('created_at', 'desc')->paginate(5);
        
        $request->flash();
        return view('admin.order.show', ['orders'=>$order]);
    }

    public function order_details(Order $order)
    {
         return view('admin.order.view',['order'=>$order]);
    }

    public function order_edit(Order $order)
    {
    
        return view('admin.order.edit',['orders'=>$order]);
    }


        public function order_update(Order $order)
    {
        $inputs=request()->validate([

            'payment_status'=>'required',
            'order_status'=>'required'

        ]);

        $order->payment_status=$inputs['payment_status'];

        $order->order_status=$inputs['order_status'];


        $order->save();

        return redirect()->route('admin.order.show');  

    }

    //roles............................................................................

     public function role_show()
    {
        $roles=Role::all();

        return view('admin.role.show', ['roles'=>$roles]);
    }

    public function role_create()
 {
    $permissions=Permission::all();

    return view('admin.role.create', compact('permissions'));

 }


public function role_store(Request $request)
{

      $inputs = request()->validate([

            'name'=>['required']
            ]);




        $roles=Role:: create($inputs);
            if ($request->has('permission_id'))
            {
               $roles->permissions()->attach($request->input('permission_id'));
            }

        session()->flash('role-created-message', 'Role was created ');
  
        return redirect()->route('admin.role.show');  


    }

    public function role_details(Role $role)
    {
                $permissions=Permission::all();

         return view('admin.role.view',['role'=>$role],compact('permissions'));
    }

     public function role_edit(Role $role)
    {
        $permissions=Permission::all();
        return view('admin.role.edit',['roles'=>$role],compact('permissions'));
    }



public function role_update(Request $request,Role $role)
{

      $input = request()->validate([

            'name'=>['required'],
            'guard_name'=>['required']

            ]);

            $role->name=$input['name'];
            $role->guard_name=$input['guard_name'];

            $role->save();


             if ($request->has('permission_id'))
            {
               $role->permissions()->sync($request->input('permission_id'));
            }

            session()->flash('role-created-message', 'Role was created ');
    
            return redirect()->route('admin.role.show');  


    }
       public function roleDelete($id)
    {
        $role=Role::find($id);

        $role->delete();

         return back();
    }



//permission...........................................................................

  public function permission_show()
    {
        $permission=Permission::all();
        $role=Role::all();

        return view('admin.permission.show', ['permissions'=>$permission],compact('role'));
    }

    public function permission_create()
    {
        $roles=Role::all();
        
         return view('admin.permission.create', compact('roles'));

    }



public function permission_store(Request $request)
{

           $inputs=request()->validate([

            'name'=>'required|min:3',

        ],[

            'name.required' => 'Name is required'

          

        ]);

        $permissions=Permission:: create($inputs);

        if ($request->has('role_id'))

        {

        $permissions->roles()->attach($request->input('role_id'));

        }
  
        return redirect()->route('admin.permission.show');  


    }

     public function permission_edit(Permission $permission)
    {
        $roles=Role::all();

        return view('admin.permission.edit',['permissions'=>$permission],compact('roles'));
    }






public function permission_update(Request $request, Permission $permission)
{
    $inputs=request()->validate([
             'name'=>['required'],
             'guard_name'=>['required']

          

        ]);


            $permission->name=$inputs['name'];
            $permission->guard_name=$inputs['guard_name'];

            $permission->save();


   

    if ($request->has('role_id')) {

        $permission->roles()->sync($request->input('role_id'));
    }
  
    return redirect()->route('admin.permission.show');
    
   }

    public function permission_details(Permission $permission)
    {
        $roles=Role::all();

         return view('admin.permission.view',['permission'=>$permission],compact('roles'));
    }

      public function permissionDelete($id)
    {
        $permission=Permission::find($id);

        $permission->delete();

         return back();
    }


}

