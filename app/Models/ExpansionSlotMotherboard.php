<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpansionSlotMotherboard extends Model
{
    protected $table = 'expansion_slots_motherboards';
    use HasFactory;

    public function motherboards()
    {
        return $this->belongsToMany(Motherboard::class, 'expansion_slots_motherboards', 'slot_id', 'motherboard_id');
    }
}
