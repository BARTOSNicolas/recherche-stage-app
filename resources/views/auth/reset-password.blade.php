@extends('auth.layout')
@section('content')
    <div class="background-login">
        <h1>Ne l'oublie pas cette fois !</h1>
        <form class="auth" action="{{route('update_password')}}" method="POST">
            <fieldset>
                <legend>Créer ton nouveau mot de passe</legend>
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
                <div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="mdl-textfield__input" type="text" id="email" name="email" value="{{ old('email') }}">
                        <label class="mdl-textfield__label" for="email">Verifions ton adresse mail</label>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
                <div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="mdl-textfield__input" type="password" id="password" name="password">
                        <label class="mdl-textfield__label" for="password">Entre un nouveau mot de passe</label>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
                <div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="mdl-textfield__input" type="password" id="password_confirmation" name="password_confirmation">
                        <label class="mdl-textfield__label" for="password_confirmation">Confirme le nouveau mot de passe</label>
                    </div>
                </div>
                <button type="submit" class="btn mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
                    Valider
                </button>
            </fieldset>
        </form>
    </div>
@endsection
