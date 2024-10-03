<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Comanda;
use App\Models\Itens_comanda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComandaController extends Controller
{
    //
    public function index() {

        $comandas = Comanda::join('cliente', 'comanda.cliente_id', '=', 'cliente.id')
                            ->where('comanda.usuario_id', Auth::id())
                            ->where('comanda.pago', 1)
                            ->select('comanda.id', 'cliente.numero_mesa')
                            ->get();

        return view('comanda', ['comandas' => $comandas]);
    }

    public function store(Request $request) {
        
        $comanda = Comanda::create([
            "cliente_id" => $request->mesa,
            "usuario_id" => $request->usuario,
            "pago" => 1
        ]);

        
        if ($comanda) {
            foreach ($request->produto as $produto) {
                if ($produto['quantidade'] > 0) {
                    Itens_comanda::create([
                        "comanda_id" => $comanda->id,
                        "produto_id" => $produto['id'],
                        "quantidade" => $produto['quantidade']
                    ]);
                }
                var_dump($produto['quantidade']);
            }
            
        }

        return redirect()->route('comanda');
    }

    public function cozinha() {

        $comandas = Comanda::join('cliente', 'comanda.cliente_id', '=', 'cliente.id')
                            ->join('itens_comanda', 'itens_comanda.comanda_id', '=', 'comanda.id')
                            ->join('produtos', 'itens_comanda.produto_id', '=', 'produtos.id')
                            ->where('comanda.pago', 1)
                            ->select('cliente.numero_mesa', 'itens_comanda.quantidade', 'produtos.nome')
                            ->get();
        return view('cozinha', ['comandas' => $comandas]);
    }

    public function pagarComanda(Request $request){
        $comanda = Comanda::find($request->id);

        $comanda->pago = '0';
        
        $comanda->save();

        return redirect()->route('comanda');
    }
}
