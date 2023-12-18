<?php

namespace App\Http\Resources\Api;

use App\Models\AirCoolerSocket;
use App\Models\Brand;
use App\Models\Socket;
use Illuminate\Http\Resources\Json\JsonResource;

class LiquidCoolerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $coolerBrand = Brand::findOrFail($this->brand_id);
        $supportedSocketsLinks = AirCoolerSocket::where('cooler_id',$this->id)->get();
        $supportedSockets = array();
        foreach($supportedSocketsLinks as $socketsLink){
            $socket = Socket::findOrFail($socketsLink->socket_id);
            array_push($supportedSockets, ["id" => $socket->id,"name" => $socket->name]);
        }
        return [
            'id' => $this->id,
            'brand' => ["id" => $coolerBrand->id,"name" => $coolerBrand->name],
            'name' => $this->name,
            'radiatorSize' => $this->radiator_size,
            'fanSize' => $this->fan_size,
            'fanConnector' => $this->fan_connector,
            'fanCount' => $this->fan_count,
            'fanConsumption' => $this->fan_consumption,
            'fanNoise' => $this->pump_noise,
            'pumpRpm' => $this->pump_rpm,
            'pumpNoise' => $this->pump_noise,
            'tubeLength' => $this->tube_length,
            'rgb' => $this->rgb,
            'imageLink' => $this->image_link,
            'supportedSockets' => $supportedSockets,
            'features' => $this->features,
            'officialLink' => $this->official_link,
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at,
        ];
    }
}
