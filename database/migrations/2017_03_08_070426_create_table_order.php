<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('customer_id')->unsigned();
            $table->unsignedInteger('order_batch_code')->unique();
            $table->string('order_status')->comment('Process, Cooked, Complete, or Expired');
            $table->integer('total_price');
            $table->time('reserve_time');
            $table->integer('shop_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();


        });

        Schema::table('orders', function($table) {
            $table->foreign('customer_id')
                ->references('id')
                ->on('customers');

            $table->foreign('shop_id')
                ->references('id')
                ->on('shops');
        });
        
            /*Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->float('total');
            $table->tinyInteger('delivered');
            $table->timestamps();
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('orders');
    }
}
