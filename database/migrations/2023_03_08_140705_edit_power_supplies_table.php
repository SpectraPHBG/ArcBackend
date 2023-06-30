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
        Schema::table('power_supplies', function (Blueprint $table) {
//            $table->dropForeign('power_supplies_form_factor_id_foreign');
//            $table->dropColumn('form_factor_id');
            $table->dropColumn('efficiency');
            $table->dropColumn('sli');
            $table->dropColumn('crossfire');
            $table->integer('max_psu_length');
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
