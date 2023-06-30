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
            DB::table('power_supplies')->where('id',1)->update(['image_link' => "/psus/ENERMAXCyberBron500W-min.jpg"]);
            DB::table('power_supplies')->where('id',2)->update(['image_link' => "/psus/CorsairRMx2021RM850x-min.jpg"]);
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
