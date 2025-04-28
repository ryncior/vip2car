<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class encuesta extends Model
{
    /** @use HasFactory<\Database\Factories\EncuestaFactory> */
    use HasFactory;
    protected $fillable = [
        'Placa',
        'Marca',
        'fecha_fab',
        'Nombre',
        'Apellido',
        'dni',
        'mail',
        'telefono'
    ];
}
