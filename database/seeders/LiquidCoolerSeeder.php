<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class LiquidCoolerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'brand_id' => '8',
                'name' => 'MSI MAG Core Liquid 360R V2',
                'radiator_size' => '394x120x27',
                'fan_size' => '120x120x25',
                'fan_connector' => '4',
                'fan_count' => '3',
                'fan_rpm' => '500~2000 ± 10%',
                'fan_noise' => '34.3',
                'fan_consumption' => '1.8',
                'pump_rpm' => '2100 ± 10%',
                'pump_consumption' => '4.08',
                'pump_noise' => '18',
                'pump_connector' => '4',
                'tube_length' => '400',
                'rgb' => '1',
                'features' => "",
                'official_link' => 'https://www.msi.com/Liquid-Cooling/MAG-CORELIQUID-360R-V2/Specification',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
            [
                'brand_id' => '8',
                'name' => 'MSI MAG CORELIQUID P240',
                'radiator_size' => '276x120x27',
                'fan_size' => '120x120x25',
                'fan_connector' => '4',
                'fan_count' => '3',
                'fan_rpm' => '500~2000 RPM ± 10%',
                'fan_noise' => '34.3',
                'fan_consumption' => '1.8',
                'pump_rpm' => '4200 ± 10%',
                'pump_consumption' => '4.08',
                'pump_noise' => '18',
                'pump_connector' => '4',
                'tube_length' => '400',
                'rgb' => '1',
                'features' => "",
                'official_link' => 'https://www.msi.com/Liquid-Cooling/MAG-CORELIQUID-360R-V2',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
        ];
        DB::table('liquid_coolers')->insert($data);
        $sockets = [
            [
                "brand_id" => 2,
                "name" => "LGA 1150",
                "created_at" => Date::now(),
                "updated_at" => Date::now()
            ],
            [
                "brand_id" => 2,
                "name" => "LGA 1151",
                "created_at" => Date::now(),
                "updated_at" => Date::now()
            ],
            [
                "brand_id" => 2,
                "name" => "LGA 1155",
                "created_at" => Date::now(),
                "updated_at" => Date::now()
            ],
            [
                "brand_id" => 2,
                "name" => "LGA 1200",
                "created_at" => Date::now(),
                "updated_at" => Date::now()
            ],
            [
                "brand_id" => 2,
                "name" => "LGA 1366",
                "created_at" => Date::now(),
                "updated_at" => Date::now()
            ],
            [
                "brand_id" => 2,
                "name" => "LGA 2011",
                "created_at" => Date::now(),
                "updated_at" => Date::now()
            ],
            [
                "brand_id" => 2,
                "name" => "LGA 2011-3",
                "created_at" => Date::now(),
                "updated_at" => Date::now()
            ],
            [
                "brand_id" => 2,
                "name" => "LGA 2066",
                "created_at" => Date::now(),
                "updated_at" => Date::now()
            ],
            [
                "brand_id" => 1,
                "name" => "FM2+",
                "created_at" => Date::now(),
                "updated_at" => Date::now()
            ],
            [
                "brand_id" => 1,
                "name" => "FM1",
                "created_at" => Date::now(),
                "updated_at" => Date::now()
            ],
            [
                "brand_id" => 1,
                "name" => "FM2",
                "created_at" => Date::now(),
                "updated_at" => Date::now()
            ],
            [
                "brand_id" => 1,
                "name" => "AM3+",
                "created_at" => Date::now(),
                "updated_at" => Date::now()
            ],
            [
                "brand_id" => 1,
                "name" => "AM2+",
                "created_at" => Date::now(),
                "updated_at" => Date::now()
            ],
            [
                "brand_id" => 1,
                "name" => "SocketTR4",
                "created_at" => Date::now(),
                "updated_at" => Date::now()
            ],
            [
                "brand_id" => 1,
                "name" => "sTRX4",
                "created_at" => Date::now(),
                "updated_at" => Date::now()
            ],
            [
                "brand_id" => 1,
                "name" => "SP3",
                "created_at" => Date::now(),
                "updated_at" => Date::now()
            ],
            [
                "brand_id" => 2,
                "name" => "LGA 1156",
                "created_at" => Date::now(),
                "updated_at" => Date::now()
            ],
            [
                "brand_id" => 1,
                "name" => "AM2",
                "created_at" => Date::now(),
                "updated_at" => Date::now()
            ],
        ];
        DB::table('sockets')->insert($sockets);
        $socketCompatibility = [
            [
                'socket_id' => '23',
                'cooler_id' => '1',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
            [
                'socket_id' => '22',
                'cooler_id' => '1',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
            [
                'socket_id' => '21',
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
                'socket_id' => '19',
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
                'socket_id' => '17',
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
                'socket_id' => '15',
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
                'socket_id' => '13',
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
                'socket_id' => '11',
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
                'socket_id' => '9',
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
                'socket_id' => '3',
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
        ];
        DB::table('liquid_coolers_sockets')->insert($socketCompatibility);

        $socketCompatibility2 = [
            [
                'socket_id' => '25',
                'cooler_id' => '2',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
            [
                'socket_id' => '24',
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
                'socket_id' => '12',
                'cooler_id' => '2',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
            [
                'socket_id' => '13',
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
                'socket_id' => '3',
                'cooler_id' => '2',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
            [
                'socket_id' => '20',
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
                'socket_id' => '17',
                'cooler_id' => '2',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
            [
                'socket_id' => '18',
                'cooler_id' => '2',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
            [
                'socket_id' => '16',
                'cooler_id' => '2',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
            [
                'socket_id' => '4',
                'cooler_id' => '2',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
            [
                'socket_id' => '6',
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
        ];
        DB::table('liquid_coolers_sockets')->insert($socketCompatibility2);
    }
}
