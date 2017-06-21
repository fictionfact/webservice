<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableOrderedItem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordered_items', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id'); //FK of orders
            $table->integer('item_id')->unsigned();
            $table->integer('qty')->default(0);
            $table->string('note')->nullable();
            $table->integer('order_id');
            $table->integer('shop_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            
        });
        Schema::table('ordered_items', function($table) {

            $table->foreign('item_id')
                ->references('id')
                ->on('items');

            $table->foreign('shop_id')
                ->references('id')
                ->on('shops');
        });
    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ordered_items');
    }
}

