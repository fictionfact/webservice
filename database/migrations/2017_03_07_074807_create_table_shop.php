<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableShop extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('image');
            $table->string('is_open')->default('Yes');
            $table->time('open_at');
            $table->time('close_at');
            $table->integer('shop_location_id')->unsigned();
            $table->integer('shop_owner_id')->unsigned();
            
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('shops', function($table) {
            $table->foreign('shop_owner_id')
                ->references('id')
                ->on('shop_owners');
            $table->foreign('shop_location_id')
                ->references('id')
                ->on('shop_locations');
        });
    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('shops');
    }
}
