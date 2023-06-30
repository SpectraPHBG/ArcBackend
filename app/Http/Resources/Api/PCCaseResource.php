<?php

namespace App\Http\Resources\Api;

use App\Models\Brand;
use App\Models\FormFactor;
use App\Models\PCCaseMotherboard;
use Illuminate\Http\Resources\Json\JsonResource;

class PCCaseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $caseBrand = Brand::findOrFail($this->brand_id);
        $formFactor = FormFactor::findOrFail($this->factor_id);

        $formFactorLinks = PCCaseMotherboard::where('case_id',$this->id)->get();
        $supportedFormFactors = array();
        foreach($formFactorLinks as $formFactorLink){
            $supportedFormFactor = FormFactor::findOrFail($formFactorLink->factor_id);
            array_push($supportedFormFactors, ["id" => $supportedFormFactor->id,"name" => $supportedFormFactor->name]);
        }

        $airCoolerMountings = explode(' | ', $this->air_cooling_support);
        $airCoolerSupport = array();

        for ($i =0 ; $i < count($airCoolerMountings) ; $i++){
            $airCoolerKeyValue = explode(': ', $airCoolerMountings[$i]);
            $airCoolerSupport[$airCoolerKeyValue[0]] = explode(', ', $airCoolerKeyValue[1]);
        }

        $liquidCoolerMountings = explode(' | ', $this->liquid_cooling_support);
        $liquidCoolerSupport = array();

        for ($i =0 ; $i < count($liquidCoolerMountings) ; $i++){
            $liquidCoolerKeyValue = explode(': ', $liquidCoolerMountings[$i]);
            $liquidCoolerSupport[$liquidCoolerKeyValue[0]] = explode(', ', $liquidCoolerKeyValue[1]);
        }

        return [
            'id' => $this->id,
            'brand' => ["id" => $caseBrand->id,"name" => $caseBrand->name],
            'name' => $this->name,
            'formFactor' => ["id" => $formFactor->id,"name" => $formFactor->name],
            'ioPorts' => $this->io_ports,
            'psuMount' => $this->psu_mount,
            'airCoolingSupport' => $airCoolerSupport,
            'liquidCoolingSupport' => $liquidCoolerSupport,
            'storage25Bays' => $this->storage_25_bays,
            'storage35Bays' => $this->storage_35_bays,
            'includedFans' => $this->included_fans,
            'maxPsuLength' => $this->max_psu_length,
            'maxCoolerHeight' => $this->max_cooler_height,
            'maxGpuLength' => $this->max_gpu_length,
            'supportedFormFactors' => $supportedFormFactors,
            'dimensions' => $this->dimensions,
            'features' => $this->features,
            'imageLink' => $this->image_link,
            'officialLink' => $this->official_link,
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at,
        ];
    }
}
