<?php

namespace App\Http\Support;

use App\Http\Support\Messages\MotherboardIssueMessages;

class MotherboardCompatibilityCheck
{
    public static function checkM2SsdInterfaceCompatibility($rig, &$warnings)
    {
        $motherboardStorageSlots = $rig['motherboard']['storageInterfaces'];
        unset($motherboardStorageSlots[0]);
        $warningMessage = "";
        $m2SSDs = $rig['m2SSDs'];
        $compatibleSSDs = array();
        $incompatibleFormFactorSSDCount = 0;

        foreach ($motherboardStorageSlots as $storageSlot){
            if(count($compatibleSSDs) == count($m2SSDs)){
                break;
            }
            $supportedInterfaces = $storageSlot['interfaceSupport'];
            $incompatibleFormFactorSSDCount = 0;
            foreach ($m2SSDs as $m2SSD){
                if(in_array($m2SSD['id'], $compatibleSSDs)){
                    continue;
                }
                if(!str_contains($storageSlot['m2FormFactors'], $m2SSD['formFactor']['name'])){
                    $incompatibleFormFactorSSDCount++;

                }
                foreach ($supportedInterfaces as $interface){
                    if($interface['id'] == $m2SSD['storageInterface']['id']){
                        $compatibleSSDs[] = $m2SSD['id'];
                        break;
                    }
                }
            }
        }
        if($incompatibleFormFactorSSDCount == count($m2SSDs)){
            $warningMessage = MotherboardIssueMessages::$incompatibleFormFactorMessage;
        }

        if((count($compatibleSSDs) != count($m2SSDs)) && strlen($warningMessage) == 0){
            $warningMessage = MotherboardIssueMessages::$noSlotSupportMessage;
        }

        if(strlen($warningMessage) > 0 && !in_array($warningMessage, $warnings)){
            $warnings[] = $warningMessage;
        }
    }

    public static function checkGpuCompatibility($rig, &$warnings){
        $expansionSlots = $rig['motherboard']['expansionSlots'];
        $gpuExpansionSlot = $rig['gpu']['expansionSlot'];
        $warningMessage = MotherboardIssueMessages::$newPcieGpuOnOldMBMessage;

        foreach ($expansionSlots as $expansionSlot){
            if($expansionSlot['id'] == $gpuExpansionSlot['id']){
                $warningMessage = "";
                break;
            }

        }

        if(strlen($warningMessage) > 0 && !in_array($warningMessage, $warnings)){
            $warnings[] = $warningMessage;
        }
    }

    public static function checkSataDriveCompatibility($rig, &$warnings){
        $sataStorageSlots = $rig['motherboard']['storageInterfaces'][0];
        $storageInterface = $sataStorageSlots['interfaceSupport'][0];
        $warningMessage = "";
        $hdds = $rig['hdds'];
        $sataSSDs = $rig['sataSSDs'];

        foreach ($hdds as $hdd){
            if($storageInterface['id'] < $hdd['storageInterface']['id']){
                $warningMessage = MotherboardIssueMessages::$differentHddSataMessage;
            }
        }

        foreach ($sataSSDs as $sataSSD){
            if($storageInterface['id'] < $sataSSD['storageInterface']['id']){
                $warningMessage = MotherboardIssueMessages::$differentHddSataMessage;
            }
        }

        if(count($hdds) + count($sataSSDs) > $sataStorageSlots['amount']){
            $warnings[] = MotherboardIssueMessages::$notEnoughSataSlots;
        }

        if(strlen($warningMessage) > 0 && !in_array($warningMessage, $warnings)){
            $warnings[] = $warningMessage;
        }
    }

}
