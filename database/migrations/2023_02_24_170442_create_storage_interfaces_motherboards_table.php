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
        Schema::create('storage_interfaces_motherboards', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('interface_id');
            $table->unsignedBigInteger('board_id');
            $table->foreign('interface_id')->references('id')->on('storage_interfaces');
            $table->foreign('board_id')->references('id')->on('motherboards');
            $table->integer('amount');
            $table->unique(array('interface_id','board_id'));
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
        Schema::dropIfExists('storage_interfaces_motherboards');
    }
};
