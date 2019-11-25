<?php

use Illuminate\Database\Seeder;

class PropertiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('properties')->insert([
        	[
        		'value' =>'S',
        		'properties_type_id' => 1
        	],
        	[
        		'value' =>'M',
        		'properties_type_id' => 1
        	],
        	[
        		'value' =>'L',
        		'properties_type_id' => 1
        	],
        	[
        		'value' =>'XL',
        		'properties_type_id' => 1
        	],
        	[
        		'value' =>'XANH',
        		'properties_type_id' => 2
        	],
        	[
        		'value' =>'ĐỎ',
        		'properties_type_id' => 2
        	],
        	[
        		'value' =>'TRẮNG',
        		'properties_type_id' => 2
        	],
        	[
        		'value' =>'VÀNG',
        		'properties_type_id' => 2
        	],
        	[
        		'value' =>'0.5m',
        		'properties_type_id' => 3
        	],
        	[
        		'value' =>'1m',
        		'properties_type_id' => 3
        	],
        	[
        		'value' =>'2m',
        		'properties_type_id' => 3
        	],
        	[
        		'value' =>'3m',
        		'properties_type_id' => 3
        	],
        	[
        		'value' =>'0.5cm',
        		'properties_type_id' => 4
        	],
        	[
        		'value' =>'1cm',
        		'properties_type_id' => 4
        	],
        	[
        		'value' =>'2cm',
        		'properties_type_id' => 4
        	],
        	[
        		'value' =>'3cm',
        		'properties_type_id' => 4
        	],
        	
        	]
        );
    }
}
