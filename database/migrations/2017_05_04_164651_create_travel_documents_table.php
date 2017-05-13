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
            $table->string('card_id')->nullable();
            $table->string('cargo_letter_id', 12)->unique();
            $table->string('address');
            $table->dateTime('arrive_at');
            $table->dateTime('unloading_at')->nullable();
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
