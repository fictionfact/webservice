<?php

use Illuminate\Database\Seeder;

class SeederTableOrderedItem extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ordered_items')->delete();

        $ordered_items = array(
            array(
                'id' => '1',
                'item_id' => '1',
                'qty' => '2',
                'order_id' => '1',
                'shop_id' => '1'
                ),
            array(
                'id' => '2',
                'item_id' => '2',
                'qty' => '5',
                'order_id' => '1',
                'shop_id' => '1'
                ),
            array(
                'id' => '3',
                'item_id' => '1',
                'qty' => '3',
                'order_id' => '2',
                'shop_id' => '1'
                ),
            array(
                'id' => '4',
                'item_id' => '2',
                'qty' => '3',
                'order_id' => '2',
                'shop_id' => '1'
                ),
            array(
                'id' => '5',
                'item_id' => '1',
                'qty' => '4',
                'order_id' => '3',
                'shop_id' => '1'
                ),
            array(
                'id' => '6',
                'item_id' => '3',
                'qty' => '1',
                'order_id' => '4',
                'shop_id' => '2'
                ),


            );

        DB::table('ordered_items')->insert($ordered_items);
    }
}
