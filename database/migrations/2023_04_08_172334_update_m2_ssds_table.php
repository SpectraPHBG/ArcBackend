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
            DB::table('m2_ssds')->where('id',1)->update(['image_link' => "/ssds/m2/SAMSUNG970EVO1TB-min.jpg"]);
            DB::table('m2_ssds')->where('id',2)->update(['image_link' => "/ssds/m2/SAMSUNG980PRO1TB-min.jpg"]);
            DB::table('m2_ssds')->where('id',3)->update(['image_link' => "/ssds/m2/CrucialP3Plus1TB-min.png"]);
            DB::table('m2_ssds')->where('id',4)->update(['image_link' => "/ssds/m2/WDBlueSN570NVMe1TB-min.jpg"]);
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
