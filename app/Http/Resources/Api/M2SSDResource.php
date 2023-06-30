<?php

namespace App\Http\Resources\Api;

use App\Models\Brand;
use App\Models\M2FormFactor;
use App\Models\StorageInterface;
use Illuminate\Http\Resources\Json\JsonResource;

class M2SSDResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $ssdBrand = Brand::findOrFail($this->brand_id);
        $ssdInterface = StorageInterface::findOrFail($this->interface_id);
        $ssdFormFactor = M2FormFactor::findOrFail($this->form_factor_id);
        return [
            'id' => $this->id,
            'brand' => ["id" => $ssdBrand->id,"name" => $ssdBrand->name],
            'name' => $this->name,
            'storageInterface' => ["id" => $ssdInterface->id,"name" => $ssdInterface->name],
            'formFactor' => ["id" => $ssdFormFactor->id,"name" => $ssdFormFactor->name],
            'capacity' => $this->capacity,
            'maxRead' => $this->max_read,
            'maxWrite' => $this->max_write,
            'mtbf' => $this->mtbf,
            'terabyteWritten' => $this->terabyte_written,
            'imageLink' => $this->image_link,
            'features' => $this->features,
            'officialLink' => $this->official_link,
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at,
        ];
    }
}
