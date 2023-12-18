<?php

namespace App\Http\Support;

use App\Http\Support\Messages\PCCaseIssueMessages;

class PCCaseCompatibilityCheck
{
    public static function checkSata25BayCompatibility($rig, &$warnings)
    {
        $warningMessage = "";
        $case = $rig['pcCase'];
        $hdds = $rig['hdds'];
        $sataSSDs = $rig['sataSSDs'];
        $sata25DriveCount = 0;
        foreach ($hdds as $hdd) {
            if ($hdd['formFactor'] == 2.5) {
                $sata25DriveCount++;
            }
        }

        foreach ($sataSSDs as $sataSSD) {
            if ($sataSSD['formFactor'] == 2.5) {
                $sata25DriveCount++;
            }
        }
        if($sata25DriveCount > $case['storage25Bays']){
            $warningMessage = PCCaseIssueMessages::$notEnoughSata25Bays;
        }


        if (strlen($warningMessage) > 0 && !in_array($warningMessage, $warnings)) {
            $warnings[] = $warningMessage;
        }

    }

    public static function checkSata35BayCompatibility($rig, &$warnings)
    {
        $warningMessage = "";
        $case = $rig['pcCase'];
        $hdds = $rig['hdds'];
        $sataSSDs = $rig['sataSSDs'];
        $sata35DriveCount = 0;
        foreach ($hdds as $hdd) {
            if ($hdd['formFactor'] == 3.5) {
                $sata35DriveCount++;
            }
        }

        foreach ($sataSSDs as $sataSSD) {
            if ($sataSSD['formFactor'] == 3.5) {
                $sata35DriveCount++;
            }
        }
        if($sata35DriveCount > $case['storage35Bays']){
            $warningMessage = PCCaseIssueMessages::$notEnoughSata35Bays;
        }


        if (strlen($warningMessage) > 0 && !in_array($warningMessage, $warnings)) {
            $warnings[] = $warningMessage;
        }

    }
}
