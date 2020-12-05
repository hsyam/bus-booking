<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoutesStationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routes_stations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('route_id') ;
            $table->unsignedBigInteger('station_id');
            $table->integer('station_order');

            $table->foreign('station_id')->references('id')->on('stations');
            $table->foreign('route_id')->references('id')->on('routes');
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
        Schema::dropIfExists('routes_stations');
    }
}
