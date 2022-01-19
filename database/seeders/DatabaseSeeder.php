<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // Customer::factory(20)->create();
        // $this->call(CustomerSeeder::class);
         \App\Models\Customer::factory(20)->create();
         \App\Models\Driver::factory(20)->create();
    }
}
