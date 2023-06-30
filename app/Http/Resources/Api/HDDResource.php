<?php

namespace App\Http\Resources\Api;

use App\Models\Brand;
use App\Models\StorageInterface;
use Illuminate\Http\Resources\Json\JsonResource;

class HDDResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $hddBrand = Brand::findOrFail($this->brand_id);
        $hddInterface = StorageInterface::findOrFail($this->interface_id);
        return [
            'id' => $this->id,
            'brand' => ["id" => $hddBrand->id,"name" => $hddBrand->name],
            'name' => $this->name,
            'storageInterface' =>["id" => $hddInterface->id,"name" => $hddInterface->name],
            'formFactor' => $this->form_factor,
            'capacity' => $this->capacity,
            'rpm' => $this->rpm,
            'imageLink' => $this->image_link,
            'cache' => $this->cache,
            'features' => $this->features,
            'officialLink' => $this->official_link,
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at,
        ];
    }
}
