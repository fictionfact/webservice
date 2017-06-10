<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class SeederTableStag extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stags')->delete();
        $stags = array(
            array('id'=>1,'name'=>'Shop Tag 1'),
            array('id'=>2,'name'=>'Shop Tag 2'),
            );
        DB::table('stags')->insert($stags);
    }
}
