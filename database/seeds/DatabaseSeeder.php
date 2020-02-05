<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         Model::unguard(); // Disable mass assignment
         $this->call(CustomerSeeder::class);
         $this->call(ProductSeeder::class);
         $this->call(ShopSeeder::class);
        $this->call(SaleSeeder::class);
        $this->call(VendorSeeder::class);
         Model::reguard(); // Enable mass assignment
    }
}
