<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCdekRegionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cdek_regions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('regionUuid');
            $table->string('regionName');
            $table->string('regionCode')->nullable();
            $table->string('prefix')->nullable();
            $table->string('regionCodeExt')->nullable();
            $table->string('regionFiasGuid')->nullable();
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
        Schema::dropIfExists('cdek_regions');
    }
}
