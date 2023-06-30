<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class CorsairRamSeeder extends Seeder
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
                'brand_id' => '9',
                'name' => 'Corsair Vengeance LPX Series Black 2x8GB DDR4 CMK16GX4M2B3200C16',
                'capacity' => '16',
                'memory_type_id' => '4',
                'modules' => '2',
                'speed' => '3200',
                'voltage' => '1.35',
                'latency' => '16',
                'heat_spreader' => '1',
                'rgb_support' => '0',
                'ecc_support' => '0',
                'features' =>
                    "Designed for high-performance overclocking
Each Vengeance LPX module is built with a pure aluminum heatspreader for faster heat dissipation and cooler operation; and the eight-layer PCB helps manage heat and provides superior overclocking headroom.
Each IC is individually screened for performance potential.

Designed for great looks
Available in multiple colors to match your motherboard, your components, or just your style.

Performance and Compatibility
Vengeance LPX is optimized and compatibility tested for the latest Intel 100 Series motherboards and offers higher frequencies, greater bandwidth, and lower power consumption.
XMP 2.0 support for trouble-free automatic overclocking.

Low-profile heatspreader design
The Vengeance LPX module height is carefully designed to fit smaller spaces.",
                'official_link' => 'https://www.corsair.com/us/en/Categories/Products/Memory/VENGEANCE-LPX/p/CMK16GX4M2B3200C16#tab-tech-specs',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
            [
                'brand_id' => '9',
                'name' => 'Corsair Vengeance RGB Pro Black 2x16GB DDR4 CMW32GX4M2D3600C18',
                'capacity' => '32',
                'memory_type_id' => '4',
                'modules' => '2',
                'speed' => '3600',
                'voltage' => '1.35',
                'latency' => '18',
                'heat_spreader' => '1',
                'rgb_support' => '1',
                'ecc_support' => '0',
                'features' =>
                    "Dynamic Multi-Zone RGB Lighting
                10 Ultra-bright RGB LEDs per module.

                Next Generation Software
                Take control in CORSAIR iCUE software and synchronize lighting with other CORSAIR RGB products, including CPU coolers, keyboards and fans.

                Custom Performance PCB
                Provides the highest signal quality for the greatest level of performance and stability.
                Tightly Screened Memory
                Carefully screened ICs for extended overclocking potential.
                Maximum Bandwidth and Tight Response Times
                Optimized for peak performance on the latest Intel and AMD DDR4 motherboards.

                No Wires Required
                Requires no extra wires or cables for a clean and seamless install.

                Maximum bandwidth and tight response time
                Optimized on the latest AMD and Intel DDR4 motherboards.

                Supports XMP 2.0
                A single BIOS setting is all that's required to set your memory to its ideal performance settings, for for optimum performance.",
                'official_link' => 'https://www.corsair.com/us/en/Categories/Products/Memory/Vengeance-PRO-RGB-Black/p/CMW32GX4M2C3200C16',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
            [
                'brand_id' => '9',
                'name' => 'Corsair Dominator Platinum RGB White 2x16GB DDR4 CMT32GX4M2E3200C16W',
                'capacity' => '32',
                'memory_type_id' => '4',
                'modules' => '2',
                'speed' => '3600',
                'voltage' => '1.35',
                'latency' => '16',
                'heat_spreader' => '1',
                'rgb_support' => '1',
                'ecc_support' => '0',
                'features' =>
                    "Iconic and Refined High-Performance RGB Memory
                    Iconic CORSAIR DOMINATOR PLATINUM design perfectly complements the world's best PCs, for unmistakable high-end system builds.

                    High Speed and Tight Timings
                    Hand-sorted, tightly-screened memory chips ensure high frequency performance and tight response times, with overclocking headroom to spare.

                    Premium Craftsmanship
                    A combination of precision die-casting and anodization creates premium memory that's built to last.

                    Brilliant White Finish
                    A white top bar and heatspreader with gold accents match the clean, refined look of other white CORSAIR products in your setup.

                    12 Ultra-Bright CAPELLIX RGB LEDs Per Module
                    Illuminate your PC with spectacular customizable lighting from 12 individually addressable RGB LEDs.

                    Unique Dual-Channel DHX Cooling Technology
                    A heatspreader embedded directly into the PCB pulls heat away from the modules, allowing DOMINATOR PLATINUM RGB to stay cool even under extreme stress.

                    Custom High-Performance PCB
                    Guarantees signal quality and stability for superior overclocking ability.

                    Intelligent Control, Unlimited Possibilities
                    CORSAIR iCUE software brings your system to life with dynamic RGB lighting control synchronized across all your iCUE compatible products, and keeps you informed with real-time temperature and frequency readings.

                    Create and Customize
                    Choose from dozens of stunning pre-set lighting profiles, or create your own with virtually limitless lighting patterns and effects in CORSAIR iCUE software.

                    Wide Compatibility
                    Optimized for the latest Intel and AMD DDR4 motherboards.

                    Intel XMP 2.0 Support
                    Simple one-setting installation and setup.",
                'official_link' => 'https://www.corsair.com/us/en/Categories/Products/Memory/Vengeance-PRO-RGB-Black/p/CMW32GX4M2C3200C16',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ]
        ];
        DB::table('rams')->insert($data);
    }
}
