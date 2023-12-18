<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AirCooler extends Model
{
    protected $table = 'air_coolers';
    use HasFactory;

    public function sockets()
    {
        return $this->belongsToMany(Socket::class, 'air_coolers_sockets', 'cooler_id', 'socket_id');
    }
}
