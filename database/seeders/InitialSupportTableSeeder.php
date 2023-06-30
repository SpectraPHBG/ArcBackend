<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class InitialSupportTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $storageInterfaces = [
            [
                "name" => "SATA",
                "created_at" => Date::now(),
                "updated_at" => Date::now()
            ],
            [
                "name" => "SATA2",
                "created_at" => Date::now(),
                "updated_at" => Date::now()
            ],
            [
                "name" => "SATA3",
                "created_at" => Date::now(),
                "updated_at" => Date::now()
            ]
        ];
        $chipsets = [
            [
                "brand_id" => 2,
                "name" => "Z690",
                "created_at" => Date::now(),
                "updated_at" => Date::now()
            ],
            [
                "brand_id" => 2,
                "name" => "H610",
                "created_at" => Date::now(),
                "updated_at" => Date::now()
            ],
            [
                "brand_id" => 2,
                "name" => "B760",
                "created_at" => Date::now(),
                "updated_at" => Date::now()
            ],
            [
                "brand_id" => 1,
                "name" => "B550",
                "created_at" => Date::now(),
                "updated_at" => Date::now()
            ],
            [
                "brand_id" => 1,
                "name" => "X570",
                "created_at" => Date::now(),
                "updated_at" => Date::now()
            ],
            [
                "brand_id" => 1,
                "name" => "B450",
                "created_at" => Date::now(),
                "updated_at" => Date::now()
            ]
        ];
        $formFactors = [
            [
                "name" => "Mini-ITX",
                "created_at" => Date::now(),
                "updated_at" => Date::now()
            ],
            [
                "name" => "Micro-ATX",
                "created_at" => Date::now(),
                "updated_at" => Date::now()
            ],
            [
                "name" => "ATX",
                "created_at" => Date::now(),
                "updated_at" => Date::now()
            ],
            [
                "name" => "E-ATX",
                "created_at" => Date::now(),
                "updated_at" => Date::now()
            ]
        ];
        $caseFormFactors = [
            [
                "name" => "Mini-ITX",
                "created_at" => Date::now(),
                "updated_at" => Date::now()
            ],
            [
                "name" => "Micro-ATX",
                "created_at" => Date::now(),
                "updated_at" => Date::now()
            ],
            [
                "name" => "Mid Tower",
                "created_at" => Date::now(),
                "updated_at" => Date::now()
            ],
            [
                "name" => "Full Tower",
                "created_at" => Date::now(),
                "updated_at" => Date::now()
            ]
        ];
        $memoryTypes = [
            [
                "name" => "DDR1",
                "created_at" => Date::now(),
                "updated_at" => Date::now()
            ],
            [
                "name" => "DDR2",
                "created_at" => Date::now(),
                "updated_at" => Date::now()
            ],
            [
                "name" => "DDR3",
                "created_at" => Date::now(),
                "updated_at" => Date::now()
            ],
            [
                "name" => "DDR4",
                "created_at" => Date::now(),
                "updated_at" => Date::now()
            ],
            [
                "name" => "DDR5",
                "created_at" => Date::now(),
                "updated_at" => Date::now()
            ]
        ];
        $graphicMemoryTypes = [
            [
                "name" => "GDDR1",
                "created_at" => Date::now(),
                "updated_at" => Date::now()
            ],
            [
                "name" => "GDDR2",
                "created_at" => Date::now(),
                "updated_at" => Date::now()
            ],
            [
                "name" => "GDDR3",
                "created_at" => Date::now(),
                "updated_at" => Date::now()
            ],
            [
                "name" => "GDDR4",
                "created_at" => Date::now(),
                "updated_at" => Date::now()
            ],
            [
                "name" => "GDDR5",
                "created_at" => Date::now(),
                "updated_at" => Date::now()
            ],
            [
                "name" => "GDDR6",
                "created_at" => Date::now(),
                "updated_at" => Date::now()
            ]
        ];
        $expansionSlots = [
            [
                "name" => "PCI Express 3.0 x16",
                "created_at" => Date::now(),
                "updated_at" => Date::now()
            ],
            [
                "name" => "PCI Express 4.0 x16",
                "created_at" => Date::now(),
                "updated_at" => Date::now()
            ]
        ];

        foreach ($storageInterfaces as $interface){
            DB::table('storage_interfaces')->insert($interface);
        }
        foreach ($chipsets as $chipset){
            DB::table('chipsets')->insert($chipset);
        }
        foreach ($formFactors as $factor){
            DB::table('form_factors')->insert($factor);
        }
        foreach ($caseFormFactors as $factor){
            DB::table('case_form_factors')->insert($factor);
        }
        foreach ($memoryTypes as $memoryType){
            DB::table('memory_types')->insert($memoryType);
        }
        foreach ($graphicMemoryTypes as $memoryType){
            DB::table('graphic_memory_types')->insert($memoryType);
        }
        foreach ($expansionSlots as $expansionSlot){
            DB::table('expansion_slots')->insert($expansionSlot);
        }
    }
}
