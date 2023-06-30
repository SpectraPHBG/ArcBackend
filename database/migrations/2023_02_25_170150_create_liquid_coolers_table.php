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
        Schema::create('liquid_coolers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('brand_id');
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->string('name')->unique();
            $table->integer('radiator');
            $table->string('fan_mounting');
            $table->double('consumption');
            $table->double('max_pressure');
            $table->integer('power_connector_pins');
            $table->string('air_flow');
            $table->integer('pump_rpm');
            $table->integer('pump_voltage');
            $table->integer('tube_length');
            $table->boolean('rgb');
            $table->string('dimensions');
            $table->text('features')->nullable();
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
        Schema::dropIfExists('liquid_coolers');
    }
};
