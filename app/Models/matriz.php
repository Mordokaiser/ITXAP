<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class matriz extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'x',
        'y',
    ];
    public $timestamps = false;
    protected $table = 'matriz';
}
