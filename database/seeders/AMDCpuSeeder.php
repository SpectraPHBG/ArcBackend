<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class AMDCpuSeeder extends Seeder
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
                'brand_id' => '1',
                'name' => 'AMD Ryzen 9 5900X',
                'socket_id' => '5',
                'cores' => '12',
                'threads' => '24',
                'base_clock' => '3.7',
                'turbo_clock' => '4.8',
                'memory_id' => '4',
                'memory_speed' => '3200',
                'hyperthread_support' => '1',
                'caches' => 'L2: 6MB, L3: 64MB',
                'tdp' => '105',
                'max_temp' => '90',
                'supported_os' =>
                    'Windows 11 (64-bit) Edition
                    Windows 10 - 64-Bit Edition
                    RHEL x86 64-Bit
                    Ubuntu x86 64-Bit
                    *Operating System (OS) support will vary by manufacturer.',
                'official_link' => 'https://www.amd.com/en/products/cpu/amd-ryzen-9-5900x',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
            [
                'brand_id' => '1',
                'name' => 'AMD Ryzen 5 5600',
                'socket_id' => '5',
                'cores' => '6',
                'threads' => '12',
                'base_clock' => '3.7',
                'turbo_clock' => '4.6',
                'memory_id' => '4',
                'memory_speed' => '3200',
                'hyperthread_support' => '1',
                'caches' => 'L1: 384KB L2: 3MB, L3: 32MB',
                'tdp' => '65',
                'max_temp' => '90',
                'supported_os' =>
                    'Windows 11 - 64-Bit Edition
                    Windows 10 - 64-Bit Edition
                    RHEL x86 64-Bit
                    Ubuntu x86 64-Bit
                    *Operating System (OS) support will vary by manufacturer.',
                'official_link' => 'https://www.amd.com/en/products/cpu/amd-ryzen-9-5900x',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ]
        ];
        DB::table('cpus')->insert($data);
    }
}
