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
        Schema::table('liquid_coolers', function (Blueprint $table) {
            $table->dropColumn('radiator');
            $table->dropColumn('consumption');
            $table->dropColumn('dimensions');
            $table->dropColumn('fan_mounting');
            $table->dropColumn('max_pressure');
            $table->dropColumn('air_flow');
            $table->dropColumn('pump_voltage');
            $table->dropColumn('power_connector_pins');
            $table->string('radiator_size');
            $table->integer('fan_connector');
            $table->string('fan_size');
            $table->integer('fan_count');
            $table->string('fan_rpm');
            $table->double('fan_noise');
            $table->double('fan_consumption');
            $table->integer('pump_connector');
            $table->string('pump_rpm')->change();
            $table->double('pump_noise');
            $table->double('pump_consumption');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
