<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use Faker\Factory as Faker;

class SeederTableCustomer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// DB::table('customers')->delete();
     //    $faker = Faker::create();
    	// foreach (range(1,10) as $index) {
    	// 	DB::table('customers')->insert([
    	// 		'username' => $faker->userName,
    	// 		'first_name' => $faker->firstName,
    	// 		'last_name' => $faker->lastName,
    	// 		'birthday' => $faker->date($format = 'Y-m-d', $max = 'now'),
    	// 		'gender' => 'Male',
    	// 		'email' => $faker->email,
    	// 		'phone' => $faker->phoneNumber,
    	// 		'credit' => 0,
    	// 		'order' => $faker->numberBetween(0,5),

    	// 		]);
    	// }

        DB::table('customers')->delete();

        $customers = array(
            array(
                'id' => '1',
                'user_id' => '3',
                'birthday' => '1995-11-1',
                'gender' => 'Male',
                'phone' => '0877384682',
                'credit' => 0,
                'order' => 0,
                ),
            array(
                'id' => '2',
                'user_id' => '5',
                'birthday' => '1995-11-1',
                'gender' => 'Male',
                'phone' => '0893848634',
                'credit' => 0,
                'order' => 0,
                ),


            );

        DB::table('customers')->insert($customers);
    }
}
