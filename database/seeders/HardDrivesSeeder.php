<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class HardDrivesSeeder extends Seeder
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
                "name" => "Seagate",
                "created_at" => Date::now(),
                "updated_at" => Date::now()
            ]
        ];
        DB::table('brands')->insert($ssdBrands);
        $data = [
            [
                'brand_id' => '14',
                'name' => 'Seagate BarraCuda ST2000DM008 2TB',
                'interface_id' => '3',
                'form_factor' => '3.5',
                'capacity' => '2TB',
                'rpm' => '7200',
                'cache' => '256',
                'features' => "Versatile HDDs for all your PC needs bring you industry-leading excellence in personal computing.

For over 20 years the BarraCuda family has delivered super-reliable storage for the hard drive industry.

Capacities up to 8TB for desktops, BarraCuda leads the market with the widest range of storage options available.

Advanced Power modes help save energy without sacrificing performance.

SATA 6Gb/s interface optimizes burst performance.",
                'official_link' => 'https://www.seagate.com/www-content/datasheets/pdfs/3-5-barracudaDS1900-7-1706US-en_US.pdf',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
            [
                'brand_id' => '14',
                'name' => 'Seagate BarraCuda ST1000DM010 1TB ',
                'interface_id' => '3',
                'form_factor' => '3.5',
                'capacity' => '1TB',
                'rpm' => '7200',
                'cache' => '64',
                'features' => "Versatile HDDs for all your PC needs bring you industry-leading excellence in personal computing.

For over 20 years the BarraCuda family has delivered super-reliable storage for the hard drive industry.

Capacities up to 8TB for desktops, BarraCuda leads the market with the widest range of storage options available.

Advanced Power modes help save energy without sacrificing performance.

SATA 6Gb/s interface optimizes burst performance.

Best-Fit Applications
- Desktop or all-in-one PCs
- Home servers
- Entry-level direct-attached storage devices (DAS)",
                'official_link' => 'https://www.seagate.com/content/dam/seagate/migrated-assets/www-content/product-content/barracuda-fam/barracuda-new/files/barracuda-ds-1900-3-1608us.pdf',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
            [
                'brand_id' => '13',
                'name' => 'Western Digital Blue Desktop Hard Disk Drive 2TB',
                'interface_id' => '3',
                'form_factor' => '3.5',
                'capacity' => '2TB',
                'rpm' => '5400',
                'cache' => '256',
                'features' => "Reliable everyday computing

Western Digital quality and reliability

Free Acronis True Image WD Edition cloning software

Massive capacity up to 6TB",
                'official_link' => 'https://www.westerndigital.com/products/internal-drives/wd-blue-desktop-sata-hdd#WD5000AZLX',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
        ];
        DB::table('hard_drives')->insert($data);
    }
}
