<?php

namespace App\Http\Resources\Api;

use App\Models\Brand;
use App\Models\CpuSeries;
use App\Models\MemoryType;
use App\Models\Socket;
use Illuminate\Http\Resources\Json\JsonResource;
use function PHPUnit\Framework\isNull;

class CpuResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $cpuBrand = Brand::findOrFail($this->brand_id);
        $cpuSocket = Socket::findOrFail($this->socket_id);
        $cpuMemory = MemoryType::findOrFail($this->memory_id);
        $cpuMemory2 = MemoryType::find($this->memory2_id);
        $series = CpuSeries::findOrFail($this->series_id);

        $cpu = [
            'id' => $this->id,
            'brand' => ["id" => $cpuBrand->id,"name" => $cpuBrand->name],
            'name' => $this->name,
            'socket' =>["id" => $cpuSocket->id,"name" => $cpuSocket->name],
            'series' => $series->name,
            'cores' => $this->cores,
            'threads' => $this->threads,
            'baseClock' => $this->base_clock,
            'turboClock' => $this->turbo_clock,
            'baseClock2' => $this->base_clock2,
            'turboClock2' => $this->turbo_clock2,
            'memoryType' => ["id" => $cpuMemory->id,"name" => $cpuMemory->name],
            'memorySpeed' => $this->memory_speed,
            'memory2Type' => $cpuMemory2 ? ["id" => $cpuMemory2->id,"name" => $cpuMemory2->name] : null,
            'memory2Speed' => $this->memory2_speed,
            'hyperthreadingSupport' => $this->hyperthread_support,
            'tdp' => $this->tdp,
            'pcieVersion' => $this->pcie_version,
            'caches' => $this->caches,
            'maxTemp' => $this->max_temp,
            'supportedOs' => $this->supported_os,
            'integratedGpu' => $this->integrated_gpu,
            'gpuFrequency' => $this->gpu_frequency,
            'imageLink' => $this->image_link,
            'officialLink' => $this->official_link,
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at,
        ];
        if(strtolower($cpu['brand']['name']) === "amd"){
            unset($cpu['baseClock2'], $cpu['turboClock2'], $cpu['memory2Type'], $cpu['memory2Speed']);
        }
        return $cpu;
    }
}
