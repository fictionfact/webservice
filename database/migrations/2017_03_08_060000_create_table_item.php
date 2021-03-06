<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableItem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->integer('price');
            $table->string('stock')->default('Ready');
            $table->string('description')->nullable();
            $table->string('image')->nullable();
            $table->integer('shop_id')->unsigned();;
            $table->timestamps();
            $table->softDeletes();  
        });

        Schema::table('items', function($table) {
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
        Schema::dropIfExists('items');
    }
}
