<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use Faker\Factory as Faker;

class SeederTableShop extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// DB::table('shops')->delete();
    	// $faker = Faker::create();
    	// foreach (range(1,10) as $index) {
    	// 	DB::table('shops')->insert([
    	// 		'name' => $faker->name,
    	// 		'image' => $faker->image,
    	// 		'is_open' => 'Yes',
    	// 		'open_at' => '10:00',
    	// 		'close_at' => '21:00',
    	// 		'shop_location_id' => $faker->numberBetween(1,4),
    	// 		'shop_owner_id' => $faker->numberBetween(1,8),


    	// 		]);
    	// }


    DB::table('shops')->delete();

        $shops = array(
            array(
                'id' => '1',
                'name' => 'Shop ABC',
                'image' => 'data',
                'is_open' => 'Yes',
                'open_at' => '10:00',
                'close_at' => '21:00',
                'shop_location_id' => '1',
                'shop_owner_id' => '1'
                ),
            array(
                'id' => '2',
                'name' => 'Toko Makan A',
                'image' => 'data',
                'is_open' => 'Yes',
                'open_at' => '10:00',
                'close_at' => '21:00',
                'shop_location_id' => '1',
                'shop_owner_id' => '2'
                ),

            );

        DB::table('shops')->insert($shops);
    }
}
