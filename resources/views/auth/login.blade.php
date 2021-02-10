@extends('auth.layout')

@section('content')
    <div class="background-login">
        <h1>Bienvenue sur geretacandidature.fr</h1>
        <form class="auth" action="{{ route('authentification') }}" method="POST">
            @csrf
            <fieldset>
                <legend>geretacandidature.fr - Login</legend>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" type="text" id="name" name="name" value="{{ old('name') }}">
                    <label class="mdl-textfield__label" for="name">Nom d'utilisateur</label>
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" type="password" id="password" name="password">
                    <label class="mdl-textfield__label" for="password">Mot de passe</label>
                </div>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach

                <button type="submit" class="btn mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
                    Connexion
                </button>
                <label class="remember mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="remember">
                    <input type="checkbox" id="remember" class="mdl-checkbox__input" name="remember" {{ old('remember') ? 'checked' : '' }}>
                    <span class=" mdl-checkbox__label">Se souvenir de moi</span>
                </label>
                <a href="{{ route('create_user') }}">création d'un compte</a>
                <a href="{{ route('lost_password') }}">mot de passe perdu ?</a>
            </fieldset>
        </form>
    </div>
@endsection
