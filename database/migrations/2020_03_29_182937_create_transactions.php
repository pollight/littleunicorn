<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('payment_system')->nullable();
            $table->string('approval_code')->nullable();
            $table->string('order_number')->nullable();
            $table->string('backUrl')->nullable();
            $table->string('terminalId')->nullable();
            $table->string('orderDescription')->nullable();
            $table->string('paymentDate')->nullable();
            $table->string('formatted_amount')->nullable();
            $table->string('email')->nullable();
            $table->string('ip')->nullable();
            $table->string('pan_masked')->nullable();
            $table->string('expiry')->nullable();
            $table->string('panMasked4digits')->nullable();
            $table->string('refNum')->nullable();
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
        Schema::dropIfExists('transactions');
    }
}
