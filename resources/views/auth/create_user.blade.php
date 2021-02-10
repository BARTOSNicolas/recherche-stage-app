@extends('auth.layout')

@section('content')
    <div class="background-login">
        <h1>Pret à gérer toutes tes candidatures ?</h1>
        <form class="auth" action="{{ route('created_user') }}" method="POST">
            @csrf
            <fieldset>
                <legend>Créer ton compte</legend>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" type="text" id="name" name="name" value="{{ old('name') }}">
                    <label class="mdl-textfield__label" for="name">Nom d'utilisateur</label>
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" type="mail" id="email" name="email" value="{{ old('email') }}">
                    <label class="mdl-textfield__label" for="email">Mail</label>
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" type="password" id="password" name="password">
                    <label class="mdl-textfield__label" for="password">Mot de passe</label>
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" type="password" id="password_confirmation" name="password_confirmation">
                    <label class="mdl-textfield__label" for="password_confirmation">Vérifier Mot de passe</label>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <button type="submit" class="btn mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
                    Créer
                </button>
                <a href="{{ route('login') }}" class="btn mdl-button mdl-js-button mdl-button--raised mdl-button--colored">Annuler</a>
                <label class="rgpd mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="rgpd">
                    <input type="checkbox" id="rgpd" class="mdl-checkbox__input" name="rgpd" value="yes">
                    <span class=" mdl-checkbox__label">J'autorise geretacandidature.fr a sauvegarder mes informations personnelles.</span>
                </label>
            </fieldset>
        </form>
    </div>
@endsection
