<?php

namespace App\Http\Support\Messages;

class MotherboardIssueMessages
{
    public static $noSlotSupportMessage = 'Some of the M2 SSD/SSDs you selected could not be fit into a corresponding slot on the Motherboard!
    This is either because no slot on the motherboard with interface the same as either of the SSDs or there were only enough slots for some of the SSDs!
    You can still put them into a different generation slot, however this could decrease their performance if it is older than the drive itself!
    If you want to use these SSDs on this Motherboard without performance issues you will have to purchase either an internal or an external adapter!';

    public static $incompatibleFormFactorMessage = '
    Some of the M2 SSD/SSDs you selected could not be fit into a corresponding slot on the Motherboard!
    This is because at least one of the SSDs you selected cannot physically fit on your motherboard!
    If you want to use these SSDs on this Motherboard you will have to purchase either an internal or an external adapter!';

    public static $newPcieGpuOnOldMBMessage = 'Your GPU is using an newer PCIe interface than the one/s available on the Motherboard.
    This means that the PC will still run, however the performance of you GPU will be decreased to run on the older motherboard slot!';

    public static $differentHddSataMessage = 'Your SATA Drive is using a newer SATA interface than those available on the Motherboard!
    You will be able to use this drive, but it will have reduced performance to be able to run using the older SATA slot from the Motherboard';

    public static $notEnoughSataSlots = "Your SATA drives are more than the available SATA ports on the motherboard. If you want to use all of them you will
    have to purchase either an internal or external adapter!";

}
