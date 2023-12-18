<?php

namespace App\Http\Support;

use App\Http\Support\Messages\RamIssueMessages;

class RamCompatibilityCheck
{

    public static function checkCpuFrequencySupport($rig, &$warnings){
        foreach ($rig['rams'] as $ram){
            $warningMessage = "";
            if($rig['cpu']['memorySpeed'] < $ram['speed']){
                $warningMessage = RamIssueMessages::$highFrequencyMessage;
            }
            else if($rig['cpu']['memorySpeed'] < $ram['speed']){
                $warningMessage = RamIssueMessages::$lowFrequencyMessage;
            }

            if(strlen($warningMessage) > 0 && !in_array($warningMessage, $warnings)){
                $warnings[] = $warningMessage;
            }
        }
    }

    public static function checkRamSelected($rig, &$warnings){
        $warningMessage = "";
        $rams = $rig['rams'];

        for ($i = 0 ; $i < count($rams) - 1 ; $i++){
            for ($j = $i + 1 ; $j < count($rams) ; $j++){
                if($rams[$i]['id'] !== $rams[$j]['id']){
                    $warningMessage = RamIssueMessages::$differentRamMessage;
                }
            }
        }

        if(strlen($warningMessage) > 0 && !in_array($warningMessage, $warnings)){
            $warnings[] = $warningMessage;
        }
    }

    public static function checkMotherboardFrequencySupport($rig, &$warnings){
        $rams = $rig['rams'];
        $motherboardMemories = $rig['motherboard']['memoriesSupport'];
        foreach ($motherboardMemories as $motherboardMemory){
            $supportedFrequencies = $motherboardMemory['frequencies'];
            $splitSupportedRams = explode("/ ",$supportedFrequencies);
            $maxSupportedRam = end($splitSupportedRams);

            foreach ($rams as $ram){
                $warningMessage = RamIssueMessages::$unsupportedMBFrequencyMessage;
                foreach ($splitSupportedRams as $supportedRam){
                    if(str_contains($supportedRam, $ram['speed']) &&
                        (is_null($motherboardMemory['name']) || str_contains($motherboardMemory['name'], $rig['cpu']['series']))
                    ){
                        if(str_contains($supportedRam, "(OC)")){
                            $warningMessage = RamIssueMessages::$neededOCForFrequencyMessage;
                        }
                        else{
                            $warningMessage = "";
                        }
                        break;
                    }

                }
                if(str_contains($maxSupportedRam,"+") && $warningMessage != ""){
                    if(str_replace(["+","(OC)"],"",$maxSupportedRam) < $ram["speed"]){
                        $warningMessage = RamIssueMessages::$ramAboveMBFrequencyMessage;
                    }
                }

                if(strlen($warningMessage) > 0 && !in_array($warningMessage, $warnings)){
                    $warnings[] = $warningMessage;
                }

            }
        }
    }
}
