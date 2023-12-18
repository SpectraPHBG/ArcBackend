<?php

namespace App\Http\Support\Messages;

class CpuErrorMessages
{
    public static $differentPCIeGenMessage = '
    Your CPU and GPU are using different PCI Express versions!
    This could introduce bottlenecking and lower the overall performance of either your GPU or CPU!
    However whether it will or not and the extend of it depends entirely on the chosen components.';
}
