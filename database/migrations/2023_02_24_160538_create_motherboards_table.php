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
        Schema::create('motherboards', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('brand_id');
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->unsignedBigInteger('form_factor_id');
            $table->foreign('form_factor_id')->references('id')->on('form_factors');
            $table->string('name')->unique();
            $table->unsignedBigInteger('socket_id');
            $table->foreign('socket_id')->references('id')->on('sockets');
            $table->unsignedBigInteger('chipset_id');
            $table->foreign('chipset_id')->references('id')->on('chipsets');
            $table->unsignedBigInteger('memory_type_id');
            $table->foreign('memory_type_id')->references('id')->on('memory_types');
            $table->text('memories_support');
            $table->string('max_memory');
            $table->boolean('dual_ch_support');
            $table->string('ecc_support');
            $table->string('buffer_support');
            $table->string('onboard_video')->nullable();
            $table->string('onboard_audio')->nullable();
            $table->string('onboard_lan')->nullable();
            $table->string('io_ports');
            $table->string('usb_ports');
            $table->string('dimensions');
            $table->text('features');
            $table->boolean('led');
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
        Schema::dropIfExists('motherboards');
    }
};
