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
        Schema::table('air_coolers', function (Blueprint $table) {
            $table->integer('max_cooler_height');
            $table->dropColumn('consumption');
            $table->dropColumn('air_flow');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('air_coolers', function (Blueprint $table) {
            //
        });
    }
};
