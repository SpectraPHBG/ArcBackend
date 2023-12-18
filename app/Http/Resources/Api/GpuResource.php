<?php

namespace App\Http\Resources\Api;

use App\Models\Brand;
use App\Models\ExpansionSlot;
use App\Models\GraphicMemoryType;
use Illuminate\Http\Resources\Json\JsonResource;

class GpuResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $gpuBrand = Brand::findOrFail($this->brand_id);
        $expansionSlot = ExpansionSlot::findOrFail($this->expansion_slot_id);
        $vramType = GraphicMemoryType::findOrFail($this->vram_id);
        return [
            'id' => $this->id,
            'brand' =>["id" => $gpuBrand->id,"name" => $gpuBrand->name],
            'name' => $this->name,
            'expansionSlot' =>["id" => $expansionSlot->id,"name" => $expansionSlot->name],
            'creClock' => $this->core_clock,
            'gameClock' => $this->game_clock,
            'boostClock' => $this->boost_clock,
            'memoryClock' => $this->memory_clock,
            'vram' => $this->vram,
            'vramType' =>["id" => $vramType->id,"name" => $vramType->name],
            'memoryBus' => $this->memory_bus,
            '3dApi' => $this->apis,
            'ports' => $this->ports,
            'maxResolution' => $this->max_resolution,
            'cooler' => $this->cooler,
            'tdp' => $this->tdp,
            'recommendedWattage' => $this->recommended_wattage,
            'maxGpuLength' => $this->max_gpu_length,
            'powerConnector' => $this->power_connector,
            'dimensions' => $this->dimensions,
            'features' => $this->features,
            'imageLink' => $this->image_link,
            'officialLink' => $this->official_link,
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at,
        ];
    }
}
