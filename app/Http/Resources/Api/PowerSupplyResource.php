<?php

namespace App\Http\Resources\Api;

use App\Models\Brand;
use Illuminate\Http\Resources\Json\JsonResource;

class PowerSupplyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $psuBrand = Brand::findOrFail($this->brand_id);
        return [
            'id' => $this->id,
            'brand' => ["id" => $psuBrand->id,"name" => $psuBrand->name],
            'name' => $this->name,
            'maxPower' => $this->max_power,
            'fans' => $this->fans,
            'certificate' => $this->certificate,
            'connectors' => $this->connectors,
            'inputVoltage' => $this->input_voltage,
            'turboClock2' => $this->turbo_clock2,
            'maxPsuLength' => $this->max_psu_length,
            'imageLink' => $this->image_link,
            'modular' => $this->modular,
            'dimensions' => $this->dimensions,
            'features' => $this->features,
            'officialLink' => $this->official_link,
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at,
        ];
    }
}
