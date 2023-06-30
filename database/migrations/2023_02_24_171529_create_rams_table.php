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
        Schema::create('rams', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('brand_id');
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->string('name');
            $table->string('capacity');
            $table->unsignedBigInteger('memory_type_id');
            $table->foreign('memory_type_id')->references('id')->on('memory_types');
            $table->string('modules');
            $table->integer('speed');
            $table->double('voltage');
            $table->string('latency');
            $table->boolean('heat_spreader');
            $table->boolean('rgb_support');
            $table->boolean('ecc_support');
            $table->unique(array('name','capacity','modules'));
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
        Schema::dropIfExists('rams');
    }
};
