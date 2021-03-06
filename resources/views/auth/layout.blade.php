<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <link rel="stylesheet" href="{{ asset("css/app.css") }}">
    <title>Gère tes candidatures pour trouver un emploi ou un stage - Login</title>
    <meta name= "description" content= "Page de Login de candidate, l'application qui vous aide à gérer vos candidature pour trouver un emploi ou un stage en toute simplicité." />

</head>
<body>

@yield('content')
<ul class="submenu-login">
    <li><a class="tooltipped" href="{{ route('info') }}" data-position="top" data-tooltip="Mentions légales"><span class="material-icons">info</span></a></li>
    <li><a class="tooltipped" href="{{ route('data') }}" data-position="top" data-tooltip="Protection des données"><span class="material-icons">text_snippet</span></a></li>
    <li><a class="tooltipped" href="{{ route('welcome') }}" data-position="top" data-tooltip="Plus d'info"><span class="material-icons">help</span></a></li>
</ul>


<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
