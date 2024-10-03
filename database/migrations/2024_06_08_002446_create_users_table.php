<?php

use App\Models\Tipo_usuario;
use App\Models\Usuarios;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tipo_usuario_id');
            $table->string('nome');
            $table->string('email')->unique();
            $table->string('login');
            $table->string('password');
            $table->foreign('tipo_usuario_id')->references('id')->on('tipo_usuario');
        });

        Usuarios::insert([
            'tipo_usuario_id' => Tipo_usuario::where('descritivo', 'Administrador')->first()->id,
            'nome' => 'administrador',
            'email' => 'adm@adm.com',
            'login' => 'adm',
            'password' => Hash::make('123')
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
