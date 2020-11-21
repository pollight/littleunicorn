<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            //
            $table->integer('user_id');
            $table->integer('count');
            $table->integer('amount');
            $table->string('status');
            $table->integer('delivery_count');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            //
            $table->dropColumn('user_id');
            $table->dropColumn('count');
            $table->dropColumn('amount');
            $table->dropColumn('status');
            $table->dropColumn('delivery_count');
        });
    }
}
