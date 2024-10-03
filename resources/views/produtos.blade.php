@extends('master')

@section('content')
    <div class="content px-3 py-1">
        <h1>Produtos</h1>
        <hr>
        <form method="post" action="{{ route('produtos.cadastrar') }}" enctype="multipart/form-data">
            @csrf
            <div class="row row-cols-1 row-cols-md-2">
                <div class="col">
                    <h2 class="text-success">Adicionar</h2>

                    <label>Nome</label>
                    <input type="text" name="nome" class="form-control mb-3">

                    <label>Descritivo</label>
                    <textarea name="descritivo" class="form-control mb-3"></textarea>

                    <label>Preço</label>
                    <input type="text" name="preco" class="form-control">

                    <input type="hidden" name="status" value="1">
                </div>
                <div class="col mt-3">
                    <label>Imagem</label>
                    <input type="file" name="img_path" class="form-control">
                </div>
            </div>
            <button class="btn btn-success mt-3">
                <i class="fa-solid fa-share-from-square"></i> Cadastrar
            </button>
        </form>
    </div>
    <script>
        const BTN_PRODUTOS = document.getElementById('link-menu-produtos');

        if (!BTN_PRODUTOS.classList.contains("active")) {
            BTN_PRODUTOS.classList.add("active");
        }
    </script>
@endsection
