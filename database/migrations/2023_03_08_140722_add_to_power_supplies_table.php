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
        $powerSupplies = [
            [
                "brand_id" => "16",
                "name" => "ENERMAX CyberBron 500W",
                "max_power" => "500",
                "fans" => "1 x 120mm fan",
                "certificate" => "	80 PLUS BRONZE Certified",
                "connectors" => "1 x 24 pin ATX
1 x 8 pin (4+4) EPS (CPU)
2 x 8 pin (6+2) PCIe
6 x SATA
4 x 4 pin Molex
1 x FDD (adapter)",
                "input_voltage" => "115-230 V",
                "modular" => "Non-Modular",
                "max_psu_length" => "140",
                "features" => "Fully Modular: Only connect the cables your system needs, making clean and tidy builds easier.
135mm Magnetic Levitation Fan: Utilizes a magnetic levitation bearing and custom engineered rotors for high performance, low noise, and superior reliability.
EPS12V Connector: For wide compatibility with modern graphics cards and motherboards.
100% All Japanese 105°C Capacitors: Premium internal components ensure unwavering power delivery and long-term reliability.
Modern Standby Compatible: Extremely fast wake-from-sleep times and better low-load efficiency.
80 PLUS Gold Certified: High efficiency operation for lower power consumption, less noise, and cooler temperatures.
Zero RPM Fan Mode: At low and medium loads the cooling fan switches off entirely for near-silent operation.
Resonant LLC Topology with DC-to-DC Conversion: Provides clean, consistent power, reduces coil whine for quieter operation, and enables use of more energy efficient sleep states.",
                "dimensions" => "150x86x140",
                "official_link" => "https://www.enermax.com/en/products/cyberbron-500-watt-80-plus-bronze-non-modular-power-supply",
                "created_at" => Date::now(),
                "updated_at" => Date::now()
            ],
            [
                "brand_id" => "9",
                "name" => "Corsair RMx Series (2021) RM850x",
                "max_power" => "850",
                "fans" => "1 x 135mm Magnetic Levitation Fan",
                "certificate" => "80 PLUS GOLD Certified",
                "connectors" => "1 x 24 pin ATX
3 x 8 pin (4+4) EPS (CPU)
4 x 8 pin (6+2) PCIe
14 x SATA
4 x 4 pin Molex",
                "input_voltage" => "100-240 V",
                "modular" => "Full Modular",
                "max_psu_length" => "160",
                "features" => "Fully Modular: Only connect the cables your system needs, making clean and tidy builds easier.
135mm Magnetic Levitation Fan: Utilizes a magnetic levitation bearing and custom engineered rotors for high performance, low noise, and superior reliability.
EPS12V Connector: For wide compatibility with modern graphics cards and motherboards.
100% All Japanese 105°C Capacitors: Premium internal components ensure unwavering power delivery and long-term reliability.
Modern Standby Compatible: Extremely fast wake-from-sleep times and better low-load efficiency.
80 PLUS Gold Certified: High efficiency operation for lower power consumption, less noise, and cooler temperatures.
Zero RPM Fan Mode: At low and medium loads the cooling fan switches off entirely for near-silent operation.
Resonant LLC Topology with DC-to-DC Conversion: Provides clean, consistent power, reduces coil whine for quieter operation, and enables use of more energy efficient sleep states.",
                "dimensions" => "150x86x160",
                "official_link" => "https://www.corsair.com/us/en/Categories/Products/Power-Supply-Units/RMx-Series/p/CP-9020200-NA",
                "created_at" => Date::now(),
                "updated_at" => Date::now()
            ]
        ];

        DB::beginTransaction();

        try {
            DB::table('power_supplies')->insert($powerSupplies);

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
