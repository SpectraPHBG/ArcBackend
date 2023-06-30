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
        Schema::table('cases', function (Blueprint $table) {
            $table->string('psu_mount');
            $table->dropColumn('dust_filters');
            $table->dropColumn('expansion_slots');
            $table->dropColumn('storage_slots');
            $table->text('features')->nullable();
            $table->string('included_fans')->change();
            $table->integer('storage_35_bays');
            $table->integer('storage_25_bays');
            $table->string('official_link');
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
