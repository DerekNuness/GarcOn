@extends('master')

@section('content')
<div class="container-fluid">
    <h1>Comandas</h1>
    <hr>
    <a href="{{ route('cardapio') }}" class="btn btn-success rounded-pill mb-3 my-3">
        <i class="fa-solid fa-plus"></i>
        Comanda
    </a>
    <table class="table table-stripped">
        <thead>
            <tr>
                <th>Mesa</th>
                <th>Ações</th>
            </tr>
        </thead>
        @foreach ($comandas as $comanda)
            <tbody>
                <tr>
                    <td>{{ $comanda->numero_mesa }}</td>
                    <td>
                        <form method='POST' action="{{ route('comanda.pagar') }}" >
                            @csrf
                            <input type='hidden' value='{{ $comanda->id }}' name='id'>
                            <button type='submit' class="btn btn-primary" type="button">Pagar</button>
                        </form>
                    </td>
                </tr>
            </tbody>
        @endforeach
        
    </table>
</div>
<script>
    const BTN_COMANDA = document.getElementById('link-menu-comandas');

    if (!BTN_COMANDA.classList.contains("active")) {
        BTN_COMANDA.classList.add("active");
    }
</script>
@endsection