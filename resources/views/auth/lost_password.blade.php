@extends('auth.layout')

@section('content')
    <div class="background-login">
        <h1>Attention alzheimer te guette ! </h1>
        <form class="auth" action="{{route('request_password')}}" method="POST">
            <fieldset>
                <legend>Tu as perdu ton mot de passe ?</legend>
                @csrf
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" type="text" id="email" name="email" value="{{ old('name') }}">
                    <label class="mdl-textfield__label" for="email">Nom d'utilisateur</label>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                    @enderror
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
                <div>
                    <button type="submit" class="btn mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
                        Valider
                    </button>
                    <a href="{{ route('login') }}" class="btn mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
                        Annuler
                    </a>
                </div>
            </fieldset>
        </form>
    </div>
 @endsection
