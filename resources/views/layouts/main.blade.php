<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <!-- CSS do DataTables -->
    <link rel="stylesheet" href="//cdn.datatables.net/2.0.2/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.dataTables.min.css">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    <!-- DataTables JS -->
    <script type="text/javascript" src="https://cdn.datatables.net/2.0.2/js/dataTables.min.js"></script>

    <script src="https://kit.fontawesome.com/bc801b39b7.js" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom border-body">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('img/logo.png') }}" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                GEROS
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item text-light mr-2"><a class="nav-link" href="{{ route('os_gestao.index') }}">Home</a></li>
                    <li class="nav-item text-light mr-2"><a class="nav-link" href="{{ route('status.index') }}">Status</a></li>
                    <li class="nav-item text-light mr-2"><a class="nav-link" href="{{ route('areas.index') }}">Áreas</a></li>
                    <li class="nav-item text-light mr-2"><a class="nav-link" href="{{ route('categorias.index') }}">Categorias</a></li>
                </ul>
            </div>
            <div class="d-flex flex-row d-none d-lg-block">
                @if(Auth::check())
                <div>
                    <p class="text-light">Usuário: {{ Auth::user()->nome }}</p>
                </div>
                <div>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-outline-secondary ">Logout</button>
                    </form>
                </div>
                @endif
            </div>
        </div>
    </nav>

    <header>
        <!-- Imagem no cabeçalho -->
        <img class="header-image" src="{{ asset('img/back_header.png') }}" alt="Header Image">
    </header>
    <div class="container">

        @if(session('success'))
        <div id="alerta_sucesso" role="alert" class="alert alert-success alert-dismissible fade show">
            <strong>{{ session('success') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <script>
            $('#alerta_sucesso').delay(2000).fadeOut(500);
        </script>
        @elseif(session('error'))
        <div id="alerta_erro" role="alert" class="alert alert-danger alert-dismissible">
            <strong>{{ session('error') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <script>
            $('#alerta_erro').delay(10000).fadeOut(500);
        </script>
        @endif

        @yield('content')
    </div>

</body>

</html>