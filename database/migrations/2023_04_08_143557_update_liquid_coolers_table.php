<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        DB::beginTransaction();

        try {
            DB::table('liquid_coolers')->where('id',1)->update(['image_link' => "/liquidCoolers/MSIMagCoreLiquid360R-min.png"]);
            DB::table('liquid_coolers')->where('id',2)->update(['image_link' => "/liquidCoolers/MSIMagCoreLiquidP240-min.png"]);
            DB::commit();
        }
        catch (\Exception $e){
            DB::rollBack();
            throw $e;
        }
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
