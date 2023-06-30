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
            DB::table('cpus')->where('id',1)->update(['image_link' => "/cpus/ryzen5000-5-min.jpg"]);
            DB::table('cpus')->where('id',3)->update(['image_link' => "/cpus/ryzen5000-7-min.jpg"]);
            DB::table('cpus')->where('id',4)->update(['image_link' => "/cpus/ryzen5000-9-min.jpg"]);
            DB::table('cpus')->where('id',5)->update(['image_link' => "/cpus/i5-min.jpg"]);
            DB::table('cpus')->where('id',6)->update(['image_link' => "/cpus/i7-min.jpg"]);
            DB::table('cpus')->where('id',7)->update(['image_link' => "/cpus/ryzen5000-9-min.jpg"]);
            DB::table('cpus')->where('id',8)->update(['image_link' => "/cpus/ryzen5000-5-min.jpg"]);
            DB::table('cpus')->where('id',9)->update(['image_link' => "/cpus/i9-min.jpg"]);
            DB::table('cpus')->where('id',10)->update(['image_link' => "/cpus/i7-min.jpg"]);

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
