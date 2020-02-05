<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('terms')->insert([
    		'name' => 'Uncategories',
            'slug' => 'uncategories',
             'type' => 'category',
    		'created_at' => Carbon::now(),
    		'updated_at' => Carbon::now()
    	]);
        DB::table('posts')->insert([
        	'title' => 'Contact us',
        	'slug' => 'contact-us',
        	'post_type' => 2,
        	'user_id' => 1,
        	'content' => 'A certificate of live birth is not the same thing by any stretch of the imagination as a birth certificate.',
        	'created_at' => Carbon::now(),
    		'updated_at' => Carbon::now()
        ]);

        DB::table('posts')->insert([
        	'title' => 'About us',
        	'slug' => 'about-us',
        	'post_type' => 2,
        	'user_id' => 1,
        	'content' => 'A certificate of live birth is not the same thing by any stretch of the imagination as a birth certificate.',
        	'created_at' => Carbon::now(),
    		'updated_at' => Carbon::now()
        ]);

        DB::table('posts')->insert([
        	'title' => 'Services',
        	'slug' => 'services',
        	'post_type' => 2,
        	'user_id' => 1,
        	'content' => 'A certificate of live birth is not the same thing by any stretch of the imagination as a birth certificate.',
        	'created_at' => Carbon::now(),
    		'updated_at' => Carbon::now()
        ]);

        DB::table('posts')->insert([
        	'title' => 'Porfolio',
        	'slug' => 'porfolio',
        	'post_type' => 2,
        	'user_id' => 1,
        	'content' => 'A certificate of live birth is not the same thing by any stretch of the imagination as a birth certificate.',
        	'created_at' => Carbon::now(),
    		'updated_at' => Carbon::now()
        ]);
    }
}
