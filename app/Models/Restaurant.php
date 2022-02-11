<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable =[
        'name','about','address','mobile','location','city_id','logo','banner','min_order_value','cost_for_two_people',
        'default_preparation_time','is_open','allow_pickup','status'

    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }
    
  

 

        public function getLogoAttribute($value) {
                if (strpos($value, 'https://') !== FALSE || strpos($value, 'http://') !== FALSE) {
                    return $value;
                }
                return asset('storage/' . $value);
                }

        public function getBannerAttribute($value) {
                if (strpos($value, 'https://') !== FALSE || strpos($value, 'http://') !== FALSE) {
                    return $value;
                }
                return asset('storage/' . $value);
                }




        public function orders()
    {
        return $this->hasMany(Order::class);
    }

     public function restaurantusers()
    {
        return $this->hasMany(Restaurantuser::class);
    }

    public function cuisines()
        {
            return $this->belongsToMany('App\Models\Cuisine','cuisine_restaurants');
        }



     

            
}

