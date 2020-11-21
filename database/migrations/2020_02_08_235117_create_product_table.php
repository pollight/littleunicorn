<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->nullable();
            $table->string('productId');
            $table->string('accountId');
            $table->boolean('shared')->nullable();
            $table->integer('version');
            $table->string('updated')->nullable();
            $table->string('name')->nullable();
            $table->longText('description')->nullable();
            $table->string('code')->nullable();
            $table->string('externalCode')->nullable();
            $table->boolean('archived')->nullable();
            $table->string('pathName')->nullable();
            $table->text('image')->nullable();
            $table->float('minPrice')->nullable();
            $table->text('salePrices')->nullable();
            $table->float('buyPriceValue')->nullable();
            $table->string('buyPriceCurrency')->nullable();
            $table->string('paymentItemType')->nullable();
            $table->boolean('discountProhibited')->nullable();
            $table->string('article')->nullable();
            $table->string('trackingType')->nullable();
            $table->float('weight')->nullable();
            $table->float('volume')->nullable();
            $table->text('barcodes')->nullable();
            $table->integer('modificationsCount')->nullable();
            $table->string('slug');
            $table->string('country');
            $table->boolean('isSerialTrackable')->nullable();
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
        Schema::dropIfExists('products');
    }
}
