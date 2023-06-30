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
            DB::table('hard_drives')->where('id',1)->update(['image_link' => "/hdds/SeagateBarraCudaST2000DM0082TB-min.jpg"]);
            DB::table('hard_drives')->where('id',2)->update(['image_link' => "/hdds/SeagateBarraCudaST1000DM0101TB-min.jpg"]);
            DB::table('hard_drives')->where('id',3)->update(['image_link' => "/hdds/WDBlueDesktop2TB-min.jpg"]);
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
