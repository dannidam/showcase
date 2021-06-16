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
        Schema::create('shoppingUsers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstName');
            $table->string('LastName');
            $table->string('email')->unique()->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->boolean('online')->default(false);
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
        Schema::dropIfExists('shoppingUsers');
    }
}
