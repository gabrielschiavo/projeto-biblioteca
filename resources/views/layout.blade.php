<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {{-- <link rel="shortcut icon" href="/img/favicon_livros_32.png"/> --}}

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

        <!-- UIkit CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.13.7/dist/css/uikit.min.css" />

        <title>Projeto Biblioteca</title>
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    @yield('titulo')
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="/home">Home</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Listas
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <li><a class="dropdown-item" href="/lista-genero">Lista Gêneros</a></li>
                                    <li><a class="dropdown-item" href="/lista-livros">Lista Livros</a></li>
                                    <li><a class="dropdown-item" href="/lista-pessoas">Lista Pessoas</a></li>
                                    <li><a class="dropdown-item" href="/lista-reservas">Lista Retiradas/Devolucao</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Cadastros
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <li><a class="dropdown-item" href="/lista-genero/cadastro-genero">Cadastro Gêneros</a></li>
                                    <li><a class="dropdown-item" href="/lista-livros/cadastro-livros">Cadastro Livros</a></li>
                                    <li><a class="dropdown-item" href="/lista-pessoas/cadastro-pessoas">Cadastro Pessoas</a></li>
                                    <li><a class="dropdown-item" href="/lista-reservas/cadastro-reservas">Cadastro Retiradas/Devoluçaões</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        
        <div class="container">
            <br>
            @yield('conteudo')
        </div>

        <footer class="mt-5 pt-5" style="position: relative; left: 0; bottom: 0; width: 100%;">
            <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                <li class="nav-item me-5">Gabriel Kleinübing Schiavo</li>
                <li class="nav-item me-5">Gabriel Meneghetti</li>
                <li class="nav-item me-5">Lucas Werle</li>
                <li class="nav-item">Pedro Henrique Loebens</li>
            </ul>
            <p class="text-center text-muted">2022 Fundação Educacional Machado de Assis</p>
        </footer>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>
