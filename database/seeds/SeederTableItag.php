<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class SeederTableItag extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('itags')->delete();
        $itags = array(
            array('id'=>1,'name'=>'Item Tag 1'),
            array('id'=>2,'name'=>'Item Tag 2'),
            );
        DB::table('itags')->insert($itags);
    }
}
