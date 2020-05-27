<?php

use Illuminate\Database\Seeder;

class userkhTbableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	        $data=[
	        	'name'=>'buidag',
	        	'email'=>'buidangco99@gmail.com',
	        	'password'=>bcrypt('123456'),
	        ];
	        DB::table('userkhachhang')->insert($data);
    }
}
