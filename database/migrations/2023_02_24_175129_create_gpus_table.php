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
        Schema::create('gpus', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('brand_id');
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->string('name')->unique();
            $table->unsignedBigInteger('chipset_id');
            $table->foreign('chipset_id')->references('id')->on('graphic_chipsets');
            $table->unsignedBigInteger('expansion_slot_id');
            $table->foreign('expansion_slot_id')->references('id')->on('expansion_slots');
            $table->unsignedBigInteger('form_factor_id');
            $table->foreign('form_factor_id')->references('id')->on('form_factors');
            $table->string('clock_speeds');
            $table->integer('vram');
            $table->unsignedBigInteger('vram_id');
            $table->foreign('vram_id')->references('id')->on('graphic_memory_types');
            $table->integer('memory_clock');
            $table->integer('memory_bus');
            $table->string('apis');
            $table->string('ports');
            $table->string('max_resolution');
            $table->string('cooler');
            $table->string('tdp');
            $table->integer('recommended_wattage');
            $table->string('power_connector')->nullable();
            $table->boolean('hdcp');
            $table->text('features')->nullable();
            $table->string('dimensions');
            $table->string('official_link');
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
        Schema::dropIfExists('gpus');
    }
};
