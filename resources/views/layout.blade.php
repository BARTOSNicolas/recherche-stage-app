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

    <title>Recherche d'entreprises</title>
</head>
<body>
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer
            mdl-layout--fixed-header">
    <header class="mdl-layout__header">
        <div class="mdl-layout__header-row">
            <h1 class="mdl-textfield--align-left">Recherche d'entreprises</h1>
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
        <span class="mdl-layout-title">Utilisateur Name</span>
        <nav class="mdl-navigation">
            <a class="mdl-navigation__link" href="{{ route('homepage') }}">Toutes</a>
            <a class="mdl-navigation__link" href="{{ route('relaunch') }}">à relancer</a>
            <a class="mdl-navigation__link" href="{{ route('interview') }}">Mes entretiens</a>
            <a class="mdl-navigation__link" href="">Déconnexion</a>
        </nav>
    </div>
    <main class="mdl-layout__content">
        <div class="page-content">@yield('content')</div>
    </main>
</div>



<script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="{{ asset('js/app.js') }}"></script>
@yield('script')
</body>
</html>
