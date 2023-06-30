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
        Schema::create('power_supplies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('brand_id');
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->string('name')->unique();
            $table->unsignedBigInteger('form_factor_id');
            $table->foreign('form_factor_id')->references('id')->on('form_factors');
            $table->integer('max_power');
            $table->string('fans');
            $table->string('certificate')->nullable();
            $table->text('connectors');
            $table->string('input_voltage');
            $table->double('efficiency');
            $table->string('modular')->nullable();
            $table->string('sli')->nullable();
            $table->string('crossfire')->nullable();
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
        Schema::dropIfExists('power_supplies');
    }
};
