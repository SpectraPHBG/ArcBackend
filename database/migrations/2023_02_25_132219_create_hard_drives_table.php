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
        Schema::create('hard_drives', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('brand_id');
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->string('name')->unique();
            $table->unsignedBigInteger('interface_id');
            $table->foreign('interface_id')->references('id')->on('storage_interfaces');
            $table->double('form_factor');
            $table->string('capacity');
            $table->integer('rpm');
            $table->integer('cache');
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
        Schema::dropIfExists('hard_drives');
    }
};
