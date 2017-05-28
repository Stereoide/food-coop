<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
			'category_id' => 1,
            'name' => 'Vollkornbrot',
            'description' => 'Gesund und rund',
			'price' => 1.23,
        ]);
		
        DB::table('products')->insert([
			'category_id' => 1,
            'name' => 'Weizenbrot',
            'description' => 'Weiß und heiß',
			'price' => 2.34,
        ]);
		
        DB::table('products')->insert([
			'category_id' => 2,
            'name' => 'Rindfleisch',
            'description' => 'Muh',
			'price' => 5.00,
        ]);
		
        DB::table('products')->insert([
			'category_id' => 2,
            'name' => 'Schweinefleisch',
            'description' => 'Oink',
			'price' => 3.99,
        ]);
		
    }
}