<?php

use Illuminate\Database\Seeder;
use App\UsersClient;

class UsersClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        {
        $user_client = new UsersClient;
        $user_client->name = 'nam nguyen';
        $user_client->email = 'namnguyen@gmail.com';
        $user_client->phone = '01642911168';
        $user_client->password = Hash::make('1');
        $user_client->save();
    }
    }
}
