<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('trip_id');
            $table->unsignedBigInteger('start_station_id');
            $table->unsignedBigInteger('start_station_order');
            $table->unsignedBigInteger('end_station_id');
            $table->unsignedBigInteger('end_station_order');
            $table->enum('status' , ['reserved', 'canceled' ])->default('reserved');
            $table->boolean('is_trip_finished');
            $table->foreign('trip_id')->references('id')->on('trips');
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
        Schema::dropIfExists('seats');
    }
}
