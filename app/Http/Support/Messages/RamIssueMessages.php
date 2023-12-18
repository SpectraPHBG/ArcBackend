<?php

namespace App\Http\Support\Messages;

class RamIssueMessages
{
    public static $highFrequencyMessage = 'You have selected Ram that has higher frequency than supported by CPU!
    Your PC should still run, but the RAM will not run at its full capacity!';
    public static $lowFrequencyMessage = 'You have selected Ram that has lower frequency than supported by CPU!
    If you use a slower RAM module than your CPU and motherboard support, your PC will run slower due to the slower RAM speed!';

    public static $differentRamMessage = 'You have different RAM sticks!
    For optimal performance, your RAM should use the same voltage, and their respective controllers
    should play well with each other and the motherboard. That\'s why it\'s best to use the same RAM model in all slots.';

    public static $unsupportedMBFrequencyMessage = 'You have selected Ram that has frequency that is not listed on the Motherboard Specifications!
    This could result in the RAM being downclocked, meaning it works on a lower frequency that is supported by the Motherboard!';

    public static $neededOCForFrequencyMessage = 'You have selected Ram that is only supported via overclocking,
    so you will need to manually overclock your Motherboard.
    However, please note that overclocking can potentially damage your hardware and should be done with caution!';

    public static $ramAboveMBFrequencyMessage = 'You have selected Ram that has frequency that is above any in the Motherboard Specifications!
    However this Motherboard is listed to support higher frequencies than what is written in the Specifications.
    Please consult the official Qualified Vendor List (tried and tested RAM models) of the manufacturer or reach out to the support page!';
}
