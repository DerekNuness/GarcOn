@extends('master')

@section('content')
<div class="container-fluid">
    <h1>Cozinha</h1>
    <hr>
    <table class="table table-stripped">
        <thead>
            <tr>
                <th>Produto</th>
                <th>Quantidade</th>
                <th>Mesa</th>
            </tr>
        </thead>
        @foreach ($comandas as $comanda)
            <tbody>
                <tr>
                    <td>{{ $comanda->nome }}</td>
                    <td>{{ $comanda->quantidade }}</td>
                    <td>{{ $comanda->numero_mesa }}</td>
                </tr>
            </tbody>
        @endforeach
        
    </table>
</div>
<script>
    const BTN_COZINHA = document.getElementById('link-menu-cozinha');

    if (!BTN_COZINHA.classList.contains("active")) {
        BTN_COZINHA.classList.add("active");
    }
</script>
@endsection