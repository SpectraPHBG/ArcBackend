<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class AirCoolerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ssdBrands = [
            [
                "name" => "Be Quiet!",
                "created_at" => Date::now(),
                "updated_at" => Date::now()
            ],
            [
                "name" => "ENERMAX",
                "created_at" => Date::now(),
                "updated_at" => Date::now()
            ]
        ];
        $data = [
            [
                'brand_id' => '16',
                'name' => 'Enermax ETS-T50 Axe ARGB CPU Air Cooler',
                'bearing' => 'Twister Bearing',
                'fans' => '1',
                'fan_mounting' => 'Vertical',
                'max_cooler_height' => '160',
                'power_connector' => '4',
                'rgb' => '1',
                'dimensions' => '138.7x112.5x160',
                'features' => "Synchronize RGB lighting via addressable RGB headers (5V/D/-/G) of motherboards from ASUS Aura Sync, GIGABYTE RGB Fusion, MSI Mystic Light Sync and ASRock Polychrome

PWM power cable to connect the fan to create constant rainbow RGB lighting effects, no software or adaptor needed

High pressure blade design is a precision engineering of the blade angle and shape calculation

Patented air guide with rotatable grill for preferred airflow direction

Patented Pressure Differential Flow (PDF) design uses differential wind pressure to increase 15% more airflow

Patented Vortex Generation Flow (VGF) design to increase air convection around the heat pipe

Unique air path creating high Vacuum Effect (VEF) to optimize airflow

Heat-pipe Direct Touch (HDT) technology to ensure rapid thermal conduction and eliminate CPU hot spots

Asymmetric heat pipe design allows extra space for ideal RAM compatibility",
                'official_link' => 'https://www.enermaxeu.com/products/cpu-cooling/air-cooling/ets-t50-axe-argb/',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
            [
                'brand_id' => '15',
                'name' => 'Be Quiet! Pure Rock 2 Black',
                'bearing' => 'Rifle',
                'fans' => '2',
                'fan_mounting' => 'Vertical',
                'max_cooler_height' => '155',
                'power_connector' => '4',
                'rgb' => '0',
                'dimensions' => '88 x 121 x 155',
                'features' => "Heat pipe direct touch",
                'official_link' => 'https://www.bequiet.com/en/cpucooler/1842',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
        ];

        DB::beginTransaction();

        try {
            DB::table('brands')->insert($ssdBrands);
            DB::table('air_coolers')->insert($data);

            DB::commit();
        }
        catch (\Exception $e){
            DB::rollBack();
        }
    }
}
