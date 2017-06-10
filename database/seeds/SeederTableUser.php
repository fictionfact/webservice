<?php

use Illuminate\Database\Seeder;

class SeederTableUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('users')->delete();

    	$users = array(
    		array(
    			'id'=>1, 
    			'name'=>'master', 
    			'email' => 'master@master.com', 
    			'password' => bcrypt('secret'),
                'status' => 'admin'
    			),
            array(
                'id'=>2, 
                'name'=>'owner1', 
                'email' => 'owner1@owner.com', 
                'password' => bcrypt('secret'),
                'status' => 'admin'
                ),
            array(
                'id'=>3, 
                'name'=>'customer1', 
                'email' => 'cust1@cust.com', 
                'password' => bcrypt('secret'),
                'status' => 'customer'
                ),
            array(
                'id'=>4, 
                'name'=>'owner2', 
                'email' => 'owner2@owner.com', 
                'password' => bcrypt('secret'),
                'status' => 'admin'
                ),
            array(
                'id'=>5, 
                'name'=>'customer2', 
                'email' => 'cust2@owner.com', 
                'password' => bcrypt('secret'),
                'status' => 'customer'
                ),
    		);

    	DB::table('users')->insert($users);
    }
}
