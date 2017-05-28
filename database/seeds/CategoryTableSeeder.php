<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'Brot',
            'description' => 'Alles was man so aus Getreide machen kann',
        ]);
		
        DB::table('categories')->insert([
            'name' => 'Fleisch',
            'description' => 'Alles was mal Muh und Oink gemacht hat',
        ]);
    }
}