<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fooditem extends Model
{
    use HasFactory;
    protected $fillable =[
        'food_item','rate','status','image','type','description'
    ];

    public function restaurants()
    {
        return $this->hasMany(Restaurant::class);
    }

     public function order()
        {
            return $this->belongsToMany('App\Models\OrderStore');
        }
}
