@extends('master')

@section('content')
    <div class="content px-3 py-1">
        <form method="POST" action="{{ route('comanda.store') }}">
            @csrf
            <div class="d-flex justify-content-between align-items-center">
                <h1>Cardápio</h1>
                <button class="btn btn-success">Cozinhar 😋</button>
            </div>
            <hr>
            @if (!empty($produtos) && !empty($mesas))
                <label>Mesa:</label>
                <select name="mesa" class="form-select my-3">
                    @foreach ($mesas as $mesa)
                        <option value="{{ $mesa->id }}">{{ $mesa->numero_mesa }}</option>
                    @endforeach
                </select>
                <input type="hidden" name="usuario" value="{{ Auth()->user()->id }}">
                <div class="row row-cols-1 row-cols-md-2 gy-3 pb-5">
                    @foreach ($produtos as $i => $produto)
                        <div class="col">
                            <div class="d-flex w-100 h-100 p-2 rounded border">
                                <img class="img-produto rounded me-2" src="{{ url("storage/{$produto->img_path}") }}">
                                <div class="d-flex flex-column justify-content-between w-100">
                                    <div>
                                        <h2 class="h5">{{ $produto->nome }} <small
                                                class="float-end">{{ $produto->preco }}</small></h2>
                                        <p class="text-secondary">{{ $produto->descritivo }}</p>
                                    </div>
                                    <input type="hidden" name="produto[{{ $produto->id }}][id]" value="{{ $produto->id }}">
                                    <div class="input-group input-group-sm justify-content-end">
                                        <button class="btn btn-primary" onclick="decrementa(event, {{ $i }})">
                                            <i class="fa-solid fa-minus"></i>
                                        </button>
                                        <input type="text"
                                            class="input-minus-plus border border-primary input-number text-end"
                                            name="produto[{{ $produto->id }}][quantidade]" min="0" readonly>
                                        <button class="btn btn-primary" onclick="incrementa(event, {{ $i }})">
                                            <i class="fa-solid fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                {{-- @endif --}}
            </div>
        </form>
    @else
        <div class="not-found text-secondary">
            <i class="fa-solid fa-face-frown-open h1"></i>
            <h2>Nenhum registro encontrado.</h2>
        </div>
    @endif
    </div>
    <script>
        const inputs = document.getElementsByClassName('input-number');
        const BTN_CARDAPIO = document.getElementById('link-menu-cardapio');

        if (!BTN_CARDAPIO.classList.contains("active")) {
            BTN_CARDAPIO.classList.add("active");
        }

        function incrementa(e, indice) {
            e.preventDefault();
            inputs[indice].value++;
        }

        function decrementa(e, indice) {
            e.preventDefault();
            if (inputs[indice].value > 0) {
                inputs[indice].value--;
            }
        }
    </script>
@endsection
