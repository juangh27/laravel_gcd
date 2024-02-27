<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApiTest extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_original',
        'title',
        'descripcion',
        'description',
        'precio'
    ];
}
