<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class M2SSDSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $m2FormFactors = [
            [
                "name" => "M.2 2280",
                "created_at" => Date::now(),
                "updated_at" => Date::now()
            ],
            [
                "name" => "M.2 2242",
                "created_at" => Date::now(),
                "updated_at" => Date::now()
            ],
            [
                "name" => "M.2 2230",
                "created_at" => Date::now(),
                "updated_at" => Date::now()
            ],
            [
                "name" => "M.2 22110",
                "created_at" => Date::now(),
                "updated_at" => Date::now()
            ],
        ];
        DB::table('m2_form_factors')->insert($m2FormFactors);
        $newStorageInterfaces = [
            [
                "name" => "PCI Express 3.0 x2",
                "created_at" => Date::now(),
                "updated_at" => Date::now()
            ],
            [
                "name" => "PCI Express 3.0 x4",
                "created_at" => Date::now(),
                "updated_at" => Date::now()
            ],
            [
                "name" => "PCI Express 3.0 x8",
                "created_at" => Date::now(),
                "updated_at" => Date::now()
            ],
            [
                "name" => "PCI Express 4.0 x4",
                "created_at" => Date::now(),
                "updated_at" => Date::now()
            ]
        ];
        DB::table('storage_interfaces')->insert($newStorageInterfaces);
        $ssdBrands = [
            [
                "name" => "Kingston",
                "created_at" => Date::now(),
                "updated_at" => Date::now()
            ],
            [
                "name" => "Western Digital",
                "created_at" => Date::now(),
                "updated_at" => Date::now()
            ],
        ];
        DB::table('brands')->insert($ssdBrands);
        $data = [
            [
                'brand_id' => '10',
                'name' => 'SAMSUNG 970 EVO PLUS M.2 2280 1TB',
                'interface_id' => '5',
                'form_factor_id' => '1',
                'capacity' => '1TB',
                'max_read' => '3500',
                'max_write' => '3300',
                'mtbf' => '1500000',
                'terabyte_written' => '600',
                'features' => "Always Evolving SSD
The ultimate in performance, upgraded. Faster than the 970 EVO, the 970 EVO Plus is powered by the latest V-NAND technology and firmware optimization. It maximizes the potential of NVMe bandwidth for unbeatable computing.

Level up Performance
The 970 EVO Plus reaches sequential read/write speeds up to 3,500/3,300 MB/s, up to 53% faster than the 970 EVO. Powered by the latest V-NAND technology - which brings greater NAND performance and higher power efficiency - along with optimized firmware, a proven Phoenix controller, and Intelligent TurboWrite boost speed.

Design Flexibility
The next advancement in NVMe SSDs. The 970 EVO Plus fits up to 1TB onto the compact M.2 (2280) form factor, greatly expanding storage capacity and saving space for other components. Samsung's innovative technology empowers you with the capacity to do more and accomplish more.

Exceptional Endurance
The new standard in sustainable performance. The 970 EVO Plus provides exceptional endurance powered by the latest V-NAND technology and Samsung's reputation for quality.

Unparalleled Reliability
Achieve a new level of drive confidence. Samsung's advanced nickel-coated controller and heat spreader on the 970 EVO Plus enable superior heat dissipation. The Dynamic Thermal Guard automatically monitors and maintains optimal operating temperatures to minimize performance drops.

Samsung Magician
Advanced drive management made simple. The Samsung Magician software will help you keep an eye on your drive. A suite of user-friendly tools helps keep your drive up to date, monitor drive health and speed, and even boost performance.",
                'official_link' => 'https://www.samsung.com/us/computing/memory-storage/solid-state-drives/ssd-970-evo-plus-nvme-m-2-1-tb-mz-v7s1t0b-am/#specs',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
            [
                'brand_id' => '10',
                'name' => 'SAMSUNG 980 PRO M.2 2280 1TB',
                'interface_id' => '7',
                'form_factor_id' => '1',
                'capacity' => '2TB',
                'max_read' => '7000',
                'max_write' => '5100',
                'mtbf' => '1500000',
                'terabyte_written' => '1200',
                'features' => "Next-level SSD performance
Unleash the power of the Samsung 980 PRO PCIe 4.0 NVMe SSD for next-level computing. 980 PRO delivers 2x the data transfer rate of PCIe 3.0, while maintaining compatibility with PCIe 3.0.

Maximum Speed
Get read speeds up to 7,000 MB/s with 980 PRO and push the limits of what SSDs can do. Powered by a new Elpsis controller designed to harmonize the flash memory components and the interface for superior speed - with a PCIe 4.0 interface that's 2x faster than PCIe 3.0 SSDs and 12x faster than Samsung SATA SSDs - every component of this NVMe SSD is manufactured by Samsung for performance that lasts.

A winning combination
Designed for hardcore gamers and tech-savvy users, the 980 PRO offers high-performance bandwidth and throughput for heavy-duty applications in gaming, graphics, data analytics, and more. It's fast at loading games, so you can play more and wait less.

Efficient M.2 SSD
The 980 PRO comes in a compact M.2 2280 form factor, which can be easily plugged into desktops and laptops. Due to its size and thus optimized power efficiency, it's ideal for building high-performance computing systems.

Reliable thermal control
High-performance SSDs usually require high-performance thermal control. To ensure stable performance, the 980 PRO uses nickel coating to help manage the controller's heat level and a heat spreader label to deliver effective thermal control of the NAND chip.

Smart thermal solution
Embedded with Samsung's cutting-edge thermal control algorithm, 980 PRO manages heat on its own to deliver durable and reliable performance, while minimizing performance fluctuations during extended usage.

Samsung Magician software
Unlock the full potential of 980 PRO with Samsung Magician's advanced, yet intuitive optimization tools. Monitor drive health, optimize performance, protect valuable data, and receive important updates with Magician to ensure you're always getting the best performance out of you",
                'official_link' => 'https://www.crucial.com/ssd/mx500/ct500mx500ssd1',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
            [
                'brand_id' => '11',
                'name' => 'Crucial P3 Plus 1TB',
                'interface_id' => '7',
                'form_factor_id' => '1',
                'capacity' => '1TB',
                'max_read' => '5000',
                'max_write' => '3600',
                'mtbf' => '0',
                'terabyte_written' => '600',
                'features' => '',
                'official_link' => 'https://www.crucial.com/ssd/p3-plus/ct1000p3pssd8',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
            [
                'brand_id' => '13',
                'name' => 'WD Blue SN570 NVMe M.2 2280 1TB',
                'interface_id' => '5',
                'form_factor_id' => '1',
                'capacity' => '1TB',
                'max_read' => '3500',
                'max_write' => '3000',
                'mtbf' => '0',
                'terabyte_written' => '600',
                'features' => '',
                'official_link' => 'https://www.westerndigital.com/products/internal-drives/wd-blue-sn570-nvme-ssd#WDS100T3B0C',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
        ];
        DB::table('m2_ssds')->insert($data);
    }
}
