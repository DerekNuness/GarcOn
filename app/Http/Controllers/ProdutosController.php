<?php

namespace App\Http\Controllers;

use App\Models\Produtos;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    //
    public function index() {
        return view('produtos');
    }

    public function store(Request $request) {
        $request->validate([
            'nome' => 'required',
            'descritivo' => 'required',
            'preco' => 'required|numeric',
            'img_path' => 'required|image'
        ], [
            'nome.required' => 'Campo nome obrigatório',
            'descritivo.required' => 'Campo descritivo obrigatório',
            'preco.required' => 'Campo preço obrigatório',
            'img_path.required' => 'Campo imagem obrigatório'
        ]);
        
        $produto = $request->only(['nome', 'descritivo', 'preco', 'status']);
        
        if ($request->hasFile('img_path')) {
            $file = $request->file('img_path');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('images', $filename);
            $produto['img_path'] = $path;
            // $request->img_path
        }
        
        Produtos::create($produto);
        
        return redirect()->back()->with('sucesso', 'Produto cadastrado com sucesso!');
        
    }
}
