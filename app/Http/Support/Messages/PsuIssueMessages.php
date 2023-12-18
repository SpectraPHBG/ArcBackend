<?php

namespace App\Http\Support\Messages;

class PsuIssueMessages
{
    public static function getNotEnoughPowerMessage($consumption) {
        return "The parts you've selected consume about " . $consumption . " Watts of power!
        This is a rough estimate based on the GPU and CPU power output along with
        Your PC Components might be consuming too much power! When selecting power supply you should leave about 100-150 Watts headroom,
    which means 100-150 Watts above your usage, otherwise depending on the specific parts your power supply might not be able to handle it when the consumption
    becomes very high!";
    }

    public static $notEnoughSataCables = "There are not enough sata cables provided by the Power Supply for the amount of SATA drives you've selected!
    If you want that many drives you will have to use adapter/s in order to get them all to work!";

    public static $notEnoughGpuCables = "There are not enough cables provided by the Power Supply to power the GPU you've selected!
    You can use an adapter from a Molex cable or SATA cable into a PCIe cable for the GPU, however it is not advisable since it can cause issues
    due to the power delivery of the Molex/SATA cables being lower and the fact that they're chained together!";

    public static $notEnoughCpuCables = "There are not enough cables provided by the Power Supply to power the CPU connectors on the Motherboard you've selected!
    The Power Supply has enough power to provide the CPU, however yu might still need to plug all the pins, or some, depending on your motherboard!
     Please check the motherboard's manual!";
}
