<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;

    protected $fillable=['name','code','discount_type','amount','min_amount','start','end',
                            'max_uses','max_uses_per_cus'];


       public function restaurants()
        {
            return $this->belongsToMany('App\Models\Restaurant');
        }
}
