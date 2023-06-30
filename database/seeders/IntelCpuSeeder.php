<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class IntelCpuSeeder extends Seeder
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
                'name' => 'Intel Core i9-12900K',
                'socket_id' => '3',
                'cores' => '16 (8P+8E)',
                'threads' => '24',
                'base_clock' => '3.2',
                'turbo_clock' => '5.1',
                'memory_id' => '4',
                'memory_speed' => '3200',
                'base_clock2' => '2.4',
                'turbo_clock2' => '3.9',
                'memory2_id' => '5',
                'memory2_speed' => '4800',
                'hyperthread_support' => '1',
                'integrated_gpu' => 'Intel UHD Graphics 770',
                'gpu_frequency' => '300',
                'caches' => 'L2: 6MB, L3: 64MB',
                'tdp' => '125',
                'max_temp' => '100',
                'supported_os' =>
                    'Windows 11 (64-bit) Edition
                    Windows 10 - 64-Bit Edition
                    RHEL x86 64-Bit
                    Ubuntu x86 64-Bit
                    *Operating System (OS) support will vary by manufacturer.',
                'official_link' => 'https://ark.intel.com/content/www/us/en/ark/products/134599/intel-core-i912900k-processor-30m-cache-up-to-5-20-ghz.html',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
            [
                'brand_id' => '1',
                'name' => 'Intel Core i7-12700',
                'socket_id' => '3',
                'cores' => '12 (8P+4E)',
                'threads' => '20',
                'base_clock' => '2.1',
                'turbo_clock' => '1.6',
                'memory_id' => '4',
                'memory_speed' => '3200',
                'base_clock2' => '4.8',
                'turbo_clock2' => '3.6',
                'memory2_id' => '5',
                'memory2_speed' => '4800',
                'hyperthread_support' => '1',
                'integrated_gpu' => 'Intel UHD Graphics 770',
                'gpu_frequency' => '300',
                'caches' => 'L2: 12MB, L3: 25MB',
                'tdp' => '65',
                'max_temp' => '100',
                'supported_os' =>
                    'Windows 11 (64-bit) Edition
                    Windows 10 - 64-Bit Edition
                    RHEL x86 64-Bit
                    Ubuntu x86 64-Bit
                    *Operating System (OS) support will vary by manufacturer.',
                'official_link' => 'https://ark.intel.com/content/www/us/en/ark/products/134591/intel-core-i712700-processor-25m-cache-up-to-4-90-ghz.html',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ]
        ];
        DB::table('cpus')->insert($data);
    }
}
