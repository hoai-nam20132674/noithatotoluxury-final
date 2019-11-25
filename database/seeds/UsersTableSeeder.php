<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
        	[
        		'name' =>'Nam Nguyễn',
        		'email' =>'admin@gmail.com',
        		'password'=>Hash::make('1'),
                'systems_id'=> 1,
                'role' => 1,
                'parent_id' =>1,
                'phone' => '0848384333',
        	]
        	
        	]
        );
    }
}
