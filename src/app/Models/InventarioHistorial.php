<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventarioHistorial extends Model
{
    use HasFactory;
    protected $table = 'inventario_historial';
    public $timestamps = false;

    protected $connection = 'flask';

}
