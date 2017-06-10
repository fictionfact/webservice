<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use Faker\Factory as Faker;

class SeederTableOrder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// DB::table('orders')->delete();
     //    $faker = Faker::create();
    	// foreach (range(1,3) as $index) {
    	// 	DB::table('orders')->insert([
    	// 		'customer_id' => $faker->numberBetween(1,5),
    	// 		'order_batch_code' => $faker->numberBetween(1000,9999),
    	// 		'order_status' => 'Process',
    	// 		'total_price' => $faker->numberBetween(50000,200000),
    	// 		'reserve_time' => $faker->time($format = 'H:i', $min = 'now'),

    	// 		]);
    	// }

        DB::table('orders')->delete();

        $orders = array(
            array(
                'id' => '1',
                'customer_id' => '1',
                'order_batch_code' => '068873',
                'order_status' => 'Process',
                'total_price' => '150000',
                'reserve_time' => '10:00',
                'shop_id' => '1'
                ),
            array(
                'id' => '2',
                'customer_id' => '2',
                'order_batch_code' => '055374',
                'order_status' => 'Process',
                'total_price' => '120000',
                'reserve_time' => '11:00',
                'shop_id' => '1'
                ),
            array(
                'id' => '3',
                'customer_id' => '1',
                'order_batch_code' => '887462',
                'order_status' => 'Process',
                'total_price' => '140000',
                'reserve_time' => '18:00',
                'shop_id' => '1'
                ),
            array(
                'id' => '4',
                'customer_id' => '1',
                'order_batch_code' => '934475',
                'order_status' => 'Process',
                'total_price' => '280000',
                'reserve_time' => '19:00',
                'shop_id' => '2'
                ),


            );

        DB::table('orders')->insert($orders);
    }
}
