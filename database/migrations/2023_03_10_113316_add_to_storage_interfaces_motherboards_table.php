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

        $storageInterfacesMotherboards = [
            [
                'interface_id' => '3',
                'board_id' => '1',
                'name' => 'Sata',
                'm2_form_factors' => null,
                'amount' => '6',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
            [
                'interface_id' => '3',
                'board_id' => '1',
                'name' => 'M2_1',
                'm2_form_factors' => 'M.2 2242/ M.2 2260/ M.2 2280/ M.2 22110',
                'amount' => '1',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
            [
                'interface_id' => '5',
                'board_id' => '1',
                'name' => 'M2_1',
                'm2_form_factors' => 'M.2 2242/ M.2 2260/ M.2 2280/ M.2 22110',
                'amount' => '1',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
            [
                'interface_id' => '7',
                'board_id' => '1',
                'name' => 'M2_1',
                'm2_form_factors' => 'M.2 2242/ M.2 2260/ M.2 2280/ M.2 22110',
                'amount' => '1',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
            [
                'interface_id' => '5',
                'board_id' => '1',
                'name' => 'M2_2',
                'm2_form_factors' => 'M.2 2242/ M.2 2260/ M.2 2280',
                'amount' => '1',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],

            [
                'interface_id' => '3',
                'board_id' => '2',
                'name' => 'Sata',
                'amount' => '6',
                'm2_form_factors' => null,
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
            [
                'interface_id' => '7',
                'board_id' => '2',
                'name' => 'M2_1',
                'm2_form_factors' => 'M.2 2260/ M.2 2280/ M.2 22110',
                'amount' => '1',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
            [
                'interface_id' => '7',
                'board_id' => '2',
                'name' => 'M2_2',
                'm2_form_factors' => 'M.2 2260/ M.2 2280',
                'amount' => '1',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
            [
                'interface_id' => '3',
                'board_id' => '2',
                'name' => 'M2_3',
                'm2_form_factors' => 'M.2 2242/ M.2 2260/ M.2 2280',
                'amount' => '1',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
            [
                'interface_id' => '7',
                'board_id' => '2',
                'name' => 'M2_3',
                'm2_form_factors' => 'M.2 2242/ M.2 2260/ M.2 2280',
                'amount' => '1',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
            [
                'interface_id' => '3',
                'board_id' => '2',
                'name' => 'M2_4',
                'm2_form_factors' => 'M.2 2242/ M.2 2260/ M.2 2280',
                'amount' => '1',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
            [
                'interface_id' => '7',
                'board_id' => '2',
                'name' => 'M2_4',
                'm2_form_factors' => 'M.2 2242/ M.2 2260/ M.2 2280',
                'amount' => '1',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ]
        ];
        DB::beginTransaction();

        try {
            DB::table('storage_interfaces_motherboards')->insert($storageInterfacesMotherboards);

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
