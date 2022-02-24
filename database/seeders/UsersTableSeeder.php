<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    
        //For admin
        DB::table('users')->insert([
        [
            'full_name'=>'Rikesh Admin',
            'username'=>'Admin',
            'email'=>'admin@gmail.com',
            'password'=>Hash::make('111111111'),
            'role'=>'admin',
            'country'=>'Nepal',

            'status'=>'active',
        ],

        // for seller
        [
            'full_name'=>'Rikesh seller',
            'username'=>'seller',
            'email'=>'seller@gmail.com',
            'password'=>Hash::make('1111'),
            'role'=>'seller',
            'country'=>'Nepal',
            'status'=>'active',
        ],

        // for customer
       [
            'full_name'=>'Rikesh Customer',
            'username'=>'Customer',
            'email'=>'customer@gmail.com',
            'password'=>Hash::make('1111'),
            'country'=>'Nepal',
            'role'=>'customer',
            'status'=>'active',
        ],
        
    ]);
    
    }

}
