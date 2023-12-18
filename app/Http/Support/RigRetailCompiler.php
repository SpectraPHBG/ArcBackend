<?php

namespace App\Http\Support;

use App\Models\AirCoolerRetail;
use App\Models\CaseRetail;
use App\Models\CpuRetail;
use App\Models\GpuRetail;
use App\Models\HardDriveRetail;
use App\Models\M2SSDRetail;
use App\Models\MotherboardRetail;
use App\Models\PowerSupplyRetail;
use App\Models\RamRetail;
use App\Models\SataSSDRetail;

class RigRetailCompiler
{
    public static function compile($rig)
    {
        $pcCaseLinks = CaseRetail::where('case_id',$rig['pcCase']['id'])->first();
        $pcCaseRetail = [
            'caseId' => $pcCaseLinks->case_id,
            'amazon' => $pcCaseLinks->amazon_link,
            'newegg' => $pcCaseLinks->newegg_link
        ];

        $cpuLinks = CpuRetail::where('cpu_id',$rig['cpu']['id'])->first();
        $cpuRetail = [
            'cpuId' => $cpuLinks->cpu_id,
            'amazon' => $cpuLinks->amazon_link,
            'newegg' => $cpuLinks->newegg_link
        ];

        $gpuLinks = GpuRetail::where('gpu_id',$rig['gpu']['id'])->first();
        $gpuRetail = [
            'gpuId' => $gpuLinks->gpu_id,
            'amazon' => $gpuLinks->amazon_link,
            'newegg' => $gpuLinks->newegg_link
        ];

        $motherboardLinks = MotherboardRetail::where('board_id',$rig['motherboard']['id'])->first();
        $motherboardRetail = [
            'motherboardId' => $motherboardLinks->motherboard_id,
            'amazon' => $motherboardLinks->amazon_link,
            'newegg' => $motherboardLinks->newegg_link
        ];

        $psuLinks = PowerSupplyRetail::where('psu_id',$rig['psu']['id'])->first();
        $psuRetail = [
            'psuId' => $psuLinks->psu_id,
            'amazon' => $psuLinks->amazon_link,
            'newegg' => $psuLinks->newegg_link
        ];

        $airCoolerLinks = null;
        $airCoolerRetail =[];
        if(count($rig['airCooler']) > 0){
            $airCoolerLinks = AirCoolerRetail::where('cooler_id',$rig['airCooler']['id'])->first();
        }
        if($airCoolerLinks !== null){
            $airCoolerRetail = [
                'airCoolerId' => $airCoolerLinks->cooler_id,
                'amazon' => $airCoolerLinks->amazon_link,
                'newegg' => $airCoolerLinks->newegg_link
            ];
        }

        $liquidCoolerLinks = null;
        $liquidCoolerRetail =[];
        if(count($rig['liquidCooler']) > 0) {
            $liquidCoolerLinks = AirCoolerRetail::where('cooler_id', $rig['liquidCooler']['id'])->first();
        }
        if($liquidCoolerLinks !== null){
            $liquidCoolerRetail = [
                'liquidCoolerId' => $liquidCoolerLinks->cooler_id,
                'amazon' => $liquidCoolerLinks->amazon_link,
                'newegg' => $liquidCoolerLinks->newegg_link
            ];
        }

        $ramsRetail = [];
        foreach ($rig['rams'] as $ram){
            $ramLinks = RamRetail::where('ram_id', $ram['id'])->first();
            $ramsRetail[] = [
                'ramId' => $ramLinks->ram_id,
                'amazon' => $ramLinks->amazon_link,
                'newegg' => $ramLinks->newegg_link
            ];
        }

        $hddsRetail = [];
        foreach ($rig['hdds'] as $hdd){
            $hddLinks = HardDriveRetail::where('hdd_id', $hdd['id'])->first();
            $hddsRetail[] = [
                'hddId' => $hddLinks->hdd_id,
                'amazon' => $hddLinks->amazon_link,
                'newegg' => $hddLinks->newegg_link
            ];
        }

        $sataSsdsRetail = [];
        foreach ($rig['sataSSDs'] as $sataSSD){
            $sataSSDLinks = SataSSDRetail::where('ssd_id', $sataSSD['id'])->first();
            $sataSsdsRetail[] = [
                'hddId' => $sataSSDLinks->ssd_id,
                'amazon' => $sataSSDLinks->amazon_link,
                'newegg' => $sataSSDLinks->newegg_link
            ];
        }

        $m2SsdsRetail = [];
        foreach ($rig['m2SSDs'] as $m2SSD){
            $m2SSDLinks = M2SSDRetail::where('ssd_id', $m2SSD['id'])->first();
            $m2SsdsRetail[] = [
                'hddId' => $m2SSDLinks->ssd_id,
                'amazon' => $m2SSDLinks->amazon_link,
                'newegg' => $m2SSDLinks->newegg_link
            ];
        }

        $rigRetail = [
            'pcCase' => $pcCaseRetail,
            'cpu' => $cpuRetail,
            'gpu' => $gpuRetail,
            'rams' => $ramsRetail,
            'motherboard' => $motherboardRetail,
            'liquidCooler' => $liquidCoolerRetail,
            'airCooler' => $airCoolerRetail,
            'psu' => $psuRetail,
            'hdds' => $hddsRetail,
            'sataSSDs' => $sataSsdsRetail,
            'm2SSDs' => $m2SsdsRetail
        ];

        return $rigRetail;
    }
}
