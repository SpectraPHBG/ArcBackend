<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('air_coolers_sockets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('socket_id');
            $table->foreign('socket_id')->references('id')->on('sockets');
            $table->unsignedBigInteger('cooler_id');
            $table->foreign('cooler_id')->references('id')->on('air_coolers');
            $table->unique(array('socket_id','cooler_id'));
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
        Schema::dropIfExists('air_coolers_sockets');
    }
};
