<?php

use Illuminate\Database\Seeder;

class PropertiesTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('properties_type')->insert([
        	[
        		'name' =>'SIZE',
                'systems_id'=>'2'
        	],
        	[
        		'name' =>'COLOR',
                'systems_id'=>'2'
        	],
        	[
        		'name' =>'DÀI',
                'systems_id'=>'2'
        	],
        	[
        		'name' =>'RỘNG',
                'systems_id'=>'2'
        	]
        	
        	]
        );
    }
}
