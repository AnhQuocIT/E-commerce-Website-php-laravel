<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$data =[
    		[
    			'name'=>'Nguyễn Anh Quốc',
    			'email'=>'tomhome987@gmail.com',
    			'password'=>bcrypt('123456')
    		]
    	];
        DB::table('users')->insert($data);
    }
}
