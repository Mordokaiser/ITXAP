<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class datoFinal extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'id_matriz_final',
        'x',
        'y',
        'valor',
    ];
    public $timestamps = false;
    protected $table = 'dato_final';
}
