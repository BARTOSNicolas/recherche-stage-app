@extends('auth.layout')

@section('content')
    <div class="background-login">
        <h1 class="title">Pret à gérer toutes tes candidatures ?</h1>
        <form class="auth" action="{{ route('created_user') }}" method="POST">
            @csrf
            <fieldset class="z-depth-2">
                <legend class="z-depth-2">Créer ton compte</legend>
                <div class="input-field">
                    <input id="name" type="text" class="validate" name="name" value="{{ old('name') }}" required>
                    <label for="name">Nom d'utilisateur</label>
                    @error('name')
                    <span class="helper-text" data-error="wrong">{{$message}}</span>
                    @enderror
                </div>
                <div class="input-field">
                    <input id="email" type="text" class="validate" name="email" value="{{ old('email') }}" required>
                    <label for="email">Adresse mail</label>
                    @error('email')
                    <span class="helper-text" data-error="wrong">{{$message}}</span>
                    @enderror
                </div>
                <div class="input-field">
                    <input id="password" type="password" class="validate" name="password" value="{{ old('password') }}" required>
                    <label for="password">Mot de passe</label>
                    @error('password')
                    <span class="helper-text" data-error="wrong">{{$message}}</span>
                    @enderror
                </div>
                <div class="input-field">
                    <input id="password_confirmation" type="password" class="validate" name="password_confirmation" value="{{ old('password_confirmation') }}" required>
                    <label for="password_confirmation">Confirmation du mot de passe</label>
                    @error('password_confirmation')
                    <span class="helper-text" data-error="wrong">{{$message}}</span>
                    @enderror
                </div>
                <button type="submit" class="create-btn waves-effect waves-light btn">
                    Créer
                </button>
                <a href="{{ route('login') }}" class="create-btn waves-effect waves-light btn">Annuler</a>
                <label class="rgpd mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="rgpd">
                    <input type="checkbox" id="rgpd" name="rgpd" {{ old('rgpd') == 'on' ? 'checked' : '' }}>
                    <span class=" mdl-checkbox__label">J'autorise candidate.fr a sauvegarder mes informations personnelles.</span>
                </label>
            </fieldset>
        </form>
    </div>
@endsection
