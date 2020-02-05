<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'username' => 'admin',
        	'email' => 'admin@example.com',
        	'name' => 'Admin',
        	'user_type' => 'admin',
        	'status' => 'active',
        	'activation_key' => str_random(20),
        	'password' => bcrypt('123456'),
        	'created_at' => Carbon::now(),
        	'updated_at' => Carbon::now()
        ]);
        DB::table('profiles')->insert([
        	'user_id' => '1'
        ]);
    }
}
