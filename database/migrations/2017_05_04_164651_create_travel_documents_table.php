<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTravelDocumentsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travel_documents', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cargo_letter_id')->unsigned();
            $table->string('address');
            $table->dateTime('arrive_at');
            $table->dateTime('unloading_at');
            $table->timestamps();
            $table->foreign('cargo_letter_id')->references('id')->on('cargo_letters');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('travel_documents');
    }
}
