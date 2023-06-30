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
            DB::table('sata_ssds')->where('id',1)->update(['image_link' => "/ssds/sata/SAMSUNG870EVO1TB-min.jpg"]);
            DB::table('sata_ssds')->where('id',2)->update(['image_link' => "/ssds/sata/CrucialMX50050GB-min.jpg"]);
            DB::table('sata_ssds')->where('id',3)->update(['image_link' => "/ssds/sata/CrucialBX500240GB-min.jpg"]);
            DB::table('sata_ssds')->where('id',4)->update(['image_link' => "/ssds/sata/SAMSUNG8702TB-min.jpg"]);
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
