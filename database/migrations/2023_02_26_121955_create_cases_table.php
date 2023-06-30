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
        Schema::create('cases', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('brand_id');
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->string('name')->unique();
            $table->unsignedBigInteger('factor_id');
            $table->foreign('factor_id')->references('id')->on('case_form_factors');
            $table->string('io_ports');
            $table->integer('expansion_slots');
            $table->string('storage_slots');
            $table->text('air_cooling_support');
            $table->text('liquid_cooling_support');
            $table->string('dust_filters');
            $table->boolean('included_fans')->nullable();
            $table->integer('max_psu_length');
            $table->integer('max_cooler_height');
            $table->integer('max_gpu_length');
            $table->string('dimensions');
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
        Schema::dropIfExists('cases');
    }
};
