<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LiquidCooler extends Model
{
    protected $table = 'liquid_coolers';
    use HasFactory;

    public function sockets()
    {
        return $this->belongsToMany(Socket::class, 'liquid_coolers_sockets', 'cooler_id', 'socket_id');
    }
}
