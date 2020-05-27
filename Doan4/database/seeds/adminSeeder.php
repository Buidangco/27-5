<?php

use Illuminate\Database\Seeder;

class adminSeeder extends Seeder
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
	        DB::table('admin')->insert($data);
    }
}
