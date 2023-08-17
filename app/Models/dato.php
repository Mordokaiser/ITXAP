<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dato extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'id_matriz',
        'x',
        'y',
        'valor',
    ];
    public $timestamps = false;
    protected $table = 'dato';
}
