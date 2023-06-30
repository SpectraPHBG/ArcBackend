<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class SataSSDSeeder extends Seeder
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
                "name" => "SAMSUNG",
                "created_at" => Date::now(),
                "updated_at" => Date::now()
            ],
            [
                "name" => "Crucial",
                "created_at" => Date::now(),
                "updated_at" => Date::now()
            ],
        ];
        DB::table('brands')->insert($ssdBrands);
        $data = [
            [
                'brand_id' => '10',
                'name' => 'SAMSUNG 870 EVO Series 2.5" 1TB',
                'interface_id' => '3',
                'form_factor' => '2.5',
                'capacity' => '1TB',
                'max_read' => '560',
                'max_write' => '530',
                'mtbf' => '1500000',
                'terabyte_written' => '1200',
                'features' => '',
                'official_link' => 'https://www.samsung.com/us/computing/memory-storage/solid-state-drives/870-evo-sata-2-5-ssd-1tb-mz-77e1t0b-am/#specs',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
            [
                'brand_id' => '11',
                'name' => 'Crucial MX500 SATA 2.5" 500GB',
                'interface_id' => '3',
                'form_factor' => '2.5',
                'capacity' => '500GB',
                'max_read' => '560',
                'max_write' => '510',
                'mtbf' => '1800000',
                'terabyte_written' => '360',
                'features' => 'Dynamic Write Acceleration
                            Redundant Array of Independent NAND (RAIN)
                            Multistep Data Integrity Algorithm
                            Adaptive Thermal Protection
                            Integrated Power Loss Immunity
                            Active Garbage Collection
                            TRIM Support
                            Self-Monitoring and Reporting Technology (SMART)
                            Error Correction Code (ECC)
                            Device Sleep Support',
                'official_link' => 'https://www.crucial.com/ssd/mx500/ct500mx500ssd1',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
            [
                'brand_id' => '11',
                'name' => 'Crucial BX500 SATA 2.5" 240GB',
                'interface_id' => '3',
                'form_factor' => '2.5',
                'capacity' => '240GB',
                'max_read' => '540',
                'max_write' => '500',
                'mtbf' => '80000',
                'terabyte_written' => '360',
                'features' => 'Multistep Data Integrity Algorithm
                            Thermal Monitoring
                            SLC Write Acceleration
                            Active Garbage Collection
                            TRIM Support
                            Self-Monitoring and Reporting Technology (SMART)
                            Error Correction Code (ECC)',
                'official_link' => 'https://www.crucial.com/ssd/bx500/ct240bx500ssd1',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
            [
                'brand_id' => '10',
                'name' => 'SAMSUNG 870 QVO Series SATA 2.5" 2TB',
                'interface_id' => '3',
                'form_factor' => '2.5',
                'capacity' => '2TB',
                'max_read' => '560',
                'max_write' => '530',
                'mtbf' => '1500000',
                'terabyte_written' => '720',
                'features' => '',
                'official_link' => 'https://www.samsung.com/us/computing/memory-storage/solid-state-drives/870-qvo-sata-iii-2-5--ssd-2tb-mz-77q2t0b-am/#specs',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
        ];
        DB::table('sata_ssds')->insert($data);
    }
}
