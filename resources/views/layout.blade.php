<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <link rel="stylesheet" href="{{ asset("css/app.css") }}">

    <title>Gère tes candidatures pour trouver un emploi ou un stage</title>
</head>
<body>
<header>

    <div class="navbar-fixed">
        <nav>
            <div class="nav-wrapper">
                <div class="container">
                <ul class="left">
                    <a href="#!" class="brand-logo center"><i class="material-icons">cloud</i>candidate.fr</a>
                    <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                </ul>
                </div>
            </div>
        </nav>
    </div>

<ul id="slide-out" class="sidenav sidenav-fixed">
    <div>
        <div class="profil">
            <p class="bvn">Bienvenue</p>
            <p class="auth-name">{{Illuminate\Support\Facades\Auth::user()->name}}</p>
        </div>
        <li><a href="{{ route('homepage') }}"><span class="badge">{{\App\Http\Controllers\HomeController::stats()['all']}}</span>Toutes</a></li>
        <hr>
        <li><a href="{{ route('candidate') }}"><span class="badge">{{\App\Http\Controllers\HomeController::stats()['candidate']}}</span>à candidater</a></li>
        <li><a href="{{ route('encours') }}"><span class="badge">{{\App\Http\Controllers\HomeController::stats()['encours']}}</span>En cours</a></li>
        <li><a href="{{ route('relaunch') }}"><span class="badge">{{\App\Http\Controllers\HomeController::stats()['relaunch']}}</span>à relancer</a></li>
        <li><a href="{{ route('positive') }}"><span class="badge">{{\App\Http\Controllers\HomeController::stats()['positive']}}</span>Les positives</a></li>
        <li><a href="{{ route('interview') }}"><span class="badge">{{\App\Http\Controllers\HomeController::stats()['interview']}}</span>Mes entretiens</a></li>
        <li><a href="{{ route('negative') }}"><span class="badge">{{\App\Http\Controllers\HomeController::stats()['negative']}}</span>Les négatives</a></li>
        <hr>
        <li><a href="{{ route('recherche') }}">Recherche un emploi</a></li>
        <li><a href="{{ route('logout') }}">Me déconnecter</a></li>
    </div>
        <ul class="submenu">
            <li><a class="tooltipped" href="{{ route('info') }}" data-position="top" data-tooltip="Mentions légales"><span class="material-icons">info</span></a></li>
            <li><a class="tooltipped" href="{{ route('data') }}" data-position="top" data-tooltip="Protection des données"><span class="material-icons">text_snippet</span></a></li>
            <li><a class="tooltipped" href="{{ route('idea') }}" data-position="top" data-tooltip="Envoyer une idée"><span class="material-icons">lightbulb</span></a></li>
        </ul>
</ul>
</header>
<main>
    @yield('content')
    <!-- Element Showed -->

</main>




<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="{{ asset('js/app.js') }}"></script>
@yield('script')
</body>
</html>
