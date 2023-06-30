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
        Schema::create('cpus', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('brand_id');
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->string('name')->unique();
            $table->unsignedBigInteger('socket_id');
            $table->foreign('socket_id')->references('id')->on('sockets');
            $table->string('cores');
            $table->string('threads');
            $table->double('base_clock');
            $table->double('turbo_clock');
            $table->double('base_clock2')->nullable();
            $table->double('turbo_clock2')->nullable();
            $table->unsignedBigInteger('memory_id');
            $table->foreign('memory_id')->references('id')->on('memory_types');
            $table->integer('memory_speed');
            $table->unsignedBigInteger('memory2_id')->nullable();
            $table->foreign('memory2_id')->references('id')->on('memory_types');
            $table->integer('memory2_speed')->nullable();
            $table->boolean('hyperthread_support');
            $table->string('caches');
            $table->double('tdp');
            $table->integer('max_temp');
            $table->string('supported_os');
            $table->string('integrated_gpu')->nullable();
            $table->integer('gpu_frequency')->nullable();
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
        Schema::dropIfExists('cpus');
    }
};
