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
            DB::table('rams')->where('id',1)->update(['image_link' => "/rams/VengeancePLXBlack-min.png"]);
            DB::table('rams')->where('id',2)->update(['image_link' => "/rams/VengeanceRGBProBlack-min.jpg"]);
            DB::table('rams')->where('id',3)->update(['image_link' => "/rams/DominatorPlatinumRGBBlack-min.jpg"]);
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
