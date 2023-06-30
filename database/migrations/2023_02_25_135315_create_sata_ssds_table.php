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
        Schema::create('sata_ssds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('brand_id');
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->string('name')->unique();
            $table->unsignedBigInteger('interface_id');
            $table->foreign('interface_id')->references('id')->on('storage_interfaces');
            $table->double('form_factor');
            $table->string('capacity');
            $table->integer('max_read');
            $table->integer('max_write');
            $table->double('mtbf');
            $table->integer('terabyte_written');
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
        Schema::dropIfExists('sata_ssds');
    }
};
