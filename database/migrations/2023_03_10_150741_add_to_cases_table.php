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
        $cases = [
            [
                'brand_id' => '9',
                'name' => 'Corsair 4000D Airflow CC-9011200-WW',
                'factor_id' => '3',
                'io_ports' => 'Front Ports: 1xUSB 3.1 Type-C, 1xUSB 3.0, Audio',
                'psu_mount' => 'Bottom',
                'air_cooling_support' => 'Front: 3x120mm, 2x140mm | Top: 2x120mm, 2x140mm | Rear: 1x120mm',
                'liquid_cooling_support' => 'Front: 360mm, 240mm | Top: 360mm, 280mm, 240mm | Rear: 120mm',
                'storage_25_bays' => '2',
                'storage_35_bays' => '2',
                'included_fans' => '2x120mm',
                'max_psu_length' => '180',
                'max_cooler_height' => '170',
                'max_gpu_length' => '360',
                'dimensions' => '466x230x453',
                'features' => 'A Fitting Choice: Combining innovative cable management, concentrated airflow, and proven CORSAIR build quality, choose the 4000D for an immaculate high-performance PC.

High-Airflow Front Panel: An optimized steel front panel delivers massive airflow to your system for maximum cooling.

CORSAIR RapidRoute Cable Management System: Makes it simple and fast to route your major cables through a single channel, with a roomy 25mm of space behind the motherboard for all of your cables.

Two Included 120mm Fans: CORSAIR AirGuide fans utilize anti-vortex vanes to concentrate airflow and enhance cooling.

Extreme Cooling Potential: A spacious interior fits up to 6x 120mm or 4x 140mm cooling fans, along with multiple radiators including a 360mm in front and 280mm in the roof (dependent on RAM height).

Modern Front Panel I/O: Puts your connections within easy reach, including a USB 3.1 Type-C Port, USB 3.0 port, and a combination audio/microphone jack.

All the Storage You Need: Fits up to 2x SSDs and 2x HDDs.

Tool-Free Tempered Glass Side Panel: Show off your high-profile components and RGB lighting.',
                'official_link' => 'https://www.corsair.com/us/en/Categories/Products/Cases/Mid-Tower-ATX-Cases/4000D-Airflow-Tempered-Glass-Mid-Tower-ATX-Case/p/CC-9011200-WW#tab-tech-specs',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
            [
                'brand_id' => '16',
                'name' => 'ENERMAX Makashi II MKT50',
                'factor_id' => '4',
                'io_ports' => 'Front Ports: 2xUSB 2.0, 1xUSB 3.0, Audio, Controls',
                'psu_mount' => 'Bottom',
                'air_cooling_support' => 'Front: 3x120mm | Top: 3x120mm, 2x140mm | Rear: 1x120mm',
                'liquid_cooling_support' => 'Front: 360mm, 240mm | Top: 360mm, 280mm, 240mm | Rear: 120mm',
                'storage_25_bays' => '6',
                'storage_35_bays' => '2',
                'included_fans' => null,
                'max_psu_length' => '258',
                'max_cooler_height' => '160',
                'max_gpu_length' => '410',
                'dimensions' => '466x230x453',
                'features' => '',
                'official_link' => 'https://www.enermaxeu.com/products/cases/eatx/makashi-ii-mkt50/',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ]
        ];
        DB::beginTransaction();

        try {
            DB::table('cases')->insert($cases);

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
