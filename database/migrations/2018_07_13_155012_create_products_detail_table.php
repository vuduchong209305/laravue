<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cpu');
            $table->string('ram');
            $table->integer('ssd')->nullable();
            $table->integer('hdd')->nullable();
            $table->decimal('weight', 2, 2)->nullable();
            $table->string('screen')->nullable();
            $table->string('os')->nullable();
            $table->string('vga')->nullable();
            $table->string('color')->nullable();
            $table->integer('battery')->nullable();
            $table->integer('warranty')->nullable();
            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
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
        Schema::dropIfExists('products_detail');
    }
}
