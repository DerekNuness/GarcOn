<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GarçON</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <main class="content d-flex align-items-center justify-content-center">
        <form action="{{ route('login.store') }}" method="post">
            @csrf
            <div style="width: 300px; margin-top: -7rem">
                <img src="{{ asset('images/chef-hat.svg') }}" class="img-thumbnail mx-auto d-block border-0 bg-transparent" alt="logo">
                <h1 class="h3 text-center">Login</h1>
                @error('error')
                    <div>{{ $message }}</div>
                @enderror
                <label for="user">Email</label>
                <input type="text" name="email" id="user" class="form-control form-control-sm mb-3">
                @error('email')
                    <div>{{ $message }}</div>
                @enderror
                <label for="senha">Senha</label>
                <input type="password" name="password" id="senha" class="form-control form-control-sm mb-3">
                @error('password')
                    <div>{{ $message }}</div>
                @enderror
                <button type="submit" class="btn btn-success w-100 mt-3">Entrar</button>
            </div>
        </form>
    </main>
</body>
</html>