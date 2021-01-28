<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetVaccinoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pet_vaccino', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pet_id');
            $table->unsignedBigInteger('vaccino_id');
            //relazioni
            $table->foreign('pet_id')->references('id')->on('pets')->onDelete('cascade');
            $table->foreign('vaccino_id')->references('id')->on('vaccinos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pet_vaccino');
    }
}
