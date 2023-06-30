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
        $gpuType = [
            [
                "name" => "GDDR6X",
                "created_at" => Date::now(),
                "updated_at" => Date::now()
            ]
        ];
        $gpus = [
            [
                "brand_id" => "5",
                "name" => "ASUS Dual Radeon RX 6400",
                "expansion_slot_id" => "2",
                "clock_speeds" => "Game Clock: 2039MHz, Boost Clock: 2321MHz",
                "vram" => "4",
                "vram_id" => "6",
                "memory_bus" => "64",
                "3d_apis" => "DirectX 12, OpenGL 4.6",
                "ports" => "1xHDMI 2.1, 1xDisplay Port 1.4a",
                "max_resolution" => "7680x4320",
                "cooler" => "Double Fans",
                "tdp" => "53",
                "recommended_wattage" => "500",
                "power_connector" => null,
                "features" => "Axial-tech fan design features a smaller fan hub that facilitates longer blades and a barrier ring that increases downward air pressure.

A 2-slot Design maximizes compatibility and cooling efficiency for superior performance in small chassis.

Dual ball fan bearings can last up to twice as long as sleeve bearing designs.

Auto-Extreme Technology uses automation to enhance reliability.

A protective backplate prevents PCB flex and trace damage.",
                "max_gpu_length" => "201",
                "dimensions" => "201x124x40.5",
                "official_link" => "https://www.asus.com/motherboards-components/graphics-cards/dual/dual-rx6400-4g/techspec/",
                "created_at" => Date::now(),
                "updated_at" => Date::now()
            ],
            [
                "brand_id" => "8",
                "name" => "MSI GeForce 3060 RTX Ventus 2X 12G OC",
                "expansion_slot_id" => "2",
                "clock_speeds" => "Boost Clock: 2745MHz",
                "vram" => "12",
                "vram_id" => "7",
                "memory_bus" => "192",
                "3d_apis" => "DirectX 12, OpenGL 4.6",
                "ports" => "1xHDMI 2.1, 3xDisplay Port 1.4a",
                "max_resolution" => "7680x4320",
                "cooler" => "Double Fans",
                "tdp" => "170",
                "recommended_wattage" => "550",
                "power_connector" => "1x8",
                "features" => "Dual Fan Thermal Design:
TORX Fan 3.0: The award-winning MSI TORX Fan 3.0 design creates high static pressure and pushes the limits of thermal performance.

Afterburner Overclocking Utility:
Supports multi-GPU setups.
OC Scanner: An automated function finds the highest stable overclock settings.
On Screen Display: Provides real-time information of your system's performance.
Predator: In-game video recording.

Dragon Center:
MSI's exclusive Dragon Center software lets you monitor, tweak and optimize MSI products in real-time.",
                "max_gpu_length" => "235",
                "dimensions" => "235x124x42",
                "official_link" => "https://www.msi.com/Graphics-Card/GeForce-RTX-3060-VENTUS-2X-12G-OC/Specification",
                "created_at" => Date::now(),
                "updated_at" => Date::now()
            ],
            [
                "brand_id" => "8",
                "name" => "MSI GeForce RTX 4070 Ti GAMING X TRIO 12G",
                "expansion_slot_id" => "2",
                "clock_speeds" => "Boost Clock: 1807MHz",
                "vram" => "12",
                "vram_id" => "7",
                "memory_bus" => "192",
                "3d_apis" => "DirectX 12, OpenGL 4.6",
                "ports" => "1xHDMI 2.1, 3xDisplay Port 1.4a",
                "max_resolution" => "7680x4320",
                "cooler" => "Triple Fans",
                "tdp" => "285",
                "recommended_wattage" => "750",
                "power_connector" => "1x16",
                "features" => "Dual Fan Thermal Design:
TORX Fan 3.0: The award-winning MSI TORX Fan 3.0 design creates high static pressure and pushes the limits of thermal performance.

Afterburner Overclocking Utility:
Supports multi-GPU setups.
OC Scanner: An automated function finds the highest stable overclock settings.
On Screen Display: Provides real-time information of your system's performance.
Predator: In-game video recording.

Dragon Center:
MSI's exclusive Dragon Center software lets you monitor, tweak and optimize MSI products in real-time.",
                "max_gpu_length" => "337",
                "dimensions" => "337x140x62",
                "official_link" => "https://www.msi.com/Graphics-Card/GeForce-RTX-4070-Ti-GAMING-X-TRIO-12G/Specification",
                "created_at" => Date::now(),
                "updated_at" => Date::now()
            ]
        ];

        DB::beginTransaction();

        try {
            DB::table('graphic_memory_types')->insert($gpuType);
            DB::table('gpus')->insert($gpus);

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
