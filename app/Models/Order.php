<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable=['id','order_date','customer_id','restaurant_id','mobile','order_type',
    'order_status','delivery_status','payment_status','payment_method','channel','item_total',
    'sub_total','delivery_fee','tax','discount','grand_total','address_id'];

      public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }


      public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

      public function address()
    {
        return $this->belongsTo(Address::class);
    }
    public function fooditems()
        {
            return $this->belongsToMany('App\Models\Fooditem','fooditem_order')->withPivot('quantity', 'food_item');
        }

}
