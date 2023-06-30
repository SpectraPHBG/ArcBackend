<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StorageInterface extends Model
{
    protected $table = 'storage_interfaces';
    use HasFactory;
}
