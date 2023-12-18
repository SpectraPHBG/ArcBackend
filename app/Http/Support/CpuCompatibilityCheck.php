<?php

namespace App\Http\Support;

use App\Http\Support\Messages\CpuErrorMessages;

class CpuCompatibilityCheck
{
    public static function checkGpuCompatibility($rig, &$warnings){
        $cpuPcieVersion = $rig['cpu']['pcieVersion'];
//        $gpuExpansionSlot = $rig['gpu']['expansionSlot'];
        $gpuExpansionSlot = $rig['gpu']['expansionSlot']['name'];
        $warningMessage = "";

        if(!str_contains($gpuExpansionSlot,$cpuPcieVersion)){
            $warningMessage = CpuErrorMessages::$differentPCIeGenMessage;
        }


        if(strlen($warningMessage) > 0 && !in_array($warningMessage, $warnings)){
            $warnings[] = $warningMessage;
        }
    }
}
