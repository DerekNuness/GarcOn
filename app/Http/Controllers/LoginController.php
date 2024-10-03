<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {
        return view('login');
    }

    public function store(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ], [
           'email.required' => 'Esse campo de email é obrigatório',
           'email.email' => 'É necessário um email válido',
           'password.required' => 'Digite sua senha',
        ]);

        $credentials = $request->only('email', 'password');
        $authenticated = Auth::attempt($credentials);

        if (!$authenticated) {
            return redirect()->back()->withErrors(['error' => 'Email ou Senha inválidos']);
        }

        return redirect()->route('comanda')->with('success', 'Logged in');
    }

    public function destroy() {
        Auth::logout();
        return redirect()->route('login.index');
    }
}
