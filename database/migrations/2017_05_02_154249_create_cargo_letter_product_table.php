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
            $table->integer('cargo_letter_id')->unsigned()->index();
            $table->integer('product_id')->unsigned();
            $table->integer('quantity')->unsigned();
            $table->string('note');
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
