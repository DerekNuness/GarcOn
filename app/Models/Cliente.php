<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    
    protected $table = 'cliente';
    protected $fillable = [
        'tipo_cliente_id',
        'numero_mesa',
        'nome'
    ];

    public function tipo_cliente() {
        return $this->hasMany(Tipo_cliente::class, 'id', 'tipo_cliente_id');
    }
}
