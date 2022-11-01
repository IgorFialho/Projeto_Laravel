<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Fonte do Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https: //fonts.googleapis.com/css2? family= Roboto+Flex" rel="stylesheet">

    <!-- CSS boostrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">

    <!-- CSS da aplicação -->
    <link rel="stylesheet" href="/css/styles.css">
    <script src="/js/scripts.js"></script>

    

</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="collapse navbar-collapse" id="navbar">
           
                <a href="/dashboard" class="navbar-brand">
                    <img src="/img/perfil.png" class="perfil" alt="Foto perfil">
                </a>
            
                <ul class="navbar-nav">

                    @guest

                    <li class="nav-item">
                        <a href="/login" class="nav-link">Logar</a>
                    </li>

                    <li class="nav-item">
                        <a href="/register" class="nav-link">Cadastrar</a>
                    </li>

                    @endguest

                    <li class="nav-item">
                        <a href="/publicacoes" class="nav-link">Postagens</a>
                    </li>

                    @auth

                    <li class="nav-item">
                        <a href="/dashboard" class="nav-link">Meu Perfil</a>
                    </li>


                    <li class="nav-item">
                        <a href="/publicar" class="nav-link">Publicar</a>
                    </li>

                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <div class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                        this.closest('form').submit(); " role="button">
                                    <i class="fas fa-sign-out-alt"></i>

                                    {{ __('Log Out') }}
                                </a>
                            </div>
                        </form>
                    </li>

                    @endauth

                </ul>
        </nav>
    </header>

    <main>
        <div class="container-fluid">
            <div class="row">
                @if(session('msg'))
                <p class="msg">{{ session('msg') }}</p>
                @endif
            </div>
        </div>
    </main>

    @yield('content')
    <footer>
        <p>WHO ARE YOU ? &copy; 2022</p>
    </footer>

    <!-- Iconis -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"> </script>
    <script nomodule src="https://unpkg .com/ionicons@5.5.2/dist/ionicons/ionicons.js"> </script>
    
</body>

</html>