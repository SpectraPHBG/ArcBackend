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
        Schema::create('air_coolers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('brand_id');
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->string('name')->unique();
            $table->string('bearing');
            $table->integer('fans');
            $table->string('fan_mounting');
            $table->double('consumption');
            $table->string('power_connector');
            $table->string('air_flow');
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
        Schema::dropIfExists('air_coolers');
    }
};
