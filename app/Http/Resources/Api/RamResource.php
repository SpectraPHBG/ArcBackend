<?php

namespace App\Http\Resources\Api;

use App\Models\Brand;
use App\Models\MemoryType;
use Illuminate\Http\Resources\Json\JsonResource;

class RamResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $ramBrand = Brand::findOrFail($this->brand_id);
        $ramType = MemoryType::findOrFail($this->memory_type_id);
        return [
            'id' => $this->id,
            'brand' => ["id" => $ramBrand->id,"name" => $ramBrand->name],
            'name' => $this->name,
            'capacity' => $this->capacity,
            'memoryType' => ["id" => $ramType->id,"name" => $ramType->name],
            'modules' => $this->modules,
            'speed' => $this->speed,
            'voltage' => $this->voltage,
            'latency' => $this->latency,
            'heatSpreader' => $this->heat_spreader,
            'rgbSupport' => $this->rgbSupport,
            'eccSupport' => $this->ecc_support,
            'imageLink' => $this->image_link,
            'features' => $this->features,
            'officialLink' => $this->official_link,
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at,
        ];
    }
}
