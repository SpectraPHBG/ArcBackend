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
        $motherboards = [
            [
                "brand_id" => "8",
                "name" => "MSI MAG B550 TOMAHAWK",
                "form_factor_id" => "3",
                "socket_id" => "5",
                "chipset_id" => "4",
                "memory_type_id" => "4",
                "memories_support" => "1866/ 2133/ 2400/ 2667/ 2800/ 2933/ 3000/ 3066/ 3200/ 2667/ 2800/ 2933/ 3000/ 3066/ 3200/ 3466/ 3600/ 3733/ 3866/ 4000/ 4133/ 4266/ 4400/ 4533/ 4600/ 4733/ 4800/ 4866/ 5000/ 5100+",
                "memory_slots" => "4",
                "max_memory" => "128",
                "dual_ch_support" => "1",
                "buffer_support" => "Un-buffered",
                "ecc_support" => "1",
                "onboard_video" => "Supported only by CPU with integrated graphic",
                "onboard_audio" => "Realtek ALC1200, ALC1220P",
                "onboard_lan" => "Realtek RTL8125B, Realtek RTL8111H",
                "io_ports" => "1 x Flash BIOS Button
1 x PS/2 Keyboard/Mouse Combo
1 x DisplayPort
1 x HDMI
2 x LAN (RJ45)
2 x USB 2.0/1.1
2 x USB 3.2 Gen 1 Type-A
1 x USB 3.2 Gen 2 Type-A
1 x USB 3.2 Gen 2 Type-C
1 x Optical S/PDIF Out
5 x Audio Jacks",
                "usb_ports" => "1 x USB 3.2 Gen 1 5Gbps Type-C port
1 x USB 3.2 Gen 1 5Gbps connector (supports additional 2 USB 3.2 Gen 1 5Gbps ports)
2 x USB 2.0 connectors (supports additional 4 USB 2.0 ports)",
                "led" => "1",
                "features" => "Supports AMD Ryzen 5000 & 3000 Series desktop processors (not compatible with AMD Ryzen 5 3400G & Ryzen 3 3200G) and AMD Ryzen 4000 G-Series desktop processors

Supports DDR4 Memory, up to 5100+(OC) MHz

Lightning Fast Game experience: PCIe 4.0, Lightning Gen 4 x4 M.2 with M.2 Shield Frozr, AMD Turbo USB 3.2 Gen 2

Premium Thermal Solution: Extended Heatsink Design with additional choke thermal pad rated for 7W/mk and PCB with 2oz thickened copper are built for high performance system and non-stop gaming experience

Enhanced Power Design: 10+2+1 Duet Rail Power System, Digital PWM, Core Boost, DDR4 Boost

Latest Network Solution: Onboard 2.5G LAN plus Gigabit LAN with LAN Manager deliver the best online experience without lag

Mystic Light: 16.8 million colors / 29 effects controlled in one click. Mystic Light Extension supports RGB and RAINBOW LED strip

Pre-installed I/O Shielding: Better EMI protection and more convenience for installation

Audio Boost: Reward your ears with studio grade sound quality for the most immersive gaming experience

Multi-GPU: With Steel Armor PCI-E slots. Supports 2-Way AMD Crossfire",
                "official_link" => "https://www.msi.com/Motherboard/MAG-B550-TOMAHAWK/Specification",
                "created_at" => Date::now(),
                "updated_at" => Date::now()
            ],
            [
                "brand_id" => "8",
                "name" => "MSI MPG Z690 EDGE",
                "form_factor_id" => "3",
                "socket_id" => "3",
                "chipset_id" => "1",
                "memory_type_id" => "4",
                "memories_support" => "2133/ 2666/ 2933/ 3200 ",
                "memory_slots" => "4",
                "max_memory" => "128",
                "dual_ch_support" => "1",
                "buffer_support" => "0",
                "onboard_video" => null,
                "ecc_support" => "1",
                "onboard_audio" => "Realtek ALC4080",
                "onboard_lan" => "Intel I225-V, Intel WIFI 6",
                "io_ports" => "1 x DisplayPort
1 x HDMI
1 x Flash BIOS Button
1 x LAN (RJ45)
2 x Antenna Bracket
1 x Optical S/PDIF Out
5 x Audio Jacks
1 x USB 3.2 Gen 2x2 Type-C
5 x USB 3.2 Gen 2 Type-A
2 x USB 2.0/1.1",
                "usb_ports" => "1 x USB 3.2 Gen 2 10Gbps Type-C port
1 x USB 3.2 Gen 1 5Gbps connector (supports additional 2 USB 3.2 Gen 1 5Gbps ports)
2 x USB 2.0 connectors (supports additional 4 USB 2.0 ports)",
                "led" => "1",
                "features" => "Supports 12th Gen Intel Core / Pentium Celeron processors for LGA 1700 socket

Supports DDR4 Memory, up to 5200+(OC) MHz

Lightning Fast Game experience: PCIe 5.0 slot, Lightning Gen 4 x4 M.2, USB 3.2 Gen 2x2

Enhanced Power Design: Direct 16+1+1 phases power, dual 8-pin CPU power connectors, Core Boost, Memory Boost

Premium Thermal Solution: Aluminum cover with heatsink, heat-pipe, MOSFET thermal pads rated for 7W/mk, additional choke thermal pads and M.2 Shield Frozr are built for high performance system and non-stop gaming experience

MYSTIC LIGHT: 16.8 million colors / fancy lighting effects controlled in one click. MYSTIC LIGHT SYNC supports RGB and RAINBOW(ARGB) LED strips and Ambient devices

2.5G LAN with LAN Manager and Intel Wi-Fi 6 Solution: Upgraded network solution for professional and multimedia use. Delivers a secure, stable and fast network connection

AUDIO BOOST 5: Reward your ears with studio grade sound quality for the most immersive gaming experience

High Quality PCB: 6-layer PCB made by 2oz thickened copper and server grade level material

Pre-installed I/O Shield: Better EMI protection and more convenience for installation",
                "official_link" => "https://www.msi.com/Motherboard/MPG-Z690-EDGE-WIFI-DDR4/Specification",
                "created_at" => Date::now(),
                "updated_at" => Date::now()
            ]
        ];

        DB::beginTransaction();

        try {
            DB::table('motherboards')->insert($motherboards);

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
