<html>
<head>
    <meta charset="utf-8">
    <title>Socep</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/soceb.css') }}">
    <script>
        window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="" href="{{ url('/') }}"><img width="400"class="logo-menu img-responsive"  src="{{ asset('img/logomenu.png') }}"></a>
        </div>

        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="/soceb/View/home.php">Home</a></li>
                <li><a href="#">Ajuda</a></li>
                <li><a href="#">Sobre</a></li>
                <li><a href="#">Contato</a></li>
                <li class="dropdown">
                    <a href="#"class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"   aria-expanded="false"> ssdf<span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu"> <li><a  href="?l=sair">Sair</a></li> </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid side-bar">
    <div class="row-fluid">
        <div class="col-md-2 ">
            <ul class="nav nav-sidebar ">
                <h1>Produtos</h1>

                <li><a href="?produto">Novo Produto</a></li>

                <li><a href="?buscarproduto">Buscar Produto</a></li>
            </ul>
            <ul class="nav nav-sidebar">
                <h1>Usuários</h1>

                <li><a href="?usuario">Novo Usuário</a></li>

                <li><a href="?buscarusuario">Buscar Usuário</a></li>
            </ul>
            <ul class="nav nav-sidebar">
                <h1>Relatórios</h1>
                <li><a href="#">Reposição</a></li>
            </ul>
        </div>
        <div class="col-md-10 col-sm-12">

        </div>
    </div>
</div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>

</body>
</html>