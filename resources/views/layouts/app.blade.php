<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>glow</title>
    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/serie.css') }}" rel="stylesheet">
    <link href="{{ asset('css/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('css/slick-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('css/user.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
</head>
<body>
<header id="header">
    <div id="container_header">
        <a class="logo" href="{{ url('/') }}">
            <div id="logo_container"></div>
        </a>
        <div class="liens">
            <div class="container_liens">
            <a class="lien_menu accueil" href="{{ url('/') }}">Accueil</a>
            </div>

            <div class="container_liens">
            <a class="lien_menu serie" href="{{ url('/serie') }}">Séries</a>
            </div>

            <div class="container_liens">
                @if(Auth::user()==null)
                    <a class="lien_menu connect" href="{{ route('login') }}">Se connecter</a>
                @else
                    <a class="lien_menu connect" href="{{ route('logout') }}">Se déconnecter</a>
                @endif
            </div>

            <form action="post" class="container_liens">
                <input type="text" name="barre_de_recherche" id="barre_de_recherche" placeholder="Rechercher">
                <input type="submit" value="ok" id="ok">
            </form>
            <div class="container_liens lien_profil">
                @if(Auth::user()==null)
                @else
                    <a class="lien_user" href="{{ url('/user') }}"></a>
                @endif

            </div>

        </div>
    </div>
</header>


<div id="main">
    @yield('content')
</div>
<!-- Scripts -->
<script >
    $('#header').css('background-color', 'inherit');  // d'abord, on masque le deuxième menu de navigation, qui porte la classe "navigation2"
    var hauteur = 1; // XXX, c'est le nombre de pixels à partir duquel on déclenche le tout
    $(function(){
        $(window).scroll(function () {//Au scroll dans la fenetre on déclenche la fonction
            if ($(this).scrollTop() > hauteur) { //si on a défile de plus de XXX (variable "hauteur) pixels du haut vers le bas
                $('#header').css('background-color', '#0D0E1F'); // On masque le 1
            } else {
                $('#header').css('background-color', 'inherit'); // "et vice et versa" (© Les inconnus, 1990 ^^)
            }
        });
    });
</script>
</body>
</html>
