<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Db::table('users')->insert([

        	'role_id'=>'1',
        	'name'=>'popular',
        	'email'=>'admin@gmail.com',
        	'password'=>bcrypt('1234'),

        ]);

         Db::table('users')->insert([

        	'role_id'=>'2',
        	'name'=>'rana',
        	'email'=>'rana@gmail.com',
        	'password'=>bcrypt('1234')

        ]);
    }
}
