<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo_cliente extends Model
{
    use HasFactory;

    protected $table = 'tipo_cliente';
    protected $fillable = [
        'descritivo'
    ];
}
