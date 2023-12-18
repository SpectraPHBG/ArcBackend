<?php

namespace App\Http\Support;

use App\Http\Support\Messages\PsuIssueMessages;

class PsuCompatibilityCheck
{
    public static function checkOverallConsumption($rig, &$warnings)
    {
        $totalConsumption = 50;
        $warningMessage = "";
        $totalConsumption += $rig['cpu']['tdp'];
        $totalConsumption += $rig['gpu']['tdp'];
        if (array_key_exists('fanConsumption', $rig['liquidCooler'])) {
            $totalConsumption += $rig['liquidCooler']['fanConsumption']*$rig['liquidCooler']['fanCount'] + 15;
        }
        else {
            $totalConsumption += $rig['airCooler']['fans']*3;
        }

        $totalConsumption += (count($rig['hdds']) + count($rig['sataSSDs']) + count($rig['m2SSDs'])) * 10;

        if ($totalConsumption + 150 > $rig['psu']['maxPower']) {
            $warningMessage = PsuIssueMessages::getNotEnoughPowerMessage($totalConsumption);
        }

        if (strlen($warningMessage) > 0 && !in_array($warningMessage, $warnings)) {
            $warnings[] = $warningMessage;
        }
    }

    public static function checkSataConnectorCompatibility($rig, &$warnings)
    {
        $warningMessage = "";
        $connectors = explode("\\ ", str_replace("\r\n","",$rig['psu']['connectors']));
        foreach ($connectors as $connector) {
            if (!str_contains($connector, "SATA")) {
                continue;
            }
            $connectorCount = trim(substr($connector, 0, 2), " ");
            if ($connectorCount < count($rig['hdds']) + count($rig['sataSSDs'])) {
                $warningMessage = PsuIssueMessages::$notEnoughSataCables;
            }
        }

        if (strlen($warningMessage) > 0 && !in_array($warningMessage, $warnings)) {
            $warnings[] = $warningMessage;
        }

    }

    public static function checkCpuConnectorCompatibility($rig, &$warnings)
    {
        $warningMessage = "";
        $psuConnectors = explode("\\ ", str_replace("\r\n","",$rig['psu']['connectors']));
        $motherboardConnectors = explode("\\ ", $rig['motherboard']['ioConnectors']);
        foreach ($psuConnectors as $connector) {
            if (!str_contains($connector, "CPU")) {
                continue;
            }
            $connectorCount = trim(substr($connector, 0, 5), " ");
            $psuConnectors = explode(" x ", $connectorCount);
            foreach ($motherboardConnectors as $motherboardConnector) {
                if (!str_contains($motherboardConnector, "ATX 12V")) {
                    continue;
                }
                $cpuConnectors = explode(" x ", substr($motherboardConnector, 0, 5));
                if ($psuConnectors[0] * $psuConnectors[1] < $cpuConnectors[0] * $cpuConnectors[1]) {
                    $warningMessage = PsuIssueMessages::$notEnoughCpuCables;
                }
            }

        }

        if (strlen($warningMessage) > 0 && !in_array($warningMessage, $warnings)) {
            $warnings[] = $warningMessage;
        }

    }

    public static function checkGpuConnectorCompatibility($rig, &$warnings)
    {
        $warningMessage = "";
        $connectors = explode("\\ ", str_replace("\r\n","",$rig['psu']['connectors']));
        foreach ($connectors as $connector) {
            if (!str_contains($connector, "PCIe") || is_null($rig['gpu']['powerConnector'])) {
                continue;
            }
            $unsplitPsuConnectors = trim(substr($connector, 0, 5), " ");
            $psuConnectors = explode(" x ", $unsplitPsuConnectors);
            $unsplitGpuConnector = $rig['gpu']['powerConnector'];
            $gpuConnectorAmount = 0;
            if(str_contains($unsplitGpuConnector, " + ")){
                $differentGpuConnectors =  explode(" + ", $unsplitGpuConnector);
                foreach($differentGpuConnectors as $gpuConnector){
                    $splitConnector = explode('x', $gpuConnector);
                    $gpuConnectorAmount += (int)$splitConnector[0] * (int)$splitConnector[1];
                }
            }
            else {
                $gpuConnector = explode('x', $unsplitGpuConnector);
                $gpuConnectorAmount += (int)$gpuConnector[0] * (int)$gpuConnector[1];
            }

            if ($psuConnectors[0] * $psuConnectors[1] < $gpuConnectorAmount) {
                $warningMessage = PsuIssueMessages::$notEnoughGpuCables;
            }
        }

        if (strlen($warningMessage) > 0 && !in_array($warningMessage, $warnings)) {
            $warnings[] = $warningMessage;
        }

    }
}
