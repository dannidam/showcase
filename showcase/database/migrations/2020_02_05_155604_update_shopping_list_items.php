<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateShoppingListItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('shopping_list_items', function(Blueprint $table){
            $table->dropColumn('list_id');
            $table->integer('group_id')->after('user_add');
            $table->date('expires')->after('updated_at');
            $table->string('weight_pr_item')->after('quantity');
            $table->string('status')->after('group_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
