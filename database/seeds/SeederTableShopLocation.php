<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use Faker\Factory as Faker;

class SeederTableShopLocation extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('shop_locations')->delete();
        // $faker = Faker::create();
        // foreach (range(1,6) as $index) {
        //     DB::table('shop_locations')->insert([
        //         'name' => $faker->streedAddress,

        //         ]);
        // }

        DB::table('shop_locations')->delete();
        $shop_locations = array(
            array('id'=>1,'name'=>'Location 1'),
            array('id'=>2,'name'=>'Location 2'),
            );
        DB::table('shop_locations')->insert($shop_locations);

    }
}
