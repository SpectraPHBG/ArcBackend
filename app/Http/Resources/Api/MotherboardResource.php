<?php

namespace App\Http\Resources\Api;

use App\Models\Brand;
use App\Models\Chipset;
use App\Models\ExpansionSlot;
use App\Models\ExpansionSlotMotherboard;
use App\Models\FormFactor;
use App\Models\MemoryType;
use App\Models\Socket;
use App\Models\StorageInterface;
use App\Models\StorageInterfaceMotherboard;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;
use function Webmozart\Assert\Tests\StaticAnalysis\notNull;

class MotherboardResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $motherboardBrand = Brand::findOrFail($this->brand_id);
        $formFactor = FormFactor::findOrFail($this->form_factor_id);
        $socket = Socket::findOrFail($this->socket_id);
        $chipset = Chipset::findOrFail($this->chipset_id);
        $memoryType = MemoryType::findOrFail($this->memory_type_id);

        $expansionSlotLinks = ExpansionSlotMotherboard::where('motherboard_id',$this->id)->get();
        $availableExpansionSlots = array();
        foreach($expansionSlotLinks as $slotLink){
            $expansionSlot = ExpansionSlot::findOrFail($slotLink->slot_id);
            array_push($availableExpansionSlots, ["id" => $expansionSlot->id,"name" => $expansionSlot->name,'amount'=>$slotLink->amount]);

        }

        $storageInterfaceLinks = StorageInterfaceMotherboard::where('board_id',$this->id)->get();
        $availableStorageInterfaces = array();
        foreach($storageInterfaceLinks as $storageInterfaceLink){
            $storageInterface = StorageInterface::findOrFail($storageInterfaceLink->interface_id);
            $interfaceKey = array_search($storageInterfaceLink->name, array_column($availableStorageInterfaces,'name'));
            if(count($availableStorageInterfaces) > 0 && $interfaceKey !== false){
                $availableStorageInterfaces[$interfaceKey]['interfaceSupport'][] = $storageInterface;
            }
            else {
                $toAddInterface = [
                    'id' => $storageInterface->id,
                    'name' => $storageInterfaceLink->name,
                    'interfaceSupport' => array($storageInterface),
                    'm2FormFactors' => $storageInterfaceLink->m2_form_factors,
                    'amount'=>$storageInterfaceLink->amount];
                $availableStorageInterfaces[] = $toAddInterface;
            }
        }

        return [
            'id' => $this->id,
            'brand' => ["id" => $motherboardBrand->id,"name" => $motherboardBrand->name],
            'name' => $this->name,
            'formFactor' => ["id" => $formFactor->id,"name" => $formFactor->name],
            'socket' => ["id" => $socket->id,"name" => $socket->name],
            'chipset' => ["id" => $chipset->id,"name" => $chipset->name],
            'memoryType' => ["id" => $memoryType->id,"name" => $memoryType->name],
            'memoriesSupport' => $this->memories_support,
            'maxMemory' => $this->max_memory,
            'memorySlots' => $this->memory_slots,
            'dualChSupport' => $this->dual_ch_support,
            'eccSupport' => $this->ecc_support,
            'bufferSupport' => $this->buffer_support,
            'onboardVideo' => $this->onboard_video,
            'onboardAudio' => $this->onboard_audio,
            'onboardLan' => $this->onboard_lan,
            'ioPorts' => $this->io_ports,
            'usbPorts' => $this->usb_ports,
            'imageLink' => $this->image_link,
            'led' => $this->led,
            'expansionSlots' => $availableExpansionSlots,
            'storageInterfaces' => $availableStorageInterfaces,
            'features' => $this->features,
            'officialLink' => $this->official_link,
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at,
        ];
    }
}
