
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>CAE</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/icone_ifba.png') }}">
    <script src="{{ asset('assets/js/jquery-3.4.1.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}" ></script> 
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link data-n-head="true" rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/line-awesome/css/line-awesome.min.css') }}">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
	  }
	  .active {
          color: #28a745 !important;
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="{{ asset('assets/css/dashboard.css') }}" rel="stylesheet">
  </head>
  <body>
        {{-- <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
            <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">CAE</a>
        </nav> --}}

        <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top shadow-sm">
            <a class="navbar-brand navbar-expand-md fixed-top col-sm-3 col-md-2 mr-0 pb-3" href="#">CAE</a>
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Sair') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid">
            <div class="row">
                <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                    <div class="sidebar-sticky">
                        <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link"  href="{{ route('home') }}">
                            <span data-feather="home"></span>
                            Início <span class="sr-only"></span>
                            </a>
                        </li>
                        @role('admin')                        
                        <li class="nav-item">
                            <a class="nav-link"  href="{{ route('blocos.index') }}">
                            <span data-feather="box"></span>
                            Blocos
                            </a>
                        </li>
                        @endrole
                        @role('admin','coordenador')   
                        <li class="nav-item">
                            <a class="nav-link" href="">
                            <span data-feather="anchor"></span>
                            Locais
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"  href="">
                            <span data-feather="cpu"></span>
                            Equipamentos
                            </a>
                        </li>
                        @endrole                        
                        @role('admin')  
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('servidores.index') }}">
                            <span data-feather="user"></span>
                            Servidores
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"  href="{{ route('coordenadores.index') }}">
                            <span data-feather="user-plus"></span>
                            Coordenadores
                            </a>
                        </li>                   
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">
                            <span data-feather="user"></span>
                            Usuários
                            </a>
                        </li>
                        @endrole
                        <li class="nav-item">
                            <a class="nav-link" href="">
                            <span data-feather="database"></span>
                            Reservas
                            </a>
                        </li>
                        </ul>
                    </div>
                </nav>

                @yield('conteudo')
                
            </div>
        </div>
        <script src="{{ asset('assets/js/feather.min.js') }}"></script>
        <script src="{{ asset('assets/js/dashboard.js') }}"></script>
    </body>
</html>
