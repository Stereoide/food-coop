<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'administrator',
            'email' => 'maske.joern@googlemail.com',
            'password' => bcrypt('backend'),
			'firstname' => 'Anton',
			'lastname' => 'Administrator',
			'salutation' => 'Herr',
			'phone' => '',
			'street' => '',
			'zipcode' => '',
			'city' => '',
			'is_administrator' => true,
        ]);
    }
}