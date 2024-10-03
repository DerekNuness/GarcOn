@extends('master')

@section('content')
    <div class="content px-3 py-1">
        <form action='{{ route('usuarios.register') }}' method='POST'>
            @csrf
            <div>
                <label>Nome:</label>
                <input type='text' name='nome'>
            </div>
            <div>
                <label>Login:</label>
                <input type='text' name='login'>
            </div>
            <div>
                <label>Email:</label>
                <input type='text' name='email'>
            </div>
            <div>
                <label>Senha:</label>
                <input type='password' name='senha'>
            </div>
            <div>
                <label>Tipo:</label>
                <select name='tipo'>
                    @foreach ($tipo_usuario as $tipo)
                        <option value='{{ $tipo->id }}'>{{ $tipo->descritivo }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-success w-100 mt-3">Cadastrar</button>
        </form>
    </div>
@endsection