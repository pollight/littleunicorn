<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCdekCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cdek_cities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cityUuid')->nullable();
            $table->string('cityName')->nullable();
            $table->integer('cityCode')->nullable();
            $table->string('region')->nullable();
            $table->string('regionCode')->nullable();
            $table->string('regionCodeExt')->nullable();
            $table->string('subRegion')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('kladr')->nullable();
            $table->string('fiasGuid')->nullable();
            $table->string('paymentLimit')->nullable();
            $table->string('timezone')->nullable();
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
        Schema::dropIfExists('cdek_cities');
    }
}
