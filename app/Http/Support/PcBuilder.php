<?php

namespace App\Http\Support;

use App\Http\Resources\Api\AirCoolerResource;
use App\Http\Resources\Api\CpuResource;
use App\Http\Resources\Api\GpuResource;
use App\Http\Resources\Api\LiquidCoolerResource;
use App\Http\Resources\Api\M2SSDResource;
use App\Http\Resources\Api\MotherboardResource;
use App\Http\Resources\Api\PCCaseResource;
use App\Http\Resources\Api\PowerSupplyResource;
use App\Http\Resources\Api\RamResource;
use App\Http\Resources\Api\SataSSDResource;
use App\Models\AirCooler;
use App\Models\Cpu;
use App\Models\Gpu;
use App\Models\LiquidCooler;
use App\Models\M2SSD;
use App\Models\MotherBoard;
use App\Models\PCCase;
use App\Models\PowerSupply;
use App\Models\Ram;
use App\Models\SataSSD;
use Illuminate\Support\Facades\Storage;
use Throwable;

class PcBuilder
{
    private static $ssdFormFactors = [
        0 => "M.2 2230",
        1 => "M.2 2242",
        2 => "M.2 2280",
        3 => "M.2 22110"
    ];

    public static function buildLightGamingBudget($cpuPreference, $gpuPreference, $coolerPreference)
    {
        $totalConsumption = 50;

        $cpu = null;
        $cpuResource = null;
        if ($cpuPreference == 1) {
            $cpu = Cpu::where('series_id', 1)->where('threads', 12)->inRandomOrder()->first();
        } else if ($cpuPreference == 2) {
            $cpu = Cpu::where('series_id', 3)->where('threads', 12)->inRandomOrder()->first();
        } else {
            $cpu = Cpu::whereIn('series_id', [1, 3])->where('threads', 12)->inRandomOrder()->first();

        }
        $cpuResource = (new CpuResource($cpu))->toArray(null);
        $totalConsumption += $cpuResource['tdp'];

        $motherboard = null;
        $motherboardResource = null;
        $targetExpansionSlotId = 8;
        if ($cpuResource['brand']['name'] == "AMD") {
            $motherboard = Motherboard::where('name', 'LIKE', '%B550%')->where('memory_type_id', 4)
                ->whereHas('expansionSlots', function ($query) use ($targetExpansionSlotId) {
                    $query->where('expansion_slots.id', '<=', $targetExpansionSlotId);
                })->inRandomOrder()->first();
        } else {
            $motherboard = Motherboard::where('name', 'LIKE', '%B760%')->where('memory_type_id', 4)
                ->whereHas('expansionSlots', function ($query) use ($targetExpansionSlotId) {
                    $query->where('expansion_slots.id', '<=', $targetExpansionSlotId);
                })->inRandomOrder()->first();
        }
        $motherboardResource = (new MotherboardResource($motherboard))->toArray(null);

        $gpu = null;
        $gpuResource = null;
        if ($gpuPreference == 1) {
            $gpu = Gpu::where('name', 'like', "%Radeon%")->where(function ($query) {
                $query->where('expansion_slot_id', 4)
                    ->where('vram', 6);
            })
                ->orWhere(function ($query) {
                    $query->where('expansion_slot_id', 8)
                        ->where('vram', 6);
                })->inRandomOrder()->first();

        } else if ($gpuPreference == 2) {
            $gpu = Gpu::where('name', 'like', "%Geforce%")->where(function ($query) {
                $query->where('expansion_slot_id', 4)
                    ->where('vram', 6);
            })
                ->orWhere(function ($query) {
                    $query->where('expansion_slot_id', 8)
                        ->where('vram', 6);
                })->inRandomOrder()->first();
        } else {
            $gpu = Gpu::where(function ($query) {
                $query->where('expansion_slot_id', 4)
                    ->where('vram', 6);
            })
                ->orWhere(function ($query) {
                    $query->where('expansion_slot_id', 8)
                        ->where('vram', 6);
                })->inRandomOrder()->first();
        }
        $gpuResource = (new GpuResource($gpu))->toArray(null);
        $totalConsumption += $gpuResource['tdp'];

        $ram = Ram::where('memory_type_id', 4)->where('capacity', 16)->where('speed', $cpuResource['memorySpeed'])->inRandomOrder()->first();
        $ramResource = (new RamResource($ram))->toArray(null);

        $cooler = null;
        $coolerResource = null;

        $cpuSocket = $cpuResource['socket']['id'];
        if ($coolerPreference == 0) {
            $cooler = AirCooler::whereHas('sockets', function ($query) use ($cpuSocket) {
                $query->where('sockets.id', $cpuSocket);
            })->inRandomOrder()->first();
            $coolerResource = (new AirCoolerResource($cooler))->toArray(null);
            $totalConsumption += $coolerResource['fans'] * 3;
        } else {
            $cooler = LiquidCooler::whereHas('sockets', function ($query) use ($cpuSocket) {
                $query->where('sockets.id', $cpuSocket);
            })->inRandomOrder()->first();
            $coolerResource = (new LiquidCoolerResource($cooler))->toArray(null);
            $totalConsumption += $coolerResource['fanConsumption'] * $coolerResource['fanCount'] + 15;
        }

        $sataSsd = SataSSD::where('capacity', "1TB")->where('interface_id', 3)->inRandomOrder()->first();
        $sataSsdResource = (new SataSSDResource($sataSsd))->toArray(null);
        $totalConsumption += 10;

        $psu = PowerSupply::where('max_power', '>=', $totalConsumption + 100)->orderBy('max_power')->first();
        $psuResource = (new PowerSupplyResource($psu))->toArray(null);

        $maxGpu = $gpuResource['maxGpuLength'];

        $maxPsu = $psuResource['maxPsuLength'];

        if ($coolerPreference == 0) {
            $maxCooler = $coolerResource['maxCoolerHeight'];
            $pcCase = PCCase::where('factor_id', 3)
                ->where('max_psu_length', '>=', $maxPsu)
                ->where('max_cooler_height', '>=', $maxCooler)
                ->where('max_gpu_length', '>=', $maxGpu)->inRandomOrder()->first();
        } else {
            $coolerLength = 360;
            if (substr($coolerResource['radiatorSize'], 0, 3) > 360) {
                $coolerLength = 420;
            }
            $pcCase = PCCase::where('factor_id', 3)
                ->where('max_psu_length', '>=', $maxPsu)
                ->where('liquid_cooling_support', 'like', '%' . $coolerLength . '%')
                ->where('max_gpu_length', '>=', $maxGpu)->inRandomOrder()->first();
        }

        $pcCaseResource = (new PCCaseResource($pcCase))->toArray(null);


        $rig = null;
        if ($coolerPreference == 0) {
            $rig = [
                'pcCase' => $pcCaseResource,
                'cpu' => $cpuResource,
                'gpu' => $gpuResource,
                'rams' => [$ramResource],
                'motherboard' => $motherboardResource,
                'liquidCooler' => [],
                'airCooler' => $coolerResource,
                'psu' => $psuResource,
                'hdds' => [],
                'sataSSDs' => [$sataSsdResource],
                'm2SSDs' => []
            ];
        } else {
            $rig = [
                'pcCase' => $pcCaseResource,
                'cpu' => $cpuResource,
                'gpu' => $gpuResource,
                'rams' => [$ramResource],
                'motherboard' => $motherboardResource,
                'liquidCooler' => $coolerResource,
                'airCooler' => [],
                'psu' => $psuResource,
                'hdds' => [],
                'sataSSDs' => [$sataSsdResource],
                'm2SSDs' => []
            ];
        }

        return $rig;

    }

    public static function buildLightGamingPower($cpuPreference, $gpuPreference, $coolerPreference)
    {
        $totalConsumption = 50;

        $cpu = null;
        $cpuResource = null;
        if ($cpuPreference == 1) {
            $cpu = Cpu::where('series_id', 1)->where('threads', 16)->inRandomOrder()->first();
        } else if ($cpuPreference == 2) {
            $cpu = Cpu::where('series_id', 3)->where('threads', 16)->inRandomOrder()->first();
        } else {
            $cpu = Cpu::whereIn('series_id', [1, 3])->where('threads', 16)->inRandomOrder()->first();

        }
        $cpuResource = (new CpuResource($cpu))->toArray(null);
        $totalConsumption += $cpuResource['tdp'];

        $motherboard = null;
        $motherboardResource = null;
        $targetExpansionSlotId = 8;
        if ($cpuResource['brand']['name'] == "AMD") {
            $motherboard = Motherboard::where('name', 'LIKE', '%B550%')->where('memory_type_id', 4)
                ->whereHas('expansionSlots', function ($query) use ($targetExpansionSlotId) {
                    $query->where('expansion_slots.id', '<=', $targetExpansionSlotId);
                })->inRandomOrder()->first();
        } else {
            $motherboard = Motherboard::where('name', 'LIKE', '%B760%')->where('memory_type_id', 4)
                ->whereHas('expansionSlots', function ($query) use ($targetExpansionSlotId) {
                    $query->where('expansion_slots.id', '<=', $targetExpansionSlotId);
                })->inRandomOrder()->first();
        }
        $motherboardResource = (new MotherboardResource($motherboard))->toArray(null);

        $gpu = null;
        $gpuResource = null;
        if ($gpuPreference == 1) {
            $gpu = Gpu::where('name', 'like', "%Radeon%")->where('expansion_slot_id', $targetExpansionSlotId)->where('vram', 8)->inRandomOrder()->first();
        } else if ($gpuPreference == 2) {
            $gpu = Gpu::where('name', 'like', "%Geforce%")->where('expansion_slot_id', $targetExpansionSlotId)->where('vram', 8)->inRandomOrder()->first();
        } else {
            $gpu = Gpu::where('expansion_slot_id', $targetExpansionSlotId)->where('vram', 8)->inRandomOrder()->first();
        }
        $gpuResource = (new GpuResource($gpu))->toArray(null);
        $totalConsumption += $gpuResource['tdp'];

        $ram = Ram::where('memory_type_id', 4)->where('capacity', 16)->where('speed', $cpuResource['memorySpeed'])->inRandomOrder()->first();
        $ramResource = (new RamResource($ram))->toArray(null);

        $cooler = null;
        $coolerResource = null;

        $cpuSocket = $cpuResource['socket']['id'];
        if ($coolerPreference == 0) {
            $cooler = AirCooler::whereHas('sockets', function ($query) use ($cpuSocket) {
                $query->where('sockets.id', $cpuSocket);
            })->inRandomOrder()->first();
            $coolerResource = (new AirCoolerResource($cooler))->toArray(null);
            $totalConsumption += $coolerResource['fans'] * 3;
        } else {
            $cooler = LiquidCooler::whereHas('sockets', function ($query) use ($cpuSocket) {
                $query->where('sockets.id', $cpuSocket);
            })->inRandomOrder()->first();
            $coolerResource = (new LiquidCoolerResource($cooler))->toArray(null);
            $totalConsumption += $coolerResource['fanConsumption'] * $coolerResource['fanCount'] + 15;
        }

        $sataSsd = SataSSD::where('capacity', "1TB")->where('interface_id', 3)->inRandomOrder()->first();
        $sataSsdResource = (new SataSSDResource($sataSsd))->toArray(null);
        $totalConsumption += 10;

        $psu = PowerSupply::where('max_power', '>=', $totalConsumption + 150)->orderBy('max_power')->first();
        $psuResource = (new PowerSupplyResource($psu))->toArray(null);

        $maxGpu = $gpuResource['maxGpuLength'];

        $maxPsu = $psuResource['maxPsuLength'];

        if ($coolerPreference == 0) {
            $maxCooler = $coolerResource['maxCoolerHeight'];
            $pcCase = PCCase::where('factor_id', 3)
                ->where('max_psu_length', '>=', $maxPsu)
                ->where('max_cooler_height', '>=', $maxCooler)
                ->where('max_gpu_length', '>=', $maxGpu)->inRandomOrder()->first();
        } else {
            $coolerLength = 360;
            if (substr($coolerResource['radiatorSize'], 0, 3) > 360) {
                $coolerLength = 420;
            }
            $pcCase = PCCase::where('factor_id', 3)
                ->where('max_psu_length', '>=', $maxPsu)
                ->where('liquid_cooling_support', 'like', '%' . $coolerLength . '%')
                ->where('max_gpu_length', '>=', $maxGpu)->inRandomOrder()->first();
        }

        $pcCaseResource = (new PCCaseResource($pcCase))->toArray(null);


        $rig = null;
        if ($coolerPreference == 0) {
            $rig = [
                'pcCase' => $pcCaseResource,
                'cpu' => $cpuResource,
                'gpu' => $gpuResource,
                'rams' => [$ramResource],
                'motherboard' => $motherboardResource,
                'liquidCooler' => [],
                'airCooler' => $coolerResource,
                'psu' => $psuResource,
                'hdds' => [],
                'sataSSDs' => [$sataSsdResource],
                'm2SSDs' => []
            ];
        } else {
            $rig = [
                'pcCase' => $pcCaseResource,
                'cpu' => $cpuResource,
                'gpu' => $gpuResource,
                'rams' => [$ramResource],
                'motherboard' => $motherboardResource,
                'liquidCooler' => $coolerResource,
                'airCooler' => [],
                'psu' => $psuResource,
                'hdds' => [],
                'sataSSDs' => [$sataSsdResource],
                'm2SSDs' => []
            ];
        }

        return $rig;

    }

    public static function buildSeriousGamingBudget($cpuPreference, $gpuPreference, $coolerPreference)
    {
        $totalConsumption = 50;

        $cpu = null;
        $cpuResource = null;
        if ($cpuPreference == 1) {
            $cpu = Cpu::where('series_id', 1)->where('threads', 24)->inRandomOrder()->first();
        } else if ($cpuPreference == 2) {
            $cpu = Cpu::where('series_id', 3)->where('threads', 20)->inRandomOrder()->first();
        } else {
            $cpu = Cpu::where(function ($query) {
                $query->where('series_id', 1)
                    ->where('threads', 24);
            })
                ->orWhere(function ($query) {
                    $query->where('series_id', 3)
                        ->where('threads', 20);
                })->inRandomOrder()->first();

        }
        $cpuResource = (new CpuResource($cpu))->toArray(null);
        $totalConsumption += $cpuResource['tdp'];

        $motherboard = null;
        $motherboardResource = null;
        $targetExpansionSlotId = 8;
        if ($cpuResource['brand']['name'] == "AMD") {
            $motherboard = Motherboard::where('name', 'LIKE', '%X570%')->where('memory_type_id', 4)
                ->whereHas('expansionSlots', function ($query) use ($targetExpansionSlotId) {
                    $query->where('expansion_slots.id', '<=', $targetExpansionSlotId);
                })->inRandomOrder()->first();
        } else {
            $motherboard = Motherboard::where('name', 'LIKE', '%Z690%')->where('memory_type_id', 4)
                ->whereHas('expansionSlots', function ($query) use ($targetExpansionSlotId) {
                    $query->where('expansion_slots.id', '<=', $targetExpansionSlotId);
                })->inRandomOrder()->first();
        }
        $motherboardResource = (new MotherboardResource($motherboard))->toArray(null);

        $gpu = null;
        $gpuResource = null;
        if ($gpuPreference == 1) {
            $gpu = Gpu::where('name', 'like', "%Radeon%")->where('expansion_slot_id', $targetExpansionSlotId)->where('vram', 10)->inRandomOrder()->first();
        } else if ($gpuPreference == 2) {
            $gpu = Gpu::where('name', 'like', "%Geforce%")->where('expansion_slot_id', $targetExpansionSlotId)->where('vram', 10)->inRandomOrder()->first();
        } else {
            $gpu = Gpu::where('expansion_slot_id', $targetExpansionSlotId)->where('vram', 10)->inRandomOrder()->first();
        }
        $gpuResource = (new GpuResource($gpu))->toArray(null);
        $totalConsumption += $gpuResource['tdp'];

        $ram = Ram::where('memory_type_id', 4)->where('capacity', 32)->where('speed', $cpuResource['memorySpeed'])->inRandomOrder()->first();
        $ramResource = (new RamResource($ram))->toArray(null);

        $cooler = null;
        $coolerResource = null;

        $cpuSocket = $cpuResource['socket']['id'];
        if ($coolerPreference == 0) {
            $cooler = AirCooler::whereHas('sockets', function ($query) use ($cpuSocket) {
                $query->where('sockets.id', $cpuSocket);
            })->inRandomOrder()->first();
            $coolerResource = (new AirCoolerResource($cooler))->toArray(null);
            $totalConsumption += $coolerResource['fans'] * 3;
        } else {
            $cooler = LiquidCooler::whereHas('sockets', function ($query) use ($cpuSocket) {
                $query->where('sockets.id', $cpuSocket);
            })->inRandomOrder()->first();
            $coolerResource = (new LiquidCoolerResource($cooler))->toArray(null);
            $totalConsumption += $coolerResource['fanConsumption'] * $coolerResource['fanCount'] + 15;
        }

        $sataSsd = SataSSD::where('capacity', "1TB")->where('interface_id', 3)->inRandomOrder()->first();
        $sataSsdResource = (new SataSSDResource($sataSsd))->toArray(null);
        $totalConsumption += 10;

        $motherboardM2FormFactors = explode("/ ", $motherboardResource['storageInterfaces'][1]['m2FormFactors']);
        $motherboardM2InterfaceId = $motherboardResource['storageInterfaces'][1]['id'];
        $largestSsdFormFactorId = array_search($motherboardM2FormFactors[count($motherboardM2FormFactors) - 1], self::$ssdFormFactors);

        $m2Ssd = M2SSD::where('capacity', "500GB")->where('interface_id', $motherboardM2InterfaceId)->
        where('form_factor_id', '<=', $largestSsdFormFactorId + 1)->inRandomOrder()->first();
        $m2SsdResource = (new M2SSDResource($m2Ssd))->toArray(null);
        $totalConsumption += 10;

        $psu = PowerSupply::where('max_power', '>=', $totalConsumption + 150)->orderBy('max_power')->first();
        $psuResource = (new PowerSupplyResource($psu))->toArray(null);

        $maxGpu = $gpuResource['maxGpuLength'];

        $maxPsu = $psuResource['maxPsuLength'];

        if ($coolerPreference == 0) {
            $maxCooler = $coolerResource['maxCoolerHeight'];
            $pcCase = PCCase::where('factor_id', 3)
                ->where('max_psu_length', '>=', $maxPsu)
                ->where('max_cooler_height', '>=', $maxCooler)
                ->where('max_gpu_length', '>=', $maxGpu)->inRandomOrder()->first();
        } else {
            $coolerLength = 360;
            if (substr($coolerResource['radiatorSize'], 0, 3) > 360) {
                $coolerLength = 420;
            }
            $pcCase = PCCase::where('factor_id', 3)
                ->where('max_psu_length', '>=', $maxPsu)
                ->where('liquid_cooling_support', 'like', '%' . $coolerLength . '%')
                ->where('max_gpu_length', '>=', $maxGpu)->inRandomOrder()->first();
        }

        $pcCaseResource = (new PCCaseResource($pcCase))->toArray(null);


        $rig = null;
        if ($coolerPreference == 0) {
            $rig = [
                'pcCase' => $pcCaseResource,
                'cpu' => $cpuResource,
                'gpu' => $gpuResource,
                'rams' => [$ramResource],
                'motherboard' => $motherboardResource,
                'liquidCooler' => [],
                'airCooler' => $coolerResource,
                'psu' => $psuResource,
                'hdds' => [],
                'sataSSDs' => [$sataSsdResource],
                'm2SSDs' => [$m2SsdResource]
            ];
        } else {
            $rig = [
                'pcCase' => $pcCaseResource,
                'cpu' => $cpuResource,
                'gpu' => $gpuResource,
                'rams' => [$ramResource],
                'motherboard' => $motherboardResource,
                'liquidCooler' => $coolerResource,
                'airCooler' => [],
                'psu' => $psuResource,
                'hdds' => [],
                'sataSSDs' => [$sataSsdResource],
                'm2SSDs' => [$m2SsdResource]
            ];
        }

        return $rig;

    }

    public static function buildSeriousGamingPower($cpuPreference, $gpuPreference, $coolerPreference)
    {
        $totalConsumption = 50;

        $cpu = null;
        $cpuResource = null;
        if ($cpuPreference == 1) {
            $cpu = Cpu::where('series_id', 1)->where('threads', 24)->inRandomOrder()->first();
        } else if ($cpuPreference == 2) {
            $cpu = Cpu::where('series_id', 3)->where('threads', 20)->inRandomOrder()->first();
        } else {
            $cpu = Cpu::where(function ($query) {
                $query->where('series_id', 1)
                    ->where('threads', 24);
            })
                ->orWhere(function ($query) {
                    $query->where('series_id', 3)
                        ->where('threads', 20);
                })->inRandomOrder()->first();

        }
        $cpuResource = (new CpuResource($cpu))->toArray(null);
        $totalConsumption += $cpuResource['tdp'];

        $motherboard = null;
        $motherboardResource = null;
        $targetExpansionSlotId = 8;
        if ($cpuResource['brand']['name'] == "AMD") {
            $motherboard = Motherboard::where('name', 'LIKE', '%X570%')->where('memory_type_id', 4)
                ->whereHas('expansionSlots', function ($query) use ($targetExpansionSlotId) {
                    $query->where('expansion_slots.id', '<=', $targetExpansionSlotId);
                })->inRandomOrder()->first();
        } else {
            $motherboard = Motherboard::where('name', 'LIKE', '%Z690%')->where('memory_type_id', 4)
                ->whereHas('expansionSlots', function ($query) use ($targetExpansionSlotId) {
                    $query->where('expansion_slots.id', '<=', $targetExpansionSlotId);
                })->inRandomOrder()->first();
        }
        $motherboardResource = (new MotherboardResource($motherboard))->toArray(null);

        $gpu = null;
        $gpuResource = null;
        if ($gpuPreference == 1) {
            $gpu = Gpu::where('name', 'like', "%Radeon%")->where('expansion_slot_id', $targetExpansionSlotId)->where('vram', 12)->inRandomOrder()->first();
        } else if ($gpuPreference == 2) {
            $gpu = Gpu::where('name', 'like', "%Geforce%")->where('expansion_slot_id', $targetExpansionSlotId)->where('vram', 12)->inRandomOrder()->first();
        } else {
            $gpu = Gpu::where('expansion_slot_id', $targetExpansionSlotId)->where('vram', 10)->inRandomOrder()->first();
        }
        $gpuResource = (new GpuResource($gpu))->toArray(null);
        $totalConsumption += $gpuResource['tdp'];

        $ram = Ram::where('memory_type_id', 4)->where('capacity', 32)->where('speed', $cpuResource['memorySpeed'])->inRandomOrder()->first();
        $ramResource = (new RamResource($ram))->toArray(null);

        $cooler = null;
        $coolerResource = null;

        $cpuSocket = $cpuResource['socket']['id'];
        if ($coolerPreference == 0) {
            $cooler = AirCooler::whereHas('sockets', function ($query) use ($cpuSocket) {
                $query->where('sockets.id', $cpuSocket);
            })->inRandomOrder()->first();
            $coolerResource = (new AirCoolerResource($cooler))->toArray(null);
            $totalConsumption += $coolerResource['fans'] * 3;
        } else {
            $cooler = LiquidCooler::whereHas('sockets', function ($query) use ($cpuSocket) {
                $query->where('sockets.id', $cpuSocket);
            })->inRandomOrder()->first();
            $coolerResource = (new LiquidCoolerResource($cooler))->toArray(null);
            $totalConsumption += $coolerResource['fanConsumption'] * $coolerResource['fanCount'] + 15;
        }

        $sataSsd = SataSSD::where('capacity', "1TB")->where('interface_id', 3)->inRandomOrder()->first();
        $sataSsdResource = (new SataSSDResource($sataSsd))->toArray(null);
        $totalConsumption += 10;

        $motherboardM2FormFactors = explode("/ ", $motherboardResource['storageInterfaces'][1]['m2FormFactors']);
        $motherboardM2InterfaceId = $motherboardResource['storageInterfaces'][1]['id'];
        $largestSsdFormFactorId = array_search($motherboardM2FormFactors[count($motherboardM2FormFactors) - 1], self::$ssdFormFactors);

        $m2Ssd = M2SSD::where('capacity', "500GB")->where('interface_id', $motherboardM2InterfaceId)->
        where('form_factor_id', '<=', $largestSsdFormFactorId + 1)->inRandomOrder()->first();
        $m2SsdResource = (new M2SSDResource($m2Ssd))->toArray(null);
        $totalConsumption += 10;

        $psu = PowerSupply::where('max_power', '>=', $totalConsumption + 200)->orderBy('max_power')->first();
        $psuResource = (new PowerSupplyResource($psu))->toArray(null);

        $maxGpu = $gpuResource['maxGpuLength'];

        $maxPsu = $psuResource['maxPsuLength'];

        if ($coolerPreference == 0) {
            $maxCooler = $coolerResource['maxCoolerHeight'];
            $pcCase = PCCase::where('factor_id', 3)
                ->where('max_psu_length', '>=', $maxPsu)
                ->where('max_cooler_height', '>=', $maxCooler)
                ->where('max_gpu_length', '>=', $maxGpu)->inRandomOrder()->first();
        } else {
            $coolerLength = 360;
            if (substr($coolerResource['radiatorSize'], 0, 3) > 360) {
                $coolerLength = 420;
            }
            $pcCase = PCCase::where('factor_id', 3)
                ->where('max_psu_length', '>=', $maxPsu)
                ->where('liquid_cooling_support', 'like', '%' . $coolerLength . '%')
                ->where('max_gpu_length', '>=', $maxGpu)->inRandomOrder()->first();
        }

        $pcCaseResource = (new PCCaseResource($pcCase))->toArray(null);


        $rig = null;
        if ($coolerPreference == 0) {
            $rig = [
                'pcCase' => $pcCaseResource,
                'cpu' => $cpuResource,
                'gpu' => $gpuResource,
                'rams' => [$ramResource],
                'motherboard' => $motherboardResource,
                'liquidCooler' => [],
                'airCooler' => $coolerResource,
                'psu' => $psuResource,
                'hdds' => [],
                'sataSSDs' => [$sataSsdResource],
                'm2SSDs' => [$m2SsdResource]
            ];
        } else {
            $rig = [
                'pcCase' => $pcCaseResource,
                'cpu' => $cpuResource,
                'gpu' => $gpuResource,
                'rams' => [$ramResource],
                'motherboard' => $motherboardResource,
                'liquidCooler' => $coolerResource,
                'airCooler' => [],
                'psu' => $psuResource,
                'hdds' => [],
                'sataSSDs' => [$sataSsdResource],
                'm2SSDs' => [$m2SsdResource]
            ];
        }

        return $rig;
    }

    public static function buildStreamingLightGamingBudget($cpuPreference, $gpuPreference, $coolerPreference)
    {
        $totalConsumption = 50;

        $cpu = null;
        $cpuResource = null;
        if ($cpuPreference == 1) {
            $cpu = Cpu::where('series_id', 1)->where('threads', 16)->inRandomOrder()->first();
        } else if ($cpuPreference == 2) {
            $cpu = Cpu::where('series_id', 3)->where('threads', 16)->inRandomOrder()->first();
        } else {
            $cpu = Cpu::whereIn('series_id', [1, 3])->where('threads', 16)->inRandomOrder()->first();

        }
        $cpuResource = (new CpuResource($cpu))->toArray(null);
        $totalConsumption += $cpuResource['tdp'];

        $motherboard = null;
        $motherboardResource = null;
        $targetExpansionSlotId = 8;
        if ($cpuResource['brand']['name'] == "AMD") {
            $motherboard = Motherboard::where('name', 'LIKE', '%B550%')->where('memory_type_id', 4)
                ->whereHas('expansionSlots', function ($query) use ($targetExpansionSlotId) {
                    $query->where('expansion_slots.id', '<=', $targetExpansionSlotId);
                })->inRandomOrder()->first();
        } else {
            $motherboard = Motherboard::where('name', 'LIKE', '%B760%')->where('memory_type_id', 4)
                ->whereHas('expansionSlots', function ($query) use ($targetExpansionSlotId) {
                    $query->where('expansion_slots.id', '<=', $targetExpansionSlotId);
                })->inRandomOrder()->first();
        }
        $motherboardResource = (new MotherboardResource($motherboard))->toArray(null);

        $gpu = null;
        $gpuResource = null;
        if ($gpuPreference == 1) {
            $gpu = Gpu::where('name', 'like', "%Radeon%")->where(function ($query) {
                $query->where('expansion_slot_id', 4)
                    ->where('vram', 6);
            })
                ->orWhere(function ($query) {
                    $query->where('expansion_slot_id', 8)
                        ->where('vram', 6);
                })->inRandomOrder()->first();

        } else if ($gpuPreference == 2) {
            $gpu = Gpu::where('name', 'like', "%Geforce%")->where(function ($query) {
                $query->where('expansion_slot_id', 4)
                    ->where('vram', 6);
            })
                ->orWhere(function ($query) {
                    $query->where('expansion_slot_id', 8)
                        ->where('vram', 6);
                })->inRandomOrder()->first();
        } else {
            $gpu = Gpu::where(function ($query) {
                $query->where('expansion_slot_id', 4)
                    ->where('vram', 6);
            })
                ->orWhere(function ($query) {
                    $query->where('expansion_slot_id', 8)
                        ->where('vram', 6);
                })->inRandomOrder()->first();
        }
        $gpuResource = (new GpuResource($gpu))->toArray(null);
        $totalConsumption += $gpuResource['tdp'];

        $ram = Ram::where('memory_type_id', 4)->where('capacity', 16)->where('speed', $cpuResource['memorySpeed'])->inRandomOrder()->first();
        $ramResource = (new RamResource($ram))->toArray(null);

        $cooler = null;
        $coolerResource = null;

        $cpuSocket = $cpuResource['socket']['id'];
        if ($coolerPreference == 0) {
            $cooler = AirCooler::whereHas('sockets', function ($query) use ($cpuSocket) {
                $query->where('sockets.id', $cpuSocket);
            })->inRandomOrder()->first();
            $coolerResource = (new AirCoolerResource($cooler))->toArray(null);
            $totalConsumption += $coolerResource['fans'] * 3;
        } else {
            $cooler = LiquidCooler::whereHas('sockets', function ($query) use ($cpuSocket) {
                $query->where('sockets.id', $cpuSocket);
            })->inRandomOrder()->first();
            $coolerResource = (new LiquidCoolerResource($cooler))->toArray(null);
            $totalConsumption += $coolerResource['fanConsumption'] * $coolerResource['fanCount'] + 15;
        }

        $sataSsd = SataSSD::where('capacity', "2TB")->where('interface_id', 3)->inRandomOrder()->first();
        $sataSsdResource = (new SataSSDResource($sataSsd))->toArray(null);
        $totalConsumption += 10;

        $psu = PowerSupply::where('max_power', '>=', $totalConsumption + 150)->orderBy('max_power')->first();
        $psuResource = (new PowerSupplyResource($psu))->toArray(null);

        $maxGpu = $gpuResource['maxGpuLength'];

        $maxPsu = $psuResource['maxPsuLength'];

        if ($coolerPreference == 0) {
            $maxCooler = $coolerResource['maxCoolerHeight'];
            $pcCase = PCCase::where('factor_id', 3)
                ->where('max_psu_length', '>=', $maxPsu)
                ->where('max_cooler_height', '>=', $maxCooler)
                ->where('max_gpu_length', '>=', $maxGpu)->inRandomOrder()->first();
        } else {
            $coolerLength = 360;
            if (substr($coolerResource['radiatorSize'], 0, 3) > 360) {
                $coolerLength = 420;
            }
            $pcCase = PCCase::where('factor_id', 3)
                ->where('max_psu_length', '>=', $maxPsu)
                ->where('liquid_cooling_support', 'like', '%' . $coolerLength . '%')
                ->where('max_gpu_length', '>=', $maxGpu)->inRandomOrder()->first();
        }

        $pcCaseResource = (new PCCaseResource($pcCase))->toArray(null);


        $rig = null;
        if ($coolerPreference == 0) {
            $rig = [
                'pcCase' => $pcCaseResource,
                'cpu' => $cpuResource,
                'gpu' => $gpuResource,
                'rams' => [$ramResource],
                'motherboard' => $motherboardResource,
                'liquidCooler' => [],
                'airCooler' => $coolerResource,
                'psu' => $psuResource,
                'hdds' => [],
                'sataSSDs' => [$sataSsdResource],
                'm2SSDs' => []
            ];
        } else {
            $rig = [
                'pcCase' => $pcCaseResource,
                'cpu' => $cpuResource,
                'gpu' => $gpuResource,
                'rams' => [$ramResource],
                'motherboard' => $motherboardResource,
                'liquidCooler' => $coolerResource,
                'airCooler' => [],
                'psu' => $psuResource,
                'hdds' => [],
                'sataSSDs' => [$sataSsdResource],
                'm2SSDs' => []
            ];
        }

        return $rig;

    }

    public static function buildStreamingLightGamingPower($cpuPreference, $gpuPreference, $coolerPreference)
    {
        $totalConsumption = 50;

        $cpu = null;
        $cpuResource = null;
        if ($cpuPreference == 1) {
            $cpu = Cpu::where('series_id', 1)->where('threads', 16)->inRandomOrder()->first();
        } else if ($cpuPreference == 2) {
            $cpu = Cpu::where('series_id', 3)->where('threads', 16)->inRandomOrder()->first();
        } else {
            $cpu = Cpu::whereIn('series_id', [1, 3])->where('threads', 16)->inRandomOrder()->first();

        }
        $cpuResource = (new CpuResource($cpu))->toArray(null);
        $totalConsumption += $cpuResource['tdp'];

        $motherboard = null;
        $motherboardResource = null;
        $targetExpansionSlotId = 8;
        if ($cpuResource['brand']['name'] == "AMD") {
            $motherboard = Motherboard::where('name', 'LIKE', '%B550%')->where('memory_type_id', 4)
                ->whereHas('expansionSlots', function ($query) use ($targetExpansionSlotId) {
                    $query->where('expansion_slots.id', '<=', $targetExpansionSlotId);
                })->inRandomOrder()->first();
        } else {
            $motherboard = Motherboard::where('name', 'LIKE', '%B760%')->where('memory_type_id', 4)
                ->whereHas('expansionSlots', function ($query) use ($targetExpansionSlotId) {
                    $query->where('expansion_slots.id', '<=', $targetExpansionSlotId);
                })->inRandomOrder()->first();
        }
        $motherboardResource = (new MotherboardResource($motherboard))->toArray(null);

        $gpu = null;
        $gpuResource = null;
        if ($gpuPreference == 1) {
            $gpu = Gpu::where('name', 'like', "%Radeon%")->where('expansion_slot_id', $targetExpansionSlotId)->where('vram', 8)->inRandomOrder()->first();
        } else if ($gpuPreference == 2) {
            $gpu = Gpu::where('name', 'like', "%Geforce%")->where('expansion_slot_id', $targetExpansionSlotId)->where('vram', 8)->inRandomOrder()->first();
        } else {
            $gpu = Gpu::where('expansion_slot_id', $targetExpansionSlotId)->where('vram', 8)->inRandomOrder()->first();
        }
        $gpuResource = (new GpuResource($gpu))->toArray(null);
        $totalConsumption += $gpuResource['tdp'];

        $ram = Ram::where('memory_type_id', 4)->where('capacity', 16)->where('speed', $cpuResource['memorySpeed'])->inRandomOrder()->first();
        $ramResource = (new RamResource($ram))->toArray(null);

        $cooler = null;
        $coolerResource = null;

        $cpuSocket = $cpuResource['socket']['id'];
        if ($coolerPreference == 0) {
            $cooler = AirCooler::whereHas('sockets', function ($query) use ($cpuSocket) {
                $query->where('sockets.id', $cpuSocket);
            })->inRandomOrder()->first();
            $coolerResource = (new AirCoolerResource($cooler))->toArray(null);
            $totalConsumption += $coolerResource['fans'] * 3;
        } else {
            $cooler = LiquidCooler::whereHas('sockets', function ($query) use ($cpuSocket) {
                $query->where('sockets.id', $cpuSocket);
            })->inRandomOrder()->first();
            $coolerResource = (new LiquidCoolerResource($cooler))->toArray(null);
            $totalConsumption += $coolerResource['fanConsumption'] * $coolerResource['fanCount'] + 15;
        }

        $sataSsd = SataSSD::where('capacity', "2TB")->where('interface_id', 3)->inRandomOrder()->first();
        $sataSsdResource = (new SataSSDResource($sataSsd))->toArray(null);
        $totalConsumption += 10;

        $psu = PowerSupply::where('max_power', '>=', $totalConsumption + 150)->orderBy('max_power')->first();
        $psuResource = (new PowerSupplyResource($psu))->toArray(null);

        $maxGpu = $gpuResource['maxGpuLength'];

        $maxPsu = $psuResource['maxPsuLength'];

        if ($coolerPreference == 0) {
            $maxCooler = $coolerResource['maxCoolerHeight'];
            $pcCase = PCCase::where('factor_id', 3)
                ->where('max_psu_length', '>=', $maxPsu)
                ->where('max_cooler_height', '>=', $maxCooler)
                ->where('max_gpu_length', '>=', $maxGpu)->inRandomOrder()->first();
        } else {
            $coolerLength = 360;
            if (substr($coolerResource['radiatorSize'], 0, 3) > 360) {
                $coolerLength = 420;
            }
            $pcCase = PCCase::where('factor_id', 3)
                ->where('max_psu_length', '>=', $maxPsu)
                ->where('liquid_cooling_support', 'like', '%' . $coolerLength . '%')
                ->where('max_gpu_length', '>=', $maxGpu)->inRandomOrder()->first();
        }

        $pcCaseResource = (new PCCaseResource($pcCase))->toArray(null);


        $rig = null;
        if ($coolerPreference == 0) {
            $rig = [
                'pcCase' => $pcCaseResource,
                'cpu' => $cpuResource,
                'gpu' => $gpuResource,
                'rams' => [$ramResource],
                'motherboard' => $motherboardResource,
                'liquidCooler' => [],
                'airCooler' => $coolerResource,
                'psu' => $psuResource,
                'hdds' => [],
                'sataSSDs' => [$sataSsdResource],
                'm2SSDs' => []
            ];
        } else {
            $rig = [
                'pcCase' => $pcCaseResource,
                'cpu' => $cpuResource,
                'gpu' => $gpuResource,
                'rams' => [$ramResource],
                'motherboard' => $motherboardResource,
                'liquidCooler' => $coolerResource,
                'airCooler' => [],
                'psu' => $psuResource,
                'hdds' => [],
                'sataSSDs' => [$sataSsdResource],
                'm2SSDs' => []
            ];
        }

        return $rig;

    }

    public static function buildStreamingSeriousGamingBudget($cpuPreference, $gpuPreference, $coolerPreference)
    {
        $totalConsumption = 50;

        $cpu = null;
        $cpuResource = null;
        if ($cpuPreference == 1) {
            $cpu = Cpu::where('series_id', 1)->where('threads', 24)->inRandomOrder()->first();
        } else if ($cpuPreference == 2) {
            $cpu = Cpu::where('series_id', 3)->where('threads', 20)->inRandomOrder()->first();
        } else {
            $cpu = Cpu::where(function ($query) {
                $query->where('series_id', 1)
                    ->where('threads', 24);
            })
                ->orWhere(function ($query) {
                    $query->where('series_id', 3)
                        ->where('threads', 20);
                })->inRandomOrder()->first();

        }
        $cpuResource = (new CpuResource($cpu))->toArray(null);
        $totalConsumption += $cpuResource['tdp'];

        $motherboard = null;
        $motherboardResource = null;
        $targetExpansionSlotId = 8;
        if ($cpuResource['brand']['name'] == "AMD") {
            $motherboard = Motherboard::where('name', 'LIKE', '%X570%')->where('memory_type_id', 4)
                ->whereHas('expansionSlots', function ($query) use ($targetExpansionSlotId) {
                    $query->where('expansion_slots.id', '<=', $targetExpansionSlotId);
                })->inRandomOrder()->first();
        } else {
            $motherboard = Motherboard::where('name', 'LIKE', '%Z690%')->where('memory_type_id', 4)
                ->whereHas('expansionSlots', function ($query) use ($targetExpansionSlotId) {
                    $query->where('expansion_slots.id', '<=', $targetExpansionSlotId);
                })->inRandomOrder()->first();
        }
        $motherboardResource = (new MotherboardResource($motherboard))->toArray(null);

        $gpu = null;
        $gpuResource = null;
        if ($gpuPreference == 1) {
            $gpu = Gpu::where('name', 'like', "%Radeon%")->where('expansion_slot_id', $targetExpansionSlotId)->where('vram', 12)->inRandomOrder()->first();
        } else if ($gpuPreference == 2) {
            $gpu = Gpu::where('name', 'like', "%Geforce%")->where('expansion_slot_id', $targetExpansionSlotId)->where('vram', 12)->inRandomOrder()->first();
        } else {
            $gpu = Gpu::where('expansion_slot_id', $targetExpansionSlotId)->where('vram', 10)->inRandomOrder()->first();
        }
        $gpuResource = (new GpuResource($gpu))->toArray(null);
        $totalConsumption += $gpuResource['tdp'];

        $ram = Ram::where('memory_type_id', 4)->where('capacity', 32)->where('speed', $cpuResource['memorySpeed'])->inRandomOrder()->first();
        $ramResource = (new RamResource($ram))->toArray(null);

        $cooler = null;
        $coolerResource = null;

        $cpuSocket = $cpuResource['socket']['id'];
        if ($coolerPreference == 0) {
            $cooler = AirCooler::whereHas('sockets', function ($query) use ($cpuSocket) {
                $query->where('sockets.id', $cpuSocket);
            })->inRandomOrder()->first();
            $coolerResource = (new AirCoolerResource($cooler))->toArray(null);
            $totalConsumption += $coolerResource['fans'] * 3;
        } else {
            $cooler = LiquidCooler::whereHas('sockets', function ($query) use ($cpuSocket) {
                $query->where('sockets.id', $cpuSocket);
            })->inRandomOrder()->first();
            $coolerResource = (new LiquidCoolerResource($cooler))->toArray(null);
            $totalConsumption += $coolerResource['fanConsumption'] * $coolerResource['fanCount'] + 15;
        }

        $sataSsd = SataSSD::where('capacity', "2TB")->where('interface_id', 3)->inRandomOrder()->first();
        $sataSsdResource = (new SataSSDResource($sataSsd))->toArray(null);
        $totalConsumption += 10;

        $motherboardM2FormFactors = explode("/ ", $motherboardResource['storageInterfaces'][1]['m2FormFactors']);
        $motherboardM2InterfaceId = $motherboardResource['storageInterfaces'][1]['interfaceSupport'][0]['id'];
        if($motherboardM2InterfaceId == 3){
            $motherboardM2InterfaceId = $motherboardResource['storageInterfaces'][1]['interfaceSupport'][1]['id'];
        }
        $largestSsdFormFactorId = array_search($motherboardM2FormFactors[count($motherboardM2FormFactors) - 1], self::$ssdFormFactors);

        $m2Ssd = M2SSD::where('capacity', "500GB")->where('interface_id', $motherboardM2InterfaceId)->
        where('form_factor_id', '<=', $largestSsdFormFactorId + 1)->inRandomOrder()->first();
        $m2SsdResource = (new M2SSDResource($m2Ssd))->toArray(null);
        $totalConsumption += 10;

        $psu = PowerSupply::where('max_power', '>=', $totalConsumption + 150)->orderBy('max_power')->first();
        $psuResource = (new PowerSupplyResource($psu))->toArray(null);

        $maxGpu = $gpuResource['maxGpuLength'];

        $maxPsu = $psuResource['maxPsuLength'];

        if ($coolerPreference == 0) {
            $maxCooler = $coolerResource['maxCoolerHeight'];
            $pcCase = PCCase::where('factor_id', 3)
                ->where('max_psu_length', '>=', $maxPsu)
                ->where('max_cooler_height', '>=', $maxCooler)
                ->where('max_gpu_length', '>=', $maxGpu)->inRandomOrder()->first();
        } else {
            $coolerLength = 360;
            if (substr($coolerResource['radiatorSize'], 0, 3) > 360) {
                $coolerLength = 420;
            }
            $pcCase = PCCase::where('factor_id', 3)
                ->where('max_psu_length', '>=', $maxPsu)
                ->where('liquid_cooling_support', 'like', '%' . $coolerLength . '%')
                ->where('max_gpu_length', '>=', $maxGpu)->inRandomOrder()->first();
        }

        $pcCaseResource = (new PCCaseResource($pcCase))->toArray(null);


        $rig = null;
        if ($coolerPreference == 0) {
            $rig = [
                'pcCase' => $pcCaseResource,
                'cpu' => $cpuResource,
                'gpu' => $gpuResource,
                'rams' => [$ramResource],
                'motherboard' => $motherboardResource,
                'liquidCooler' => [],
                'airCooler' => $coolerResource,
                'psu' => $psuResource,
                'hdds' => [],
                'sataSSDs' => [$sataSsdResource],
                'm2SSDs' => [$m2SsdResource]
            ];
        } else {
            $rig = [
                'pcCase' => $pcCaseResource,
                'cpu' => $cpuResource,
                'gpu' => $gpuResource,
                'rams' => [$ramResource],
                'motherboard' => $motherboardResource,
                'liquidCooler' => $coolerResource,
                'airCooler' => [],
                'psu' => $psuResource,
                'hdds' => [],
                'sataSSDs' => [$sataSsdResource],
                'm2SSDs' => [$m2SsdResource]
            ];
        }

        return $rig;

    }

    public static function buildStreamingSeriousGamingPower($cpuPreference, $gpuPreference, $coolerPreference)
    {
        $totalConsumption = 50;

        $cpu = null;
        $cpuResource = null;
        if ($cpuPreference == 1) {
            $cpu = Cpu::where('series_id', 1)->where('threads', 32)->inRandomOrder()->first();
        } else if ($cpuPreference == 2) {
            $cpu = Cpu::where('series_id', 3)->where('threads', 24)->inRandomOrder()->first();
        } else {
            $cpu = Cpu::where(function ($query) {
                $query->where('series_id', 1)
                    ->where('threads', 32);
            })
                ->orWhere(function ($query) {
                    $query->where('series_id', 3)
                        ->where('threads', 24);
                })->inRandomOrder()->first();

        }
        $cpuResource = (new CpuResource($cpu))->toArray(null);
        $totalConsumption += $cpuResource['tdp'];

        $motherboard = null;
        $motherboardResource = null;
        $targetExpansionSlotId = 8;
        if ($cpuResource['brand']['name'] == "AMD") {
            $motherboard = Motherboard::where('name', 'LIKE', '%X570%')->where('memory_type_id', 4)
                ->whereHas('expansionSlots', function ($query) use ($targetExpansionSlotId) {
                    $query->where('expansion_slots.id', '<=', $targetExpansionSlotId);
                })->inRandomOrder()->first();
        } else {
            $motherboard = Motherboard::where('name', 'LIKE', '%Z690%')->where('memory_type_id', 4)
                ->whereHas('expansionSlots', function ($query) use ($targetExpansionSlotId) {
                    $query->where('expansion_slots.id', '<=', $targetExpansionSlotId);
                })->inRandomOrder()->first();
        }
        $motherboardResource = (new MotherboardResource($motherboard))->toArray(null);

        $gpu = null;
        $gpuResource = null;
        if ($gpuPreference == 1) {
            $gpu = Gpu::where('name', 'like', "%Radeon%")->where('expansion_slot_id', $targetExpansionSlotId)->where('vram', 12)->inRandomOrder()->first();
        } else if ($gpuPreference == 2) {
            $gpu = Gpu::where('name', 'like', "%Geforce%")->where('expansion_slot_id', $targetExpansionSlotId)->where('vram', 12)->inRandomOrder()->first();
        } else {
            $gpu = Gpu::where('expansion_slot_id', $targetExpansionSlotId)->where('vram', 10)->inRandomOrder()->first();
        }
        $gpuResource = (new GpuResource($gpu))->toArray(null);
        $totalConsumption += $gpuResource['tdp'];

        $ram = Ram::where('memory_type_id', 4)->where('capacity', 32)->where('speed', $cpuResource['memorySpeed'])->inRandomOrder()->first();
        $ramResource = (new RamResource($ram))->toArray(null);

        $cooler = null;
        $coolerResource = null;

        $cpuSocket = $cpuResource['socket']['id'];
        if ($coolerPreference == 0) {
            $cooler = AirCooler::whereHas('sockets', function ($query) use ($cpuSocket) {
                $query->where('sockets.id', $cpuSocket);
            })->inRandomOrder()->first();
            $coolerResource = (new AirCoolerResource($cooler))->toArray(null);
            $totalConsumption += $coolerResource['fans'] * 3;
        } else {
            $cooler = LiquidCooler::whereHas('sockets', function ($query) use ($cpuSocket) {
                $query->where('sockets.id', $cpuSocket);
            })->inRandomOrder()->first();
            $coolerResource = (new LiquidCoolerResource($cooler))->toArray(null);
            $totalConsumption += $coolerResource['fanConsumption'] * $coolerResource['fanCount'] + 15;
        }

        $sataSsd = SataSSD::where('capacity', "2TB")->where('interface_id', 3)->inRandomOrder()->first();
        $sataSsdResource = (new SataSSDResource($sataSsd))->toArray(null);
        $totalConsumption += 10;

        $motherboardM2FormFactors = explode("/ ", $motherboardResource['storageInterfaces'][1]['m2FormFactors']);
        $motherboardM2InterfaceId = $motherboardResource['storageInterfaces'][1]['interfaceSupport'][0]['id'];
        if($motherboardM2InterfaceId == 3){
            $motherboardM2InterfaceId = $motherboardResource['storageInterfaces'][1]['interfaceSupport'][1]['id'];
        }
        $largestSsdFormFactorId = array_search($motherboardM2FormFactors[count($motherboardM2FormFactors) - 1], self::$ssdFormFactors);

        $m2Ssd = M2SSD::where('capacity', "1TB")->where('interface_id', $motherboardM2InterfaceId)->
        where('form_factor_id', '<=', $largestSsdFormFactorId + 1)->inRandomOrder()->first();
        $m2SsdResource = (new M2SSDResource($m2Ssd))->toArray(null);
        $totalConsumption += 10;

        $psu = PowerSupply::where('max_power', '>=', $totalConsumption + 200)->orderBy('max_power')->first();
        $psuResource = (new PowerSupplyResource($psu))->toArray(null);

        $maxGpu = $gpuResource['maxGpuLength'];

        $maxPsu = $psuResource['maxPsuLength'];

        if ($coolerPreference == 0) {
            $maxCooler = $coolerResource['maxCoolerHeight'];
            $pcCase = PCCase::where('factor_id', 3)
                ->where('max_psu_length', '>=', $maxPsu)
                ->where('max_cooler_height', '>=', $maxCooler)
                ->where('max_gpu_length', '>=', $maxGpu)->inRandomOrder()->first();
        } else {
            $coolerLength = 360;
            if (substr($coolerResource['radiatorSize'], 0, 3) > 360) {
                $coolerLength = 420;
            }
            $pcCase = PCCase::where('factor_id', 3)
                ->where('max_psu_length', '>=', $maxPsu)
                ->where('liquid_cooling_support', 'like', '%' . $coolerLength . '%')
                ->where('max_gpu_length', '>=', $maxGpu)->inRandomOrder()->first();
        }

        $pcCaseResource = (new PCCaseResource($pcCase))->toArray(null);


        $rig = null;
        if ($coolerPreference == 0) {
            $rig = [
                'pcCase' => $pcCaseResource,
                'cpu' => $cpuResource,
                'gpu' => $gpuResource,
                'rams' => [$ramResource],
                'motherboard' => $motherboardResource,
                'liquidCooler' => [],
                'airCooler' => $coolerResource,
                'psu' => $psuResource,
                'hdds' => [],
                'sataSSDs' => [$sataSsdResource],
                'm2SSDs' => [$m2SsdResource]
            ];
        } else {
            $rig = [
                'pcCase' => $pcCaseResource,
                'cpu' => $cpuResource,
                'gpu' => $gpuResource,
                'rams' => [$ramResource],
                'motherboard' => $motherboardResource,
                'liquidCooler' => $coolerResource,
                'airCooler' => [],
                'psu' => $psuResource,
                'hdds' => [],
                'sataSSDs' => [$sataSsdResource],
                'm2SSDs' => [$m2SsdResource]
            ];
        }

        return $rig;
    }

    public static function buildNextGenGamingBudget($cpuPreference, $gpuPreference, $coolerPreference)
    {
        $totalConsumption = 50;

        $cpu = null;
        $cpuResource = null;
        if ($cpuPreference == 1) {
            $cpu = Cpu::where('series_id', 2)->where('threads', 32)->inRandomOrder()->first();
        } else if ($cpuPreference == 2) {
            $cpu = Cpu::where('series_id', 4)->where('threads', 20)->inRandomOrder()->first();
        } else {
            $cpu = Cpu::where(function ($query) {
                $query->where('series_id', 2)
                    ->where('threads', 32);
            })
                ->orWhere(function ($query) {
                    $query->where('series_id', 4)
                        ->where('threads', 24);
                })->inRandomOrder()->first();

        }
        $cpuResource = (new CpuResource($cpu))->toArray(null);
        $totalConsumption += $cpuResource['tdp'];

        $motherboard = null;
        $motherboardResource = null;
        $targetExpansionSlotId = 8;
        if ($cpuResource['brand']['name'] == "AMD") {
            $motherboard = Motherboard::where('name', 'LIKE', '%X670%')->where('memory_type_id', 5)
                ->whereHas('expansionSlots', function ($query) use ($targetExpansionSlotId) {
                    $query->where('expansion_slots.id', '<=', $targetExpansionSlotId);
                })->inRandomOrder()->first();
        } else {
            $motherboard = Motherboard::where('name', 'LIKE', '%Z790%')->where('memory_type_id', 5)
                ->whereHas('expansionSlots', function ($query) use ($targetExpansionSlotId) {
                    $query->where('expansion_slots.id', '<=', $targetExpansionSlotId);
                })->inRandomOrder()->first();
        }
        $motherboardResource = (new MotherboardResource($motherboard))->toArray(null);

        $gpu = null;
        $gpuResource = null;
        if ($gpuPreference == 1) {
            $gpu = Gpu::where('name', 'like', "%Radeon%")->where('expansion_slot_id', $targetExpansionSlotId)->where('vram', 16)->inRandomOrder()->first();
        } else if ($gpuPreference == 2) {
            $gpu = Gpu::where('name', 'like', "%Geforce%")->where('expansion_slot_id', $targetExpansionSlotId)->where('vram', 16)->inRandomOrder()->first();
        } else {
            $gpu = Gpu::where('expansion_slot_id', $targetExpansionSlotId)->where('vram', 16)->inRandomOrder()->first();
        }
        $gpuResource = (new GpuResource($gpu))->toArray(null);
        $totalConsumption += $gpuResource['tdp'];

        if(str_contains($cpu['name'],"AMD")){
            $ram = Ram::where('memory_type_id', 5)->where('speed', $cpuResource['memorySpeed'])->inRandomOrder()->first();
        }
        else{
            $ram = Ram::where('memory_type_id', 5)->where('speed', $cpuResource['memory2Speed'])->inRandomOrder()->first();
        }

        $ramResource = (new RamResource($ram))->toArray(null);

        $cooler = null;
        $coolerResource = null;

        $cpuSocket = $cpuResource['socket']['id'];
        if ($coolerPreference == 0) {
            $cooler = AirCooler::whereHas('sockets', function ($query) use ($cpuSocket) {
                $query->where('sockets.id', $cpuSocket);
            })->inRandomOrder()->first();
            $coolerResource = (new AirCoolerResource($cooler))->toArray(null);
            $totalConsumption += $coolerResource['fans'] * 3;
        } else {
            $cooler = LiquidCooler::whereHas('sockets', function ($query) use ($cpuSocket) {
                $query->where('sockets.id', $cpuSocket);
            })->inRandomOrder()->first();
            $coolerResource = (new LiquidCoolerResource($cooler))->toArray(null);
            $totalConsumption += $coolerResource['fanConsumption'] * $coolerResource['fanCount'] + 15;
        }

        $sataSsd = SataSSD::where('capacity', "2TB")->where('interface_id', 3)->inRandomOrder()->first();
        $sataSsdResource = (new SataSSDResource($sataSsd))->toArray(null);
        $totalConsumption += 10;

        $motherboardM2FormFactors = explode("/ ", $motherboardResource['storageInterfaces'][1]['m2FormFactors']);
        $motherboardM2InterfaceId = $motherboardResource['storageInterfaces'][1]['interfaceSupport'][0]['id'];
        if($motherboardM2InterfaceId == 3){
            $motherboardM2InterfaceId = $motherboardResource['storageInterfaces'][1]['interfaceSupport'][1]['id'];
        }
        $largestSsdFormFactorId = array_search($motherboardM2FormFactors[count($motherboardM2FormFactors) - 1], self::$ssdFormFactors);

        $m2Ssd = M2SSD::where(function ($query) use ($largestSsdFormFactorId, $motherboardM2InterfaceId){
                $query->where('capacity', "1TB")->where('form_factor_id', '<=', $largestSsdFormFactorId + 1)->where('interface_id', $motherboardM2InterfaceId);
            })->inRandomOrder()->first();

        $m2SsdResource = (new M2SSDResource($m2Ssd))->toArray(null);
        $totalConsumption += 10;

        $psu = PowerSupply::where('max_power', '>=', $totalConsumption + 200)->orderBy('max_power')->first();
        $psuResource = (new PowerSupplyResource($psu))->toArray(null);

        $maxGpu = $gpuResource['maxGpuLength'];

        $maxPsu = $psuResource['maxPsuLength'];

        if ($coolerPreference == 0) {
            $maxCooler = $coolerResource['maxCoolerHeight'];
            $pcCase = PCCase::where('factor_id', 3)
                ->where('max_psu_length', '>=', $maxPsu)
                ->where('max_cooler_height', '>=', $maxCooler)
                ->where('max_gpu_length', '>=', $maxGpu)->inRandomOrder()->first();
        } else {
            $coolerLength = 360;
            if (substr($coolerResource['radiatorSize'], 0, 3) > 360) {
                $coolerLength = 420;
            }
            $pcCase = PCCase::where('factor_id', 3)
                ->where('max_psu_length', '>=', $maxPsu)
                ->where('liquid_cooling_support', 'like', '%' . $coolerLength . '%')
                ->where('max_gpu_length', '>=', $maxGpu)->inRandomOrder()->first();
        }

        $pcCaseResource = (new PCCaseResource($pcCase))->toArray(null);


        $rig = null;
        if ($coolerPreference == 0) {
            $rig = [
                'pcCase' => $pcCaseResource,
                'cpu' => $cpuResource,
                'gpu' => $gpuResource,
                'rams' => [$ramResource],
                'motherboard' => $motherboardResource,
                'liquidCooler' => [],
                'airCooler' => $coolerResource,
                'psu' => $psuResource,
                'hdds' => [],
                'sataSSDs' => [$sataSsdResource],
                'm2SSDs' => [$m2SsdResource]
            ];
        } else {
            $rig = [
                'pcCase' => $pcCaseResource,
                'cpu' => $cpuResource,
                'gpu' => $gpuResource,
                'rams' => [$ramResource],
                'motherboard' => $motherboardResource,
                'liquidCooler' => $coolerResource,
                'airCooler' => [],
                'psu' => $psuResource,
                'hdds' => [],
                'sataSSDs' => [$sataSsdResource],
                'm2SSDs' => [$m2SsdResource]
            ];
        }

        return $rig;

    }

    public static function buildNextGenGamingPower($cpuPreference, $gpuPreference, $coolerPreference)
    {
        $totalConsumption = 50;

        $cpu = null;
        $cpuResource = null;
        if ($cpuPreference == 1) {
            $cpu = Cpu::where('series_id', 2)->where('threads', 32)->inRandomOrder()->first();
        } else if ($cpuPreference == 2) {
            $cpu = Cpu::where('series_id', 4)->where('threads', 20)->inRandomOrder()->first();
        } else {
            $cpu = Cpu::where(function ($query) {
                $query->where('series_id', 2)
                    ->where('threads', 32);
            })
                ->orWhere(function ($query) {
                    $query->where('series_id', 4)
                        ->where('threads', 24);
                })->inRandomOrder()->first();

        }
        $cpuResource = (new CpuResource($cpu))->toArray(null);
        $totalConsumption += $cpuResource['tdp'];

        $motherboard = null;
        $motherboardResource = null;
        $targetExpansionSlotId = 8;
        if ($cpuResource['brand']['name'] == "AMD") {
            $motherboard = Motherboard::where('name', 'LIKE', '%X670%')->where('memory_type_id', 5)
                ->whereHas('expansionSlots', function ($query) use ($targetExpansionSlotId) {
                    $query->where('expansion_slots.id', '<=', $targetExpansionSlotId);
                })->inRandomOrder()->first();
        } else {
            $motherboard = Motherboard::where('name', 'LIKE', '%Z790%')->where('memory_type_id', 5)
                ->whereHas('expansionSlots', function ($query) use ($targetExpansionSlotId) {
                    $query->where('expansion_slots.id', '<=', $targetExpansionSlotId);
                })->inRandomOrder()->first();
        }
        $motherboardResource = (new MotherboardResource($motherboard))->toArray(null);

        $gpu = null;
        $gpuResource = null;
        if ($gpuPreference == 1) {
            $gpu = Gpu::where('name', 'like', "%Radeon%")->where('expansion_slot_id', $targetExpansionSlotId)->where('vram', 24)->inRandomOrder()->first();
        } else if ($gpuPreference == 2) {
            $gpu = Gpu::where('name', 'like', "%Geforce%")->where('expansion_slot_id', $targetExpansionSlotId)->where('vram', 24)->inRandomOrder()->first();
        } else {
            $gpu = Gpu::where('expansion_slot_id', $targetExpansionSlotId)->where('vram', 24)->inRandomOrder()->first();
        }
        $gpuResource = (new GpuResource($gpu))->toArray(null);
        $totalConsumption += $gpuResource['tdp'];

        if(str_contains($cpu['name'],"AMD")){
            $ram = Ram::where('memory_type_id', 5)->where('speed', $cpuResource['memorySpeed'])->inRandomOrder()->first();
        }
        else{
            $ram = Ram::where('memory_type_id', 5)->where('speed', $cpuResource['memory2Speed'])->inRandomOrder()->first();
        }


        $ramResource = (new RamResource($ram))->toArray(null);

        $cooler = null;
        $coolerResource = null;

        $cpuSocket = $cpuResource['socket']['id'];
        if ($coolerPreference == 0) {
            $cooler = AirCooler::whereHas('sockets', function ($query) use ($cpuSocket) {
                $query->where('sockets.id', $cpuSocket);
            })->inRandomOrder()->first();
            $coolerResource = (new AirCoolerResource($cooler))->toArray(null);
            $totalConsumption += $coolerResource['fans'] * 3;
        } else {
            $cooler = LiquidCooler::whereHas('sockets', function ($query) use ($cpuSocket) {
                $query->where('sockets.id', $cpuSocket);
            })->inRandomOrder()->first();
            $coolerResource = (new LiquidCoolerResource($cooler))->toArray(null);
            $totalConsumption += $coolerResource['fanConsumption'] * $coolerResource['fanCount'] + 15;
        }

        $sataSsd = SataSSD::where('capacity', "2TB")->where('interface_id', 3)->inRandomOrder()->first();
        $sataSsdResource = (new SataSSDResource($sataSsd))->toArray(null);
        $totalConsumption += 10;

        $motherboardM2FormFactors = explode("/ ", $motherboardResource['storageInterfaces'][1]['m2FormFactors']);
        $motherboardM2InterfaceId = $motherboardResource['storageInterfaces'][1]['interfaceSupport'][0]['id'];
        if($motherboardM2InterfaceId == 3){
            $motherboardM2InterfaceId = $motherboardResource['storageInterfaces'][1]['interfaceSupport'][1]['id'];
        }
        $largestSsdFormFactorId = array_search($motherboardM2FormFactors[count($motherboardM2FormFactors) - 1], self::$ssdFormFactors);

        $m2Ssd = M2SSD::where(function ($query) use ($largestSsdFormFactorId, $motherboardM2InterfaceId){
            $query->where('capacity', "1TB")->where('form_factor_id', '<=', $largestSsdFormFactorId + 1)->where('interface_id', $motherboardM2InterfaceId);
        })->inRandomOrder()->first();
        $m2SsdResource = (new M2SSDResource($m2Ssd))->toArray(null);

        $totalConsumption += 10;

        $psu = PowerSupply::where('max_power', '>=', $totalConsumption + 200)->orderBy('max_power')->first();
        $psuResource = (new PowerSupplyResource($psu))->toArray(null);

        $maxGpu = $gpuResource['maxGpuLength'];

        $maxPsu = $psuResource['maxPsuLength'];

        if ($coolerPreference == 0) {
            $maxCooler = $coolerResource['maxCoolerHeight'];
            $pcCase = PCCase::where('factor_id', 3)
                ->where('max_psu_length', '>=', $maxPsu)
                ->where('max_cooler_height', '>=', $maxCooler)
                ->where('max_gpu_length', '>=', $maxGpu)->inRandomOrder()->first();
        } else {
            $coolerLength = 360;
            if (substr($coolerResource['radiatorSize'], 0, 3) > 360) {
                $coolerLength = 420;
            }
            $pcCase = PCCase::where('factor_id', 3)
                ->where('max_psu_length', '>=', $maxPsu)
                ->where('liquid_cooling_support', 'like', '%' . $coolerLength . '%')
                ->where('max_gpu_length', '>=', $maxGpu)->inRandomOrder()->first();
        }

        $pcCaseResource = (new PCCaseResource($pcCase))->toArray(null);


        $rig = null;
        if ($coolerPreference == 0) {
            $rig = [
                'pcCase' => $pcCaseResource,
                'cpu' => $cpuResource,
                'gpu' => $gpuResource,
                'rams' => [$ramResource, $ramResource],
                'motherboard' => $motherboardResource,
                'liquidCooler' => [],
                'airCooler' => $coolerResource,
                'psu' => $psuResource,
                'hdds' => [],
                'sataSSDs' => [$sataSsdResource],
                'm2SSDs' => [$m2SsdResource]
            ];
        } else {
            $rig = [
                'pcCase' => $pcCaseResource,
                'cpu' => $cpuResource,
                'gpu' => $gpuResource,
                'rams' => [$ramResource, $ramResource],
                'motherboard' => $motherboardResource,
                'liquidCooler' => $coolerResource,
                'airCooler' => [],
                'psu' => $psuResource,
                'hdds' => [],
                'sataSSDs' => [$sataSsdResource],
                'm2SSDs' => [$m2SsdResource]
            ];
        }

        return $rig;

    }

    public static function buildEditingBudget($cpuPreference, $gpuPreference, $coolerPreference)
    {
        $totalConsumption = 50;

        $cpu = null;
        $cpuResource = null;
        if ($cpuPreference == 1) {
            $cpu = Cpu::where('series_id', 1)->where('threads', 16)->inRandomOrder()->first();
        } else if ($cpuPreference == 2) {
            $cpu = Cpu::where('series_id', 3)->where('threads', 16)->inRandomOrder()->first();
        } else {
            $cpu = Cpu::whereIn('series_id', [1, 3])->where('threads', 16)->inRandomOrder()->first();

        }
        $cpuResource = (new CpuResource($cpu))->toArray(null);
        $totalConsumption += $cpuResource['tdp'];

        $motherboard = null;
        $motherboardResource = null;
        $targetExpansionSlotId = 8;
        if ($cpuResource['brand']['name'] == "AMD") {
            $motherboard = Motherboard::where('name', 'LIKE', '%B550%')->where('memory_type_id', 4)
                ->whereHas('expansionSlots', function ($query) use ($targetExpansionSlotId) {
                    $query->where('expansion_slots.id', '<=', $targetExpansionSlotId);
                })->inRandomOrder()->first();
        } else {
            $motherboard = Motherboard::where('name', 'LIKE', '%B760%')->where('memory_type_id', 4)
                ->whereHas('expansionSlots', function ($query) use ($targetExpansionSlotId) {
                    $query->where('expansion_slots.id', '<=', $targetExpansionSlotId);
                })->inRandomOrder()->first();
        }
        $motherboardResource = (new MotherboardResource($motherboard))->toArray(null);

        $gpu = null;
        $gpuResource = null;
        if ($gpuPreference == 1) {
            $gpu = Gpu::where('name', 'like', "%Radeon%")->where('expansion_slot_id', $targetExpansionSlotId)->where('vram', 8)->inRandomOrder()->first();
        } else if ($gpuPreference == 2) {
            $gpu = Gpu::where('name', 'like', "%Geforce%")->where('expansion_slot_id', $targetExpansionSlotId)->where('vram', 8)->inRandomOrder()->first();
        } else {
            $gpu = Gpu::where('expansion_slot_id', $targetExpansionSlotId)->where('vram', 8)->inRandomOrder()->first();
        }
        $gpuResource = (new GpuResource($gpu))->toArray(null);
        $totalConsumption += $gpuResource['tdp'];

        $ram = Ram::where('memory_type_id', 4)->where('capacity', 16)->where('speed', $cpuResource['memorySpeed'])->inRandomOrder()->first();
        $ramResource = (new RamResource($ram))->toArray(null);

        $cooler = null;
        $coolerResource = null;

        $cpuSocket = $cpuResource['socket']['id'];
        if ($coolerPreference == 0) {
            $cooler = AirCooler::whereHas('sockets', function ($query) use ($cpuSocket) {
                $query->where('sockets.id', $cpuSocket);
            })->inRandomOrder()->first();
            $coolerResource = (new AirCoolerResource($cooler))->toArray(null);
            $totalConsumption += $coolerResource['fans'] * 3;
        } else {
            $cooler = LiquidCooler::whereHas('sockets', function ($query) use ($cpuSocket) {
                $query->where('sockets.id', $cpuSocket);
            })->inRandomOrder()->first();
            $coolerResource = (new LiquidCoolerResource($cooler))->toArray(null);
            $totalConsumption += $coolerResource['fanConsumption'] * $coolerResource['fanCount'] + 15;
        }

        $sataSsd = SataSSD::where('capacity', "2TB")->where('interface_id', 3)->inRandomOrder()->first();
        $sataSsdResource = (new SataSSDResource($sataSsd))->toArray(null);
        $totalConsumption += 10;

        $motherboardM2FormFactors = explode("/ ", $motherboardResource['storageInterfaces'][1]['m2FormFactors']);
        $motherboardM2InterfaceId = $motherboardResource['storageInterfaces'][1]['interfaceSupport'][0]['id'];
        if($motherboardM2InterfaceId == 3){
            $motherboardM2InterfaceId = $motherboardResource['storageInterfaces'][1]['interfaceSupport'][1]['id'];
        }
        $largestSsdFormFactorId = array_search($motherboardM2FormFactors[count($motherboardM2FormFactors) - 1], self::$ssdFormFactors);

        $m2Ssd = M2SSD::where(function ($query) use ($largestSsdFormFactorId, $motherboardM2InterfaceId){
            $query->where('capacity', "500GB")->where('form_factor_id', '<=', $largestSsdFormFactorId + 1)->where('interface_id', $motherboardM2InterfaceId);
        })->inRandomOrder()->first();
        $totalConsumption += 10;
        $m2SsdResource = (new M2SSDResource($m2Ssd))->toArray(null);

        $psu = PowerSupply::where('max_power', '>=', $totalConsumption + 150)->orderBy('max_power')->first();
        $psuResource = (new PowerSupplyResource($psu))->toArray(null);

        $maxGpu = $gpuResource['maxGpuLength'];

        $maxPsu = $psuResource['maxPsuLength'];

        if ($coolerPreference == 0) {
            $maxCooler = $coolerResource['maxCoolerHeight'];
            $pcCase = PCCase::where('factor_id', 3)
                ->where('max_psu_length', '>=', $maxPsu)
                ->where('max_cooler_height', '>=', $maxCooler)
                ->where('max_gpu_length', '>=', $maxGpu)->inRandomOrder()->first();
        } else {
            $coolerLength = 360;
            if (substr($coolerResource['radiatorSize'], 0, 3) > 360) {
                $coolerLength = 420;
            }
            $pcCase = PCCase::where('factor_id', 3)
                ->where('max_psu_length', '>=', $maxPsu)
                ->where('liquid_cooling_support', 'like', '%' . $coolerLength . '%')
                ->where('max_gpu_length', '>=', $maxGpu)->inRandomOrder()->first();
        }

        $pcCaseResource = (new PCCaseResource($pcCase))->toArray(null);


        $rig = null;
        if ($coolerPreference == 0) {
            $rig = [
                'pcCase' => $pcCaseResource,
                'cpu' => $cpuResource,
                'gpu' => $gpuResource,
                'rams' => [$ramResource],
                'motherboard' => $motherboardResource,
                'liquidCooler' => [],
                'airCooler' => $coolerResource,
                'psu' => $psuResource,
                'hdds' => [],
                'sataSSDs' => [$sataSsdResource],
                'm2SSDs' => [$m2SsdResource]
            ];
        } else {
            $rig = [
                'pcCase' => $pcCaseResource,
                'cpu' => $cpuResource,
                'gpu' => $gpuResource,
                'rams' => [$ramResource],
                'motherboard' => $motherboardResource,
                'liquidCooler' => $coolerResource,
                'airCooler' => [],
                'psu' => $psuResource,
                'hdds' => [],
                'sataSSDs' => [$sataSsdResource],
                'm2SSDs' => [$m2SsdResource]
            ];
        }

        return $rig;

    }

    public static function buildEditingPower($cpuPreference, $gpuPreference, $coolerPreference)
    {
        $totalConsumption = 50;

        $cpu = null;
        $cpuResource = null;
        if ($cpuPreference == 1) {
            $cpu = Cpu::where('series_id', 1)->where('threads', 24)->inRandomOrder()->first();
        } else if ($cpuPreference == 2) {
            $cpu = Cpu::where('series_id', 3)->where('threads', 20)->inRandomOrder()->first();
        } else {
            $cpu = Cpu::where(function ($query) {
                $query->where('series_id', 1)
                    ->where('threads', 24);
            })
                ->orWhere(function ($query) {
                    $query->where('series_id', 3)
                        ->where('threads', 20);
                })->inRandomOrder()->first();

        }
        $cpuResource = (new CpuResource($cpu))->toArray(null);
        $totalConsumption += $cpuResource['tdp'];

        $motherboard = null;
        $motherboardResource = null;
        $targetExpansionSlotId = 8;
        if ($cpuResource['brand']['name'] == "AMD") {
            $motherboard = Motherboard::where('name', 'LIKE', '%X570%')->where('memory_type_id', 4)
                ->whereHas('expansionSlots', function ($query) use ($targetExpansionSlotId) {
                    $query->where('expansion_slots.id', '<=', $targetExpansionSlotId);
                })->inRandomOrder()->first();
        } else {
            $motherboard = Motherboard::where('name', 'LIKE', '%Z690%')->where('memory_type_id', 4)
                ->whereHas('expansionSlots', function ($query) use ($targetExpansionSlotId) {
                    $query->where('expansion_slots.id', '<=', $targetExpansionSlotId);
                })->inRandomOrder()->first();
        }
        $motherboardResource = (new MotherboardResource($motherboard))->toArray(null);

        $gpu = null;
        $gpuResource = null;
        if ($gpuPreference == 1) {
            $gpu = Gpu::where('name', 'like', "%Radeon%")->where('expansion_slot_id', $targetExpansionSlotId)->where('vram', 10)->inRandomOrder()->first();
        } else if ($gpuPreference == 2) {
            $gpu = Gpu::where('name', 'like', "%Geforce%")->where('expansion_slot_id', $targetExpansionSlotId)->where('vram', 10)->inRandomOrder()->first();
        } else {
            $gpu = Gpu::where('expansion_slot_id', $targetExpansionSlotId)->where('vram', 8)->inRandomOrder()->first();
        }
        $gpuResource = (new GpuResource($gpu))->toArray(null);
        $totalConsumption += $gpuResource['tdp'];

        $ram = Ram::where('memory_type_id', 4)->where('capacity', 32)->where('speed', $cpuResource['memorySpeed'])->inRandomOrder()->first();
        $ramResource = (new RamResource($ram))->toArray(null);

        $cooler = null;
        $coolerResource = null;

        $cpuSocket = $cpuResource['socket']['id'];
        if ($coolerPreference == 0) {
            $cooler = AirCooler::whereHas('sockets', function ($query) use ($cpuSocket) {
                $query->where('sockets.id', $cpuSocket);
            })->inRandomOrder()->first();
            $coolerResource = (new AirCoolerResource($cooler))->toArray(null);
            $totalConsumption += $coolerResource['fans'] * 3;
        } else {
            $cooler = LiquidCooler::whereHas('sockets', function ($query) use ($cpuSocket) {
                $query->where('sockets.id', $cpuSocket);
            })->inRandomOrder()->first();
            $coolerResource = (new LiquidCoolerResource($cooler))->toArray(null);
            $totalConsumption += $coolerResource['fanConsumption'] * $coolerResource['fanCount'] + 15;
        }

        $sataSsd = SataSSD::where('capacity', "2TB")->where('interface_id', 3)->inRandomOrder()->first();
        $sataSsdResource = (new SataSSDResource($sataSsd))->toArray(null);
        $totalConsumption += 10;

        $motherboardM2FormFactors = explode("/ ", $motherboardResource['storageInterfaces'][1]['m2FormFactors']);
        $motherboardM2InterfaceId = $motherboardResource['storageInterfaces'][1]['interfaceSupport'][0]['id'];
        if($motherboardM2InterfaceId == 3){
            $motherboardM2InterfaceId = $motherboardResource['storageInterfaces'][1]['interfaceSupport'][1]['id'];
        }
        $largestSsdFormFactorId = array_search($motherboardM2FormFactors[count($motherboardM2FormFactors) - 1], self::$ssdFormFactors);

        $m2Ssd = M2SSD::where(function ($query) use ($largestSsdFormFactorId, $motherboardM2InterfaceId){
            $query->where('capacity', "500GB")->where('form_factor_id', '<=', $largestSsdFormFactorId + 1)->where('interface_id', $motherboardM2InterfaceId);
        })->inRandomOrder()->first();
        $totalConsumption += 10;
        $m2SsdResource = (new M2SSDResource($m2Ssd))->toArray(null);

        $psu = PowerSupply::where('max_power', '>=', $totalConsumption + 150)->orderBy('max_power')->first();
        $psuResource = (new PowerSupplyResource($psu))->toArray(null);

        $maxGpu = $gpuResource['maxGpuLength'];

        $maxPsu = $psuResource['maxPsuLength'];

        if ($coolerPreference == 0) {
            $maxCooler = $coolerResource['maxCoolerHeight'];
            $pcCase = PCCase::where('factor_id', 3)
                ->where('max_psu_length', '>=', $maxPsu)
                ->where('max_cooler_height', '>=', $maxCooler)
                ->where('max_gpu_length', '>=', $maxGpu)->inRandomOrder()->first();
        } else {
            $coolerLength = 360;
            if (substr($coolerResource['radiatorSize'], 0, 3) > 360) {
                $coolerLength = 420;
            }
            $pcCase = PCCase::where('factor_id', 3)
                ->where('max_psu_length', '>=', $maxPsu)
                ->where('liquid_cooling_support', 'like', '%' . $coolerLength . '%')
                ->where('max_gpu_length', '>=', $maxGpu)->inRandomOrder()->first();
        }

        $pcCaseResource = (new PCCaseResource($pcCase))->toArray(null);


        $rig = null;
        if ($coolerPreference == 0) {
            $rig = [
                'pcCase' => $pcCaseResource,
                'cpu' => $cpuResource,
                'gpu' => $gpuResource,
                'rams' => [$ramResource],
                'motherboard' => $motherboardResource,
                'liquidCooler' => [],
                'airCooler' => $coolerResource,
                'psu' => $psuResource,
                'hdds' => [],
                'sataSSDs' => [$sataSsdResource],
                'm2SSDs' => [$m2SsdResource]
            ];
        } else {
            $rig = [
                'pcCase' => $pcCaseResource,
                'cpu' => $cpuResource,
                'gpu' => $gpuResource,
                'rams' => [$ramResource],
                'motherboard' => $motherboardResource,
                'liquidCooler' => $coolerResource,
                'airCooler' => [],
                'psu' => $psuResource,
                'hdds' => [],
                'sataSSDs' => [$sataSsdResource],
                'm2SSDs' => [$m2SsdResource]
            ];
        }

        return $rig;

    }
}
