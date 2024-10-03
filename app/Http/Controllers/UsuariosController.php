<?php

namespace App\Http\Controllers;

use App\Models\Tipo_usuario;
use App\Models\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{
    public function index() {
        $tipo_usuario = Tipo_usuario::all();
        return view('usuarios', ['tipo_usuario' => $tipo_usuario]);
    }

    public function register(Request $request) {
        $usuario = Usuarios::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'password' => Hash::make($request->senha),
            'login' => $request->login,
            'tipo_usuario_id' => $request->tipo
        ]);
        return route('cardapio');
    }
}
