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
        $data = [
            [
                'brand_id' => '9',
                'name' => 'CORSAIR Vengeance RGB Black 2x16GB DDR5 CMH32GX5M2B6000C40',
                'capacity' => '32',
                'memory_type_id' => '5',
                'modules' => '2',
                'speed' => '5200',
                'voltage' => '1.30',
                'latency' => '40',
                'heat_spreader' => '1',
                'rgb_support' => '1',
                'ecc_support' => '0',
                'image_link' => "/rams/VengeanceRGBBlackDDR5-min.jpg",
                'features' =>
                    "Welcome to the Cutting-Edge of Performance: Push the limits of your system like never before with CORSAIR DDR5 memory, unlocking even faster frequencies, greater capacities, and higher CPU processing.

Dynamic Ten-Zone RGB Lighting: Illuminate your system with ten individually addressable, ultra-bright RGB LEDs per module, encased in a panoramic light bar for vivid RGB lighting from any viewing angle.

Create and Customize: Choose from dozens of preset lighting profiles, or create your own in iCUE.

Custom Intel XMP 3.0 Profiles: Customize and save your own XMP profiles via iCUE to tailor performance by app or task for greater efficiency.

Maximum Bandwidth and Tight Response Times: Optimized for peak performance on the latest Intel DDR5 motherboards.

Custom Performance PCB: Provides the highest signal quality for the greatest level of performance and stability.

Tightly Screened Memory: Carefully screened memory chips for extended overclocking potential.

Onboard Voltage Regulation: Enables easier, more finely-tuned, and more stable overclocking through CORSAIR iCUE software than previous generation motherboard control.

Powerful CORSAIR iCUE Software: Dynamic RGB lighting control synchronized across your entire iCUE setup, real-time temperature and frequency readings, onboard voltage regulation, and custom XMP profiles.

Stylish Solid Aluminum Heatspreader: Efficiently conducts heat away from your memory, with refined VENGEANCE styling to fit the look of modern systems.",
                'official_link' => 'https://www.corsair.com/us/en/Categories/Products/Memory/VENGEANCE-RGB-DDR5-%E2%80%94-Optimized-for-AMD/p/CMH32GX5M2B5600Z36K#tab-tech-specs',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ]
        ];
        DB::table('rams')->insert($data);
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
