@extends('Auth.layout')

@section('content')
    <div class="background-login">
        <form class="auth" action="{{ route('authentification') }}" method="POST">
            @csrf
            <fieldset>
                <legend>Login</legend>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" type="text" id="name" name="name" value="{{ old('name') }}">
                    <label class="mdl-textfield__label" for="email">Nom d'utilisateur</label>
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
                <a href="create_user">création d'un compte</a>
                <a href="">mot de passe perdu ?</a>
            </fieldset>
        </form>
    </div>
@endsection
