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
        $expansionSlots = [
            [
                "name" => "PCI Express 5.0 x16",
                "created_at" => Date::now(),
                "updated_at" => Date::now()
            ],
            [
                "name" => "PCI Express 5.0 x8",
                "created_at" => Date::now(),
                "updated_at" => Date::now()
            ],
            [
                "name" => "PCI Express 5.0 x4",
                "created_at" => Date::now(),
                "updated_at" => Date::now()
            ],
            [
                "name" => "PCI Express 5.0 x1",
                "created_at" => Date::now(),
                "updated_at" => Date::now()
            ]
        ];

        $expansionSlotsMotherboards = [
            [
                'slot_id' => '1',
                'motherboard_id' => '1',
                'amount' => '1',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
            [
                'slot_id' => '2',
                'motherboard_id' => '1',
                'amount' => '1',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ]
            ,
            [
                'slot_id' => '5',
                'motherboard_id' => '1',
                'amount' => '2',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
            [
                'slot_id' => '9',
                'motherboard_id' => '2',
                'amount' => '2',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
            [
                'slot_id' => '1',
                'motherboard_id' => '2',
                'amount' => '2',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ]
            ,
            [
                'slot_id' => '5',
                'motherboard_id' => '2',
                'amount' => '1',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ]
        ];
        DB::beginTransaction();

        try {
            DB::table('expansion_slots')->insert($expansionSlots);
            DB::table('expansion_slots_motherboards')->insert($expansionSlotsMotherboards);

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
