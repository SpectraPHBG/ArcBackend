<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Date;
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
        Schema::table('cases_mb_size_support', function (Blueprint $table) {
            //
        });
        $caseMbSize = [
            [
                'case_id' => '1',
                'factor_id' => '1',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
            [
                'case_id' => '1',
                'factor_id' => '2',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
            [
                'case_id' => '1',
                'factor_id' => '3',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
            [
                'case_id' => '1',
                'factor_id' => '4',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
            [
                'case_id' => '2',
                'factor_id' => '1',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
            [
                'case_id' => '2',
                'factor_id' => '2',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
            [
                'case_id' => '2',
                'factor_id' => '3',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
            [
                'case_id' => '2',
                'factor_id' => '4',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ]
        ];
        DB::beginTransaction();

        try {
            DB::table('case_mb_size_support')->insert($caseMbSize);

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

    }
};
