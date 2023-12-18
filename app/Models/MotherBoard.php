<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MotherBoard extends Model
{
    protected $table = 'motherboards';
    use HasFactory;

    public function expansionSlots()
    {
        return $this->belongsToMany(ExpansionSlot::class, 'expansion_slots_motherboards', 'motherboard_id', 'slot_id');
    }
}
