<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comanda extends Model
{
    use HasFactory;

    protected $table = 'comanda';
    public $timestamps = false;

    protected $fillable = [
        'pago',
        'cliente_id',
        'usuario_id'
    ];

    protected $casts = [
        'pago' => 'bool'
    ];

    public function usuarios() {
        return $this->hasMany(Usuarios::class, 'id', 'usuario_id');
    }

    public function cliente() {
        return $this->hasMany(Cliente::class, 'id', 'cliente_id');
    }

    public function itens_comanda() {
        return $this->belongsTo(Itens_comanda::class, 'comanda_id', 'id');
    }
}
