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
        Schema::create('expansion_slots_motherboards', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('slot_id');
            $table->unsignedBigInteger('motherboard_id');
            $table->foreign('slot_id')->references('id')->on('expansion_slots');
            $table->foreign('motherboard_id')->references('id')->on('motherboards');
            $table->integer('amount');
            $table->unique(array('slot_id','motherboard_id'));
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
        Schema::dropIfExists('expansion_slots_motherboards');
    }
};
