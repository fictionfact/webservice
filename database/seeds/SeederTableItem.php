<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use Faker\Factory as Faker;

class SeederTableItem extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     //    DB::table('items')->delete();
     //    $faker = Faker::create();
     //    $shops = Shop::all()->lists('id');
    	// foreach (range(1,10) as $index) {
    	// 	DB::table('items')->insert([
    	// 		'name' => $faker->name,
    	// 		'price' => $faker->image,
    	// 		'stock' => 'Ready',
    	// 		'description' => $faker->sentence,
    	// 		'price' => $faker->numberBetween(20000,40000),
    	// 		'image' => $faker->image,
    	// 		'shop_id' => $faker->randomElement($users),


    	// 		]);
    	// }

        DB::table('items')->delete();

        $items = array(
            array(
                'id' => '1',
                'name' => 'Ayam Peyet',
                'price' => '28000',
                'stock' => 'In Stock',
                'shop_id' => '1'
                ),
            array(
                'id' => '2',
                'name' => 'Indomie',
                'price' => '24000',
                'stock' => 'In Stock',
                'shop_id' => '1'
                ),
            array(
                'id' => '3',
                'name' => 'Spageti',
                'price' => '30000',
                'stock' => 'In Stock',
                'shop_id' => '2'
                ),
            );

        DB::table('items')->insert($items);
    }
}
