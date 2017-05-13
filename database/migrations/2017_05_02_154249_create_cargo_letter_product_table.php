<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCargoLetterProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cargo_letter_product', function (Blueprint $table) {
            $table->string('cargo_letter_id', 12)->index();
            $table->integer('product_id')->unsigned();
            $table->integer('quantity')->unsigned();
            $table->string('note')->nullable();

            $table->foreign('cargo_letter_id')->references('id')->on('cargo_letters')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cargo_letter_product');
    }
}
