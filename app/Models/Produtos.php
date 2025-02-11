<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produtos extends Model
{
    use HasFactory;

    protected $table = 'produtos';
    public $timestamps = false;

    protected $fillable = [
        'descritivo',
        'img_path',
        'nome',
        'preco',
        'status'
    ];

    protected $casts = [
        'status' => 'bool'
    ];
}
