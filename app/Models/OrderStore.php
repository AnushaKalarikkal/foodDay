<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderStore extends Model
{
    use HasFactory;

     public function address()
    {
        return $this->belongsTo(Address::class);
    }
     public function fooditems()
        {
            return $this->belongsToMany('App\Models\Fooditem','food_order','fooditem_id','orderstore_id');
        }
}
