<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class BrandsSocketsTrialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands = [
            [
                "name" => "AMD",
                "created_at" => Date::now(),
                "updated_at" => Date::now()
            ],
            [
                "name" => "Intel",
                "created_at" => Date::now(),
                "updated_at" => Date::now()
            ],
            [
                "name" => "NVIDIA",
                "created_at" => Date::now(),
                "updated_at" => Date::now()
            ],
            [
                "name" => "Sapphire",
                "created_at" => Date::now(),
                "updated_at" => Date::now()
            ],
            [
                "name" => "ASUS",
                "created_at" => Date::now(),
                "updated_at" => Date::now()
            ],
            [
                "name" => "EVGA",
                "created_at" => Date::now(),
                "updated_at" => Date::now()
            ],
            [
                "name" => "Gigabyte",
                "created_at" => Date::now(),
                "updated_at" => Date::now()
            ],
            [
                "name" => "MSI",
                "created_at" => Date::now(),
                "updated_at" => Date::now()
            ]
        ];
        $sockets = [
            [
                "brand_id" => 2,
                "name" => "LGA 7529",
                "created_at" => Date::now(),
                "updated_at" => Date::now()
            ],
            [
                "brand_id" => 2,
                "name" => "LGA 4677",
                "created_at" => Date::now(),
                "updated_at" => Date::now()
            ],
            [
                "brand_id" => 2,
                "name" => "LGA 1700",
                "created_at" => Date::now(),
                "updated_at" => Date::now()
            ],
            [
                "brand_id" => 1,
                "name" => "AM5",
                "created_at" => Date::now(),
                "updated_at" => Date::now()
            ],
            [
                "brand_id" => 1,
                "name" => "AM4",
                "created_at" => Date::now(),
                "updated_at" => Date::now()
            ],
            [
                "brand_id" => 1,
                "name" => "AM3",
                "created_at" => Date::now(),
                "updated_at" => Date::now()
            ],
            [
                "brand_id" => 1,
                "name" => "TRX40",
                "created_at" => Date::now(),
                "updated_at" => Date::now()
            ]
        ];
        foreach ($brands as $brand){
            DB::table('brands')->insert($brand);
        }
        foreach ($sockets as $socket){
            DB::table('sockets')->insert($socket);
        }
    }
}
