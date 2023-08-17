<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class matrizFinal extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'id_matriz',
        'x',
        'y',
    ];
    public $timestamps = false;
    protected $table = 'matriz_final';
}
