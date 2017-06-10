<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableShopOwner extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_owners', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id'); // foreign key
            $table->integer('user_id')->unsigned()->unique();
            $table->date('birthday');
            $table->string('gender');
            $table->string('phone')->unique();
            $table->timestamps();
            $table->softDeletes();
           
        });

        Schema::table('shop_owners', function($table) {
            $table->foreign('user_id')
                ->references('id')
                ->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('shop_owners');
    }
}
