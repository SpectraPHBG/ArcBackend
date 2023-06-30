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
        Schema::table('storage_interfaces_motherboards', function (Blueprint $table) {
            $table->string('name');
            $table->string('m2_form_factors')->nullable();
            $table->dropUnique('storage_interfaces_motherboards_interface_id_board_id_unique');
            $table->unique(array('interface_id','board_id','name','m2_form_factors'),'uq_name_interface_board_name_form_factor');
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
