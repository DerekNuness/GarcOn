<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Produtos;
use Illuminate\Http\Request;

class CardapioController extends Controller
{
    public function index() {

        $produtos = Produtos::all();
        $mesas = Cliente::all(['id', 'numero_mesa']);

        return view('cardapio', ['produtos' => $produtos, 'mesas' => $mesas]);
    }

}
