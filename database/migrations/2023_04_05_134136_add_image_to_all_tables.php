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
        Schema::table('cpus', function (Blueprint $table) {
            $table->string('image_link')->nullable();
        });
        Schema::table('gpus', function (Blueprint $table) {
            $table->string('image_link')->nullable();
        });
        Schema::table('cases', function (Blueprint $table) {
            $table->string('image_link')->nullable();
        });
        Schema::table('rams', function (Blueprint $table) {
            $table->string('image_link')->nullable();
        });
        Schema::table('hard_drives', function (Blueprint $table) {
            $table->string('image_link')->nullable();
        });
        Schema::table('liquid_coolers', function (Blueprint $table) {
            $table->string('image_link')->nullable();
        });
        Schema::table('air_coolers', function (Blueprint $table) {
            $table->string('image_link')->nullable();
        });
        Schema::table('m2_ssds', function (Blueprint $table) {
            $table->string('image_link')->nullable();
        });
        Schema::table('motherboards', function (Blueprint $table) {
            $table->string('image_link')->nullable();
        });
        Schema::table('power_supplies', function (Blueprint $table) {
            $table->string('image_link')->nullable();
        });
        Schema::table('sata_ssds', function (Blueprint $table) {
            $table->string('image_link')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
};
