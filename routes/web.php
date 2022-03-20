<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\MyAccountController;
use App\Http\Controllers\Frontend\AddressController;
use App\Http\Controllers\Frontend\ForgetPasswordController;
use App\Http\Controllers\Frontend\CartController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

Route::get('/', function() {
   return redirect('login');
});

Route::group(['middleware' => ['auth']], function() {
   /**
   * Logout Route
   */
   Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

   Route::get('/logout', [App\Http\Controllers\HomeController::class, 'perform'])->name('logout.perform');
});



Route::name('admin.')->middleware('auth')->prefix('admin')->group(function (){

    
         Route::get('/show', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');
         
         Route::get('user/view', [App\Http\Controllers\AdminController::class, 'index'])->name('index');
         Route::post('user/store', [App\Http\Controllers\AdminController::class, 'store'])->name('store');
         Route::get('user/create', [App\Http\Controllers\AdminController::class, 'create'])->name('create');
         Route::get('user/{user}/details', [App\Http\Controllers\AdminController::class, 'details'])->name('view');
         Route::get('user/{user}/edit',[App\Http\Controllers\AdminController::class, 'edit'])->name('edit');
         Route::patch('user/{user}/update',[App\Http\Controllers\AdminController::class, 'update'])->name('update');


         Route::get('customer/show', [App\Http\Controllers\AdminController::class, 'show'])->name('customer.show');
         Route::get('customer/create',[App\Http\Controllers\AdminController::class, 'customer_Create'])->name('customer.create');
         Route::post('customer/store',[App\Http\Controllers\AdminController::class, 'customer_store'])->name('customer.store');
         Route::get('customer/{customer}/edit',[App\Http\Controllers\AdminController::class, 'customer_edit'])->name('customer.edit');
         Route::patch('customer/{customer}/update',[App\Http\Controllers\AdminController::class, 'customer_update'])->name('customer.update');
         Route::get('customer/{customer}/details', [App\Http\Controllers\AdminController::class, 'customer_details'])->name('customer.view');


         Route::get('/restUser/show', [App\Http\Controllers\AdminController::class, 'restUser_show'])->name('restUser.show');
         Route::get('/restUser/create',[App\Http\Controllers\AdminController::class, 'restUser_Create'])->name('restUser.create');


         Route::get('driver/show', [App\Http\Controllers\AdminController::class, 'driver_show'])->name('driver.show');
         Route::get('driver/{driver}/edit',[App\Http\Controllers\AdminController::class, 'driver_edit'])->name('driver.edit');
         Route::patch('driver/{driver}/update',[App\Http\Controllers\AdminController::class, 'driver_update'])->name('driver.update');
         Route::get('driver/{driver}/details', [App\Http\Controllers\AdminController::class, 'driver_details'])->name('driver.view');


         Route::get('city/show', [App\Http\Controllers\AdminController::class, 'city_show'])->name('city.show');
         Route::get('city/{cities}/edit',[App\Http\Controllers\AdminController::class, 'city_edit'])->name('city.edit');
         Route::get('city/create',[App\Http\Controllers\AdminController::class, 'city_create'])->name('city.create');
         Route::post('city/store',[App\Http\Controllers\AdminController::class, 'city_store'])->name('city.store');
         Route::get('city/{cities}/details', [App\Http\Controllers\AdminController::class, 'city_details'])->name('city.view');
         Route::patch('city/{cities}/update', [App\Http\Controllers\AdminController::class, 'city_update'])->name('city.update');


         Route::get('cuisine/show', [App\Http\Controllers\AdminController::class, 'cuisine_show'])->name('cuisine.show');
         Route::get('cuisine/create',[App\Http\Controllers\AdminController::class, 'cuisine_create'])->name('cuisine.create');
         Route::post('cuisine/store',[App\Http\Controllers\AdminController::class, 'cuisine_store'])->name('cuisine.store');
         Route::get('cuisine/{cuisine}/edit', [App\Http\Controllers\AdminController::class, 'cuisine_edit'])->name('cuisine.edit');
         Route::patch('cuisine/{cuisine}/update', [App\Http\Controllers\AdminController::class, 'cuisine_update'])->name('cuisine.update');
         Route::get('cuisine/{cuisine}/details', [App\Http\Controllers\AdminController::class, 'cuisine_details'])->name('cuisine.view');


         Route::get('restaurant/create',[App\Http\Controllers\AdminController::class, 'restaurant_create'])->name('restaurant.create');
         Route::post('restaurant/store',[App\Http\Controllers\AdminController::class, 'restaurant_store'])->name('restaurant.store');
         Route::get('restaurant/show', [App\Http\Controllers\AdminController::class, 'restaurant_show'])->name('restaurant.show');
         Route::get('restaurant/{restaurant}/edit', [App\Http\Controllers\AdminController::class, 'restaurant_edit'])->name('restaurant.edit');
         Route::get('restaurant/{restaurant}/details', [App\Http\Controllers\AdminController::class, 'restaurant_details'])->name('restaurant.view');
         Route::patch('restaurant/{restaurant}/update', [App\Http\Controllers\AdminController::class, 'restaurant_update'])->name('restaurant.update');


         Route::get('discount/create',[App\Http\Controllers\AdminController::class, 'discount_create'])->name('discount.create');
         Route::get('discount/show', [App\Http\Controllers\AdminController::class, 'discount_show'])->name('discount.show');
         Route::get('discount/{discount}/edit', [App\Http\Controllers\AdminController::class, 'discount_edit'])->name('discount.edit');
         Route::get('discount/{discount}/details', [App\Http\Controllers\AdminController::class, 'discount_details'])->name('discount.view');
         Route::post('discount/store',[App\Http\Controllers\AdminController::class, 'discount_store'])->name('discount.store');
         Route::get('discountDel/{id}',[App\Http\Controllers\AdminController::class, 'discountDelete'])->name('discount.delete');
         Route::patch('discount/{discount}/update', [App\Http\Controllers\AdminController::class, 'discount_update'])->name('discount.update');


         Route::get('order/show', [App\Http\Controllers\AdminController::class, 'order_show'])->name('order.show');
         Route::get('order/{order}/details', [App\Http\Controllers\AdminController::class, 'order_details'])->name('order.view');
         Route::get('order/{order}/edit', [App\Http\Controllers\AdminController::class, 'order_edit'])->name('order.edit');
         Route::patch('order/{order}/update', [App\Http\Controllers\AdminController::class, 'order_update'])->name('order.update');


         Route::get('role/show', [App\Http\Controllers\AdminController::class, 'role_show'])->name('role.show');
         Route::get('role/create',[App\Http\Controllers\AdminController::class, 'role_create'])->name('role.create');
         Route::post('role/store',[App\Http\Controllers\AdminController::class, 'role_store'])->name('role.store');
         Route::get('role/{role}/details', [App\Http\Controllers\AdminController::class, 'role_details'])->name('role.view');
         Route::get('role/{role}/edit', [App\Http\Controllers\AdminController::class, 'role_edit'])->name('role.edit');
         Route::patch('role/{role}/update', [App\Http\Controllers\AdminController::class, 'role_update'])->name('role.update');
         Route::get('roleDel/{id}',[App\Http\Controllers\AdminController::class, 'roleDelete'])->name('role.delete');



         Route::get('permission/show', [App\Http\Controllers\AdminController::class, 'permission_show'])->name('permission.show');
         Route::get('permission/create',[App\Http\Controllers\AdminController::class, 'permission_create'])->name('permission.create');
         Route::post('permission/store',[App\Http\Controllers\AdminController::class, 'permission_store'])->name('permission.store');
         Route::get('permission/{permission}/edit', [App\Http\Controllers\AdminController::class, 'permission_edit'])->name('permission.edit');
         Route::patch('permission/{permission}/update', [App\Http\Controllers\AdminController::class, 'permission_update'])->name('permission.update');
         Route::get('permission/{permission}/details', [App\Http\Controllers\AdminController::class, 'permission_details'])->name('permission.view');
         Route::get('permissionDel/{id}',[App\Http\Controllers\AdminController::class, 'permissionDelete'])->name('permission.delete');

   });

//FRONT END///

//    Route::get('/front', [HomeController::class, 'index'])->name('index');
//    Route::get('/sign_in', [HomeController::class, 'login'])->name('signIn');
//    Route::get('/sign_up', [HomeController::class, 'register']);
//    Route::post('/sign_up_store', [HomeController::class, 'store']);
//    Route::post('/sign_in_fun', [HomeController::class, 'sign_in_fun']);

// //forget password   
   Route::get('/forget', [ForgetPasswordController::class, 'forget_password'])->name('forget.password.form');
//    Route::post('/password/forgot',[ForgetPasswordController::class,'sendResetLink'])->name('forgot.password.link');
//    Route::get('/password/reset/{token}',[ForgetPasswordController::class,'showResetForm'])->name('reset.password.form');
//    Route::post('/password/reset',[ForgetPasswordController::class,'resetPassword'])->name('reset.password');




//     Route::get('/my_home', [HomeController::class, 'my_home'])->name('my_home');


//     Route::get('/Logout', [MyAccountController::class, 'logout'])->name('logout');

// //restaurant listing
//     Route::get('/restaurant_list', [MyAccountController::class, 'restaurant_list']);
//     Route::get('/search', [MyAccountController::class, 'search'])->name('search');
//     Route::get('/restaurant_details/{restaurant}', [MyAccountController::class, 'restaurant_details'])->name('restaurant_details');


// //account details

//     Route::get('/Account', [MyAccountController::class, 'account_details'])->name('account');
//     Route::patch('/save-changes/{id}', [MyAccountController::class, 'save_changes'])->name('save-changes');

// //change-password
//     Route::get('/change-password', [MyAccountController::class, 'change_password'])->name('change');
//     Route::patch('/password-post', [MyAccountController::class, 'change_password_post'])->name('update');

//     //address
//     Route::get('/addresses', [AddressController::class, 'address'])->name('address');
//     Route::post('/addresses-store', [AddressController::class, 'address_store'])->name('address.store');
//     Route::get('AddressDel/{id}', [AddressController::class, 'AddressDelete'])->name('address.delete');
//     Route::get('edit-address/{id}', [AddressController::class, 'edit_address'])->name('address.edit');

// //cart
//    Route::get('/cart', [CartController::class, 'cart'])->name('cart');

//    Route::get('add-to-cart/{id}', [CartController::class, 'addToCart'])->name('add.to.cart');
//    Route::get('cartDel/{id}', [CartController::class, 'cartDelete'])->name('cart.delete');
//    Route::get('remove-from-cart/{id}', [CartController::class, 'remove'])->name('remove.from.cart');
//    Route::get('/empty_cart', [CartController::class, 'empty_cart'])->name('empty.cart');
//    Route::get('/cart_items', [CartController::class, 'cart_items']);
//    Route::patch('/update-cart', [CartController::class, 'update'])->name('update.cart');

//    Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');

Route::get('/front', [HomeController::class, 'index'])->name('index');
Route::prefix('customer')->name('customer.')->group(function (){

   Route::middleware(['guest:customer','PreventBackHistory'])->group(function () {
         Route::get('/sign_in', [HomeController::class, 'login'])->name('signIn');
         Route::post('/sign_in_fun', [HomeController::class, 'sign_in_fun'])->name('sign_in_fun');
           Route::get('/sign_up', [HomeController::class, 'register'])->name('register');
          Route::post('/sign_up_store', [HomeController::class, 'store'])->name('register.store');

 //forget password   
       Route::get('/forget', [ForgetPasswordController::class, 'forget_password'])->name('forget.password.form');
       Route::post('/password/forgot',[ForgetPasswordController::class,'sendResetLink'])->name('forgot.password.link');
       Route::get('/password/reset/{token}',[ForgetPasswordController::class,'showResetForm'])->name('reset.password.form');
       Route::post('/password/reset',[ForgetPasswordController::class,'resetPassword'])->name('reset.password');


   });

   Route::middleware(['auth:customer','PreventBackHistory'])->group(function () {
         Route::get('/my_home', [HomeController::class, 'my_home'])->name('my_home');
         Route::get('/Account', [MyAccountController::class, 'account_details'])->name('account');
//restaurant listing
         Route::get('/restaurant_list', [MyAccountController::class, 'restaurant_list']);
         Route::get('/search', [MyAccountController::class, 'search'])->name('search');
         Route::get('/restaurant_details/{restaurant}', [MyAccountController::class, 'restaurant_details'])->name('restaurant_details');
//account details

         Route::get('/Account', [MyAccountController::class, 'account_details'])->name('account');
         Route::patch('/save-changes/{id}', [MyAccountController::class, 'save_changes'])->name('save-changes');
//change-password
         Route::get('/change-password', [MyAccountController::class, 'change_password'])->name('change');
         Route::patch('/password-post', [MyAccountController::class, 'change_password_post'])->name('update');

//address
     Route::get('/addresses', [AddressController::class, 'address'])->name('address');
     Route::post('/addresses-store', [AddressController::class, 'address_store'])->name('address.store');
     Route::get('AddressDel/{id}', [AddressController::class, 'AddressDelete'])->name('address.delete');
     Route::get('edit-address/{id}', [AddressController::class, 'edit_address'])->name('address.edit');
     Route::post('/Logout', [MyAccountController::class, 'logout'])->name('logout');  

//restaurant listing
     Route::get('/restaurant_list', [MyAccountController::class, 'restaurant_list'])->name('restaurant_list');
     Route::get('/search', [MyAccountController::class, 'search'])->name('search');
     Route::get('/restaurant_details/{restaurant}', [MyAccountController::class, 'restaurant_details'])->name('restaurant_details');

 //cart
    Route::get('/cart', [CartController::class, 'cart'])->name('cart');

    Route::get('add-to-cart/{id}', [CartController::class, 'addToCart'])->name('add.to.cart');
    Route::get('cartDel/{id}', [CartController::class, 'cartDelete'])->name('cart.delete');
    Route::get('remove-from-cart/{id}', [CartController::class, 'remove'])->name('remove.from.cart');
    Route::get('/empty_cart', [CartController::class, 'empty_cart'])->name('empty.cart');
    Route::get('/cart_items', [CartController::class, 'cart_items'])->name('cart_items');
    Route::patch('/update-cart', [CartController::class, 'update'])->name('update.cart');

   Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');
   });
});

















































































































































































// Route::middleware(['auth', 'isUser'])->group(function () {
//     Route::get('/my_home', function () {
//         return view('my_home');
//     })->name('signIn');

//       Route::get('/Logout', [MyAccountController::class, 'logout'])->name('logout');

//     //restaurant listing
//     Route::get('/restaurant_list', [MyAccountController::class, 'restaurant_list']);
//     Route::get('/search', [MyAccountController::class, 'search'])->name('search');
//     Route::get('/restaurant_details/{restaurant}', [MyAccountController::class, 'restaurant_details'])->name('restaurant_details');



//     //account details

//     Route::get('/Account', [MyAccountController::class, 'account_details'])->name('account');
//     Route::patch('/save-changes/{id}', [MyAccountController::class, 'save_changes'])->name('save-changes');

//     //change-password
//     Route::get('/change-password', [MyAccountController::class, 'change_password'])->name('change');
//     Route::patch('/password-post', [MyAccountController::class, 'change_password_post'])->name('update');

//     //address
//     Route::get('/addresses', [AddressController::class, 'address'])->name('address');
//     Route::post('/addresses-store', [AddressController::class, 'address_store'])->name('address.store');
//     Route::get('AddressDel/{id}', [AddressController::class, 'AddressDelete'])->name('address.delete');
//     Route::get('edit-address/{id}', [AddressController::class, 'edit_address'])->name('address.edit');


// });








