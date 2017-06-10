<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use Faker\Factory as Faker;
use App\User;
class SeederTableShopOwner extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {
        // DB::table('shop_owners')->delete();
        // $faker = Faker::create();
        // $users = User::lists('id')->All();

    	// foreach (range(1,10) as $index) {
    	// 	DB::table('shop_owners')->insert([
    	// 		'user_id' => $faker->randomElement($users),
    	// 		'birthday' => $faker->date($format = 'Y-m-d', $max = 'now'),
    	// 		'gender' => 'Male',
    	// 		'email' => $faker->email,
    	// 		'phone' => $faker->phoneNumber,
    			

    	// 		]);
    	// }

        DB::table('shop_owners')->delete();
        $shopowners = array(
            array(
                'id'=>1, 
                'birthday'=>'2000-1-1', 
                'gender'=>'Male', 
                'phone'=>'093759283', 
                'user_id'=>'4'),
            array('id'=>2, 
                'birthday'=>'2011-1-1', 
                'gender'=>'Male', 
                'phone'=>'081273098', 
                'user_id'=>'2'),
     
            );
        DB::table('shop_owners')->insert($shopowners);

    }
}
