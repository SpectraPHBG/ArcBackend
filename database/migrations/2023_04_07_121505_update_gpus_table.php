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
            DB::table('gpus')->where('id',1)->update(['image_link' => "/gpus/AsusDualRadeonRX6400-min.jpg"]);
            DB::table('gpus')->where('id',2)->update(['image_link' => "/gpus/MsiGeforce3060Ventus2x-min.jpg"]);
            DB::table('gpus')->where('id',3)->update(['image_link' => "/gpus/MsiGeforge4070TiTrio-min.png"]);
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
