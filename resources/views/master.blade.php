<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GarçON</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <main class="container-fluid p-0 d-flex">
        <nav id="nav-bar" class="navegacao d-flex flex-column flex-shrink-0 p-3 text-bg-light position-relative">
        <button id="menu-btn" class="btn btn-primary btn-sm rounded-circle position-absolute" onclick="controleMenu()">
            <i class="fa-solid fa-caret-right"></i>
        </button>
            <div class="d-flex">
                <img src="{{ asset('images/chef-hat.svg') }}" style="width: 32px">
                <h1 class="h3 ms-2 mb-0">GarçON</h1>
            </div>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a id="link-menu-principal" class="nav-link" href="#">
                        <i class="fa-solid fa-house"></i><span class="menu-txt">&nbsp;Principal</span>
                    </a>
                </li>
                @if (auth()->check())
                    @if (auth()->user()->tipo_usuario_id == 1)
                        <li class="nav-item">
                            <a id="link-menu-usuarios" class="nav-link" href="{{ route('usuarios.index') }}">
                                <i class="fa-solid fa-user"></i><span class="menu-txt">&nbsp;Usuários</span>
                            </a>
                        </li>
                    @endif
                @endif
                <li class="nav-item">
                    <a id="link-menu-produtos" class="nav-link" href="{{ route('produtos') }}">
                        <i class="fa-solid fa-burger"></i><span class="menu-txt">&nbsp;Produtos</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a id="link-menu-cardapio" class="nav-link" href="{{ route('cardapio') }}">
                        <i class="fa-solid fa-list-ul"></i><span class="menu-txt">&nbsp;Cardápio</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a id="link-menu-comandas" class="nav-link" href="{{ route('comanda') }}">
                        <i class="fa-solid fa-receipt"></i></i><span class="menu-txt">&nbsp;Comandas</span>
                    </a>
                </li>
                @if (auth()->check())
                    @if (auth()->user()->tipo_usuario_id == 1 || auth()->user()->tipo_usuario_id == 2)
                        <li class="nav-item">
                            <a id="link-menu-cozinha" class="nav-link" href="{{ route('comanda.cozinha') }}">
                                <i class="fa-solid fa-bell"></i><span class="menu-txt">&nbsp;Cozinha</span>
                            </a>
                        </li>
                    @endif
                @endif
            </ul>
            <hr>
            <button id="btn-logout" class="btn btn-danger text-start">
                <i class="fa-solid fa-door-open"></i><span class="menu-txt">&nbsp;Sair</span>
            </button>
            <form id="logout-form" action="{{ route('login.destroy') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </nav>
        <script>
            const LINKS = document.getElementsByClassName('nav-link');

            for(let i = 0; i < LINKS.length; i++) {
                if (LINKS[i].classList.contains('active')) {
                    LINKS[i].classList.remove('active');
                }
            }
        </script>
        <div class="w-100">
            @yield('content')
        </div>
    </div>
    <script>
        // controle menu
        function controleMenu() {
            document.getElementById("nav-bar").classList.toggle('ativa');
        }

        document.getElementById('btn-logout').addEventListener('click', function(event) {
            event.preventDefault();
            document.getElementById('logout-form').submit();
        });
    </script>
</body>
</html>