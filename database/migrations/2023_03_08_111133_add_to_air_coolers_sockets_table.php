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
        DB::beginTransaction();
        $socketCompatibility = [
            [
                'socket_id' => '3',
                'cooler_id' => '2',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
            [
                'socket_id' => '5',
                'cooler_id' => '2',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
            [
                'socket_id' => '8',
                'cooler_id' => '2',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
            [
                'socket_id' => '9',
                'cooler_id' => '2',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
            [
                'socket_id' => '10',
                'cooler_id' => '2',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
            [
                'socket_id' => '11',
                'cooler_id' => '2',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
            [
                'socket_id' => '14',
                'cooler_id' => '2',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
            [
                'socket_id' => '15',
                'cooler_id' => '2',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
            [
                'socket_id' => '19',
                'cooler_id' => '2',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
            [
                'socket_id' => '4',
                'cooler_id' => '1',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
            [
                'socket_id' => '5',
                'cooler_id' => '1',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
            [
                'socket_id' => '6',
                'cooler_id' => '1',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
            [
                'socket_id' => '8',
                'cooler_id' => '1',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
            [
                'socket_id' => '9',
                'cooler_id' => '1',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
            [
                'socket_id' => '10',
                'cooler_id' => '1',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
            [
                'socket_id' => '11',
                'cooler_id' => '1',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
            [
                'socket_id' => '12',
                'cooler_id' => '1',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
            [
                'socket_id' => '13',
                'cooler_id' => '1',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
            [
                'socket_id' => '14',
                'cooler_id' => '1',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
            [
                'socket_id' => '15',
                'cooler_id' => '1',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
            [
                'socket_id' => '16',
                'cooler_id' => '1',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
            [
                'socket_id' => '17',
                'cooler_id' => '1',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
            [
                'socket_id' => '18',
                'cooler_id' => '1',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
            [
                'socket_id' => '24',
                'cooler_id' => '1',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
            [
                'socket_id' => '25',
                'cooler_id' => '1',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
            [
                'socket_id' => '20',
                'cooler_id' => '1',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
            [
                'socket_id' => '3',
                'cooler_id' => '1',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
            [
                'socket_id' => '19',
                'cooler_id' => '1',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
        ];

        try {
            DB::table('air_coolers_sockets')->insert($socketCompatibility);

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
