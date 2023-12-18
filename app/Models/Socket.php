<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Socket extends Model
{
    protected $table = 'sockets';
    use HasFactory;

    public function airCoolers()
    {
        return $this->belongsToMany(AirCooler::class, 'air_coolers_sockets', 'socket_id', 'cooler_id');
    }

    public function liquidCoolers()
    {
        return $this->belongsToMany(LiquidCooler::class, 'liquid_coolers_sockets', 'socket_id', 'cooler_id');
    }
}
