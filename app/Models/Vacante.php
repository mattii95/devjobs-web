<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacante extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'salario_id',
        'categoria_id',
        'empresa',
        'ultimo_dia',
        'description',
        'image',
        'user_id'
    ];
}
