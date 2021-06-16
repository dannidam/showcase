<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ShoppingUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shopping_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique(); //this will also be used for username
            $table->string('username');
            $table->string('group_id');
            $table->string('password');
            $table->string('remembertoken'); //this is our salt variable
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shopping_users');
    }
}
