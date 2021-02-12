<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.deep_purple-orange.min.css" />
    <link rel="stylesheet" href="{{ asset("css/app.css") }}">

    <title>Gère tes candidatures pour trouver un emploi ou un stage</title>
</head>
<body>
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer
            mdl-layout--fixed-header">
    <header class="mdl-layout__header">
        <div class="mdl-layout__header-row">
            <h1 class="mdl-textfield--align-left">geretacandidature.fr</h1>
            <div class="mdl-layout-spacer"></div>
            <a href="{{ route('formulaire') }}" id="tt4"><button class="mdl-button mdl-js-button mdl-button--fab mdl-button--colored">
                    <i class="material-icons">add</i>
                </button></a>
            <div class="mdl-tooltip mdl-tooltip--left" for="tt4">
                Ajouter une entreprise
            </div>
        </div>
    </header>
    <div class="mdl-layout__drawer">
        <div class="mdl-layout-title"><span class="square">{{ substr(Illuminate\Support\Facades\Auth::user()->name, 0,1) }}</span></div>
        <nav class="mdl-navigation">
            <a class="mdl-navigation__link" href="{{ route('homepage') }}"><span class="mdl-badge " data-badge="{{\App\Http\Controllers\HomeController::stats()['all']}}">Toutes</span></a>
            <hr>
            <a class="mdl-navigation__link" href="{{ route('candidate') }}"><span class="mdl-badge " data-badge="{{\App\Http\Controllers\HomeController::stats()['candidate']}}">à candidater</span></a>
            <a class="mdl-navigation__link" href="{{ route('encours') }}"><span class="mdl-badge " data-badge="{{\App\Http\Controllers\HomeController::stats()['encours']}}">En cours</span></a>
            <a class="mdl-navigation__link" href="{{ route('relaunch') }}"><span class="mdl-badge " data-badge="{{\App\Http\Controllers\HomeController::stats()['relaunch']}}">à relancer</span></a>
            <a class="mdl-navigation__link" href="{{ route('positive') }}"><span class="mdl-badge " data-badge="{{\App\Http\Controllers\HomeController::stats()['positive']}}">Les positives</span></a>
            <a class="mdl-navigation__link" href="{{ route('interview') }}"><span class="mdl-badge " data-badge="{{\App\Http\Controllers\HomeController::stats()['interview']}}">Mes entretiens</span></a>
            <a class="mdl-navigation__link" href="{{ route('negative') }}"><span class="mdl-badge " data-badge="{{\App\Http\Controllers\HomeController::stats()['negative']}}">Les négatives</span></a>
            <hr>
            <a class="mdl-navigation__link" href="{{ route('logout') }}">Déconnexion</a>
        </nav>
        <nav class="nav-bottom">
            <ul>
                <li><a href="{{ route('info') }}" id="ttinfo"><img src="{{asset('images/info-solid.svg')}}" alt="Information"></a></li>
                <div class="mdl-tooltip mdl-tooltip--top" for="ttinfo">
                    Mentions légales
                </div>
                <li><a href="{{ route('data') }}" id="ttdata"><img src="{{asset('images/lock-solid.svg')}}" alt="Protection des données"></a></li>
                <div class="mdl-tooltip mdl-tooltip--top" for="ttdata">
                    Protection des données
                </div>
                <li><a href="{{ route('idea') }}" id="ttidea"><img src="{{asset('images/lightbulb-solid.svg')}}" alt="Vous avez une idée"></a></li>
                <div class="mdl-tooltip mdl-tooltip--top" for="ttidea">
                    Envoyer ses idées
                </div>
            </ul>
        </nav>
    </div>
    <main class="mdl-layout__content">
        <div class="page-content">@yield('content')</div>
    </main>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
<script src="{{ asset('js/app.js') }}"></script>
@yield('script')
</body>
</html>
