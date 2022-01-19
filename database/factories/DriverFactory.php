<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class DriverFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'first_name' => $this->faker->name,
            'last_name' => $this->faker->name,
            'mobile' => $this->faker->phoneNumber,
            'phone_code'=>mt_rand(91,98),
		    'email' => $this->faker->unique()->safeEmail,
             'password' => Hash::make('password@123'), // password
        ];
    }
}
