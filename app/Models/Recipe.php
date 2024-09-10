<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $table='recipes';
    use HasFactory;

    public $timestamps = false;

 
    protected $fillable = [
        'titulo',
        'descricao',
        'ingredientes',
        'instrucoes'
];
 protected $casts = [
        'ingredientes' => 'array',
        'instrucoes' => 'array',
];
}