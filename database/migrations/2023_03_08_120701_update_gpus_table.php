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
        Schema::table('gpus', function (Blueprint $table) {
            $table->dropConstrainedForeignId("form_factor_id");
            $table->dropForeign('form_factor_id');
            $table->dropColumn('form_factor_id');
            $table->dropForeign('memory_clock');
            $table->dropForeign('hdcp');
            $table->integer('max_gpu_length');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('gpus', function (Blueprint $table) {
            //
        });
    }
};
