<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopStagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_stags', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('shop_id')->unsigned();
            $table->integer('stag_id')->unsigned();

            $table->foreign('shop_id')
            ->references('id')
            ->on('shops')
            ->onDelete('cascade');

            $table->foreign('stag_id')
            ->references('id')
            ->on('stags')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_stags');
    }
}
