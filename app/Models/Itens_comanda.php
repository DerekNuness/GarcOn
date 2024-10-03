<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Itens_comanda extends Model
{
    use HasFactory;

    protected $table = 'itens_comanda';
    public $timestamps = false;

    protected $fillable = [
        'quantidade',
        'comanda_id',
        'produto_id'
    ];

    public function produtos() {
        return $this->hasMany(Produtos::class, 'id', 'produto_id');
    }
    
}
